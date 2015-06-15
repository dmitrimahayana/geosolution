<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->check_session();
        $this->load->model('login_history_model');
        $this->load->model('backend_page_model');
        $this->load->model('message_model');
        $this->load->model('lang_model');
        $this->load->model('user_group_model');
    }

    public function check_session(){
        $username= $this->session->userdata('USERNAME');
        if(empty($username)){
            $this->session->set_flashdata('errors', 'Session expired, you need login first');
            redirect(base_url().'member/index');
        }
    }

	public function index()
	{
        $this->check_dual_login();
        $query['menu']=$this->backend_page_model->menu();
        $this->load->view('backend/beranda',$query);
	}

    /*load page ex: category-page/id*/
    public function page($name_page, $type, $id=""){
        $this->check_dual_login();
        $query['menu']=$this->backend_page_model->menu();
        $model=$name_page.'_model';
        $this->load->model($model);
        switch ($type) {
            case 'manage':
                $query["get_all"]=$this->$model->get_all();
                $this->load->view("backend/view_manage/".$name_page, $query);
                break;
            case 'add':
                if($name_page=="user")
                    $query["get_all_group"]=$this->user_group_model->get_all();
                else if($name_page=="interactive"){
                    $query["get_all_images"]=$this->$model->show_list_image();
                    $query["get_for_images"]=$this->$model->get_for_images();
                }

                $query['all_lang']=$this->lang_model->get_all_byAttributes('ONLINE_LANG', 1, 'ORDERING_LANG', 'asc');
                $this->load->view("backend/view_add/".$name_page, $query);
                break;
            case 'edit':
                if($name_page=="page"){
                    $query["get_some"]=$this->global_model->getByAttribute('page',array('ID_PAGE' => $id ));
                    $query["get_some_lang"]=$this->$model->getSome($id);
                    $query["new_lang_count"]=$this->$model->check_lang_count($id);
                    $query["new_lang"]=$this->$model->check_lang($id);
                }
                else if($name_page=="menu"){
                    $query["get_some"]=$this->global_model->getByAttribute('menu',array('ID_MENU' => $id ));
                    $query["get_some_lang"]=$this->$model->getSome($id);
                    $query["get_some_category"]=$this->global_model->getAll('menu_category');
                    $query["new_lang_count"]=$this->$model->check_lang_count($id);
                    $query["new_lang"]=$this->$model->check_lang($id);
                }
                else if($name_page=="menu_category"){
                    $query["get_some"]=$this->global_model->getByAttribute('menu_category',array('ID_MENU_CATEGORY' => $id ));
                }
                else if($name_page=="lang"){
                    $query["get_some"]=$this->global_model->getByAttribute('lang',array('ID_LANG' => $id ));
                }
                else if($name_page=="user"){
                    $query["get_some"]=$this->$model->getSome($id);
                    $query["get_all_group"]=$this->user_group_model->get_all();
                }
                else if($name_page=="user_group"){
                    $query["get_access_page"]=$this->backend_page_model->show_access($id);
                    $query["get_access_page_remain"]=$this->backend_page_model->show_access_remain($id);
                    $query["get_some"]=$this->global_model->getByAttribute('user_group',array('ID_GROUP' => $id ));
                }
                else if($name_page=="message"){
                    $arrayPage=array(
                        'IS_READ' => 1
                    );
                    $this->global_model->update('message',$arrayPage,'ID_MESSAGE',$id);//update is read parent
                    $this->global_model->update('message',$arrayPage,'ID_PARENT',$id);//update is read child
                    $query["get_parent"]=$this->global_model->getByAttribute('message',array('ID_MESSAGE' => $id ));
                    $query["get_some"]=$this->global_model->getByAttribute('message',array('ID_PARENT' => $id ));
                }
                else if($name_page=="interactive"){
                    $query["get_some"]=$this->$model->getSome($id);
                    $query["get_some_lang"]=$this->$model->get_some_lang($id);
                    $query["new_lang_count"]=$this->$model->check_lang_count($id);
                    $query["new_lang"]=$this->$model->check_lang($id);
                    $query["get_all_images"]=$this->$model->show_list_image();
                    $query["get_for_images"]=$this->$model->get_for_images();
                }
                else if($name_page=="profile"){
                    $query["get_some"]=$this->$model->getSome($id);
                    $query["get_all_group"]=$this->user_group_model->get_all();
                }
                $this->load->view("backend/view_edit/".$name_page, $query);
                break;
            case 'delete':
                if($name_page=="page"){
                    $this->global_model->delete('page_lang','ID_PAGE',$id);
                    $this->global_model->delete('page','ID_PAGE',$id);
                }
                else if($name_page=="menu"){
                    $this->global_model->delete('menu_lang','ID_MENU',$id);
                    $this->global_model->delete('menu','ID_MENU',$id);
                }
                else if($name_page=="menu_category"){
                    $this->global_model->delete('menu_category','ID_MENU_CATEGORY',$id);
                }
                else if($name_page=="lang"){
                    $this->global_model->delete('lang','ID_LANG',$id);
                }
                else if($name_page=="user"){
                    $this->global_model->delete('user','ID_USER',$id);
                }
                else if($name_page=="user_group"){
                    $this->global_model->delete('user_group','ID_GROUP',$id);
                }
                else if($name_page=="interactive"){
                    $this->global_model->delete('interactive','ID_INTERACTIVE',$id);
                    $this->global_model->delete('interactive_lang','ID_INTERACTIVE',$id);
                }
                else if($name_page=="message"){
                    $this->global_model->delete('message','ID_MESSAGE',$id);
                }
                $this->session->set_flashdata('success', 'Berhasil menghapus data '.$this->input->post('name_page').' ID '.$id);
                redirect(base_url().'backoffice/'.$name_page.'/manage');
                break;
        }
    }

    public function addData(){
        switch ($this->input->post('name_page')) {
            case 'page':
                $name_success=$this->input->post('NAME_PAGE');
                $this->load->model('page_model');
                $this->load->model('page_lang_model');
                $arrayPage=array(
                    'NAME_PAGE' => str_replace(" ","-",strtolower ($this->input->post('NAME_PAGE'))),
                    'ONLINE_PAGE' => $this->input->post('ONLINE_PAGE'),
                    'METADATA' => $this->input->post('METADATA'),
                    'TIME_PAGE' => strtotime(date("Y-m-d H:i:s"))
                );
                $ID=$this->page_model->insert($arrayPage);
                for($i=0; $i<$this->input->post('count_lang'); $i++){
                    $arrayPageLang=array(
                        'TITLE_' => $_POST['TITLE_'][$i],
                        'CONTENT' => $_POST['CONTENT'][$i],
                        'ID_PAGE' => $ID,
                        'ID_LANG' => $_POST['ID_LANG'][$i]
                    );
                    $this->page_lang_model->insert_lang($arrayPageLang);
                }
                break;
            case 'menu':
                $name_success=$this->input->post('NAME_MENU');
                $this->load->model('menu_model');
                $this->load->model('menu_lang_model');
                $arrayPage=array(
                    'NAME_MENU' => str_replace(" ","-",strtolower ($this->input->post('NAME_MENU'))),
                    'ID_MENU_CATEGORY' => $this->input->post('ID_MENU_CATEGORY'),
                    'LINK_MENU' => $this->input->post('LINK_MENU'),
                    'ORDERING_MENU' => $this->input->post('ORDERING_MENU'),
                    'ONLINE_MENU' => $this->input->post('ONLINE_MENU'),
                    'METADATA' => $this->input->post('METADATA')
                );
                $ID=$this->menu_model->insert($arrayPage);
                for($i=0; $i<$this->input->post('count_lang'); $i++){
                    $arrayPageLang=array(
                        'ID_MENU' => $ID,
                        'ID_LANG' => $_POST['ID_LANG'][$i],
                        'TEXT_MENU' => $_POST['TEXT_MENU'][$i]
                    );
                    $this->menu_lang_model->insert_lang($arrayPageLang);
                }
                break;
            case 'menu_category':
                $name_success=$this->input->post('NAME_CATEGORY');
                $arrayPage=array(
                    'NAME_CATEGORY' => str_replace(" ","-",strtolower ($this->input->post('NAME_CATEGORY'))),
                    'CODE_CATEGORY' => $this->input->post('CODE_CATEGORY')
                );
                $this->global_model->insert('menu_category',$arrayPage);
                break;
            case 'lang':
                $name_success=$this->input->post('LANG');
                $arrayPage=array(
                    'LANG' => str_replace(" ","-",strtolower ($this->input->post('LANG'))),
                    'ORDERING_LANG' => $this->input->post('ORDERING_LANG'),
                    'ONLINE_LANG' => $this->input->post('ONLINE_LANG')
                );
                $this->global_model->insert('lang',$arrayPage);
                break;
            case 'user':
                $name_success=$this->input->post('USERNAME');
                $arrayPage=array(
                    'ID_GROUP' => $this->input->post('ID_GROUP'),
                    'USERNAME' => $this->input->post('USERNAME'),
                    'PASSWORD' => md5($this->input->post('PASSWORD')),
                    'ACTIVE' => $this->input->post('ACTIVE'),
                    'JOIN_DATE' => strtotime(date("Y-m-d H:i:s")),
                    'EMAIL' => $this->input->post('EMAIL')
                );
                $this->global_model->insert('user',$arrayPage);
                break;
            case 'user_group':
                $name_success=$this->input->post('GROUP_NAME');
                $arrayPage=array(
                    'GROUP_NAME' => str_replace(" ","-",strtolower ($this->input->post('GROUP_NAME'))),
                    'LEVEL' => $this->input->post('LEVEL'),
                    'DESCRIPTION' => $this->input->post('DESCRIPTION')
                );
                $this->global_model->insert('user_group',$arrayPage);
                break;
            case 'message':
                $name_success=$this->input->post('SUBJECT');
                $arrayPage=array(
                    'ID_PARENT' => $this->input->post('ID_PARENT'),
                    'SUBJECT' => $this->input->post('SUBJECT'),
                    'USERNAME' => $this->session->userdata('USERNAME'),
                    'TIME_MESSAGE' => strtotime(date("Y-m-d H:i:s")),
                    'IS_READ' => 1,
                    'TEXT_MESSAGE' => $this->input->post('TEXT_MESSAGE')
                );
                $this->global_model->insert('message',$arrayPage);
                break;
            case 'interactive':
                $name_success=$this->input->post('NAMA');
                $arrayPage=array(
                    'NAMA' => str_replace(" ","-",strtolower ($this->input->post('NAMA'))),
                    'IMAGES' => $this->input->post('IMAGES'),
                    'LINK' => $this->input->post('LINK'),
                    'DATE' => strtotime(date("Y-m-d H:i:s")),
                    'IS_ONLINE' => $this->input->post('IS_ONLINE')
                );
                $this->load->model('interactive_model');
                $ID=$this->interactive_model->insert($arrayPage);
                for($i=0; $i<$this->input->post('count_lang'); $i++){
                    $arrayPageLang=array(
                        'ID_INTERACTIVE' => $ID,
                        'ID_LANG' => $_POST['ID_LANG'][$i],
                        'TITLE' => $_POST['TITLE'][$i],
                        'DESCRIPTION' => $_POST['DESCRIPTION'][$i]
                    );
                    $this->global_model->insert('interactive_lang',$arrayPageLang);
                }
                break;
        }
        $this->session->set_flashdata('success', 'Berhasil menambah data '.$this->input->post('name_page').' '.$name_success);
        redirect(base_url().'backoffice/'.$this->input->post('name_page').'/manage');
    }

    public function editData(){
        switch ($this->input->post('name_page')) {
            case 'page':
                $name_success=$this->input->post('NAME_PAGE');
                $arrayPage=array(
                    'NAME_PAGE' => str_replace(" ","-",strtolower ($this->input->post('NAME_PAGE'))),
                    'ONLINE_PAGE' => $this->input->post('ONLINE_PAGE'),
                    'METADATA' => $this->input->post('METADATA'),
                    'TIME_PAGE' => strtotime(date("Y-m-d H:i:s"))
                );
                $this->global_model->update('page',$arrayPage,'ID_PAGE',$this->input->post('ID_PAGE'));
                $temp=1;
                for($i=0; $i<$this->input->post('count_lang'); $i++){
                    $arrayPageLang=array(
                        'TITLE_' => $_POST['TITLE_'][$i],
                        'CONTENT' => $_POST['CONTENT'.$temp]
                    );
                    $temp++;
                    $this->global_model->update('page_lang',$arrayPageLang,'ID_PAGE_LANG',$_POST['ID_PAGE_LANG'][$i]);
                }
                if($this->input->post('count_new_lang')){
                    $temp2=$i+1;
                    for($i=0; $i<$this->input->post('count_new_lang'); $i++){
                        $arrayPageLang=array(
                            'TITLE_' => $_POST['TITLE_NEW'.$temp2],
                            'CONTENT' => $_POST['CONTENT_NEW'.$temp2],
                            'ID_PAGE' => $this->input->post('ID_PAGE'),
                            'ID_LANG' => $_POST['ID_LANG'.$temp2]
                        );
                        $temp2++;
                        $this->global_model->insert('page_lang',$arrayPageLang);
                    }
                }
                break;
            case 'menu':
                $name_success=$this->input->post('NAME_MENU');
                $arrayPage=array(
                    'NAME_MENU' => str_replace(" ","-",strtolower ($this->input->post('NAME_MENU'))),
                    'ID_MENU_CATEGORY' => $this->input->post('ID_MENU_CATEGORY'),
                    'LINK_MENU' => $this->input->post('LINK_MENU'),
                    'ORDERING_MENU' => $this->input->post('ORDERING_MENU'),
                    'ONLINE_MENU' => $this->input->post('ONLINE_MENU'),
                    'METADATA' => $this->input->post('METADATA')
                );
                $this->global_model->update('menu',$arrayPage,'ID_MENU',$this->input->post('ID_MENU'));
                for($i=0; $i<$this->input->post('count_lang'); $i++){
                    $arrayPageLang=array(
                        'TEXT_MENU' => $_POST['TEXT_MENU'][$i]
                    );
                    $this->global_model->update('menu_lang',$arrayPageLang,'ID_MENU_LANG',$_POST['ID_MENU_LANG'][$i]);
                }
                if($this->input->post('count_new_lang')){
                    $temp2=$i+1;
                    for($i=0; $i<$this->input->post('count_new_lang'); $i++){
                        $arrayPageLang=array(
                            'ID_MENU' => $this->input->post('ID_MENU'),
                            'ID_LANG' => $_POST['ID_LANG'.$temp2],
                            'TEXT_MENU' => $_POST['TEXT_MENU'.$temp2]
                        );
                        $temp2++;
                        $this->global_model->insert('menu_lang',$arrayPageLang);
                    }
                }
                break;
            case 'menu_category':
                $name_success=$this->input->post('NAME_CATEGORY');
                $arrayPage=array(
                    'NAME_CATEGORY' => str_replace(" ","-",strtolower ($this->input->post('NAME_CATEGORY'))),
                    'CODE_CATEGORY' => $this->input->post('CODE_CATEGORY')
                );
                $this->global_model->update('menu_category',$arrayPage, 'ID_MENU_CATEGORY',$this->input->post('ID_MENU_CATEGORY'));
                break;
            case 'lang':
                $name_success=$this->input->post('LANG');
                $arrayPage=array(
                    'LANG' => str_replace(" ","-",strtolower ($this->input->post('LANG'))),
                    'ORDERING_LANG' => $this->input->post('ORDERING_LANG'),
                    'ONLINE_LANG' => $this->input->post('ONLINE_LANG')
                );
                $this->global_model->update('lang',$arrayPage, 'ID_LANG',$this->input->post('ID_LANG'));
                break;
            case 'user':
                $name_success=$this->input->post('USERNAME');
                $arrayPage=array(
                    'ID_GROUP' => $this->input->post('ID_GROUP'),
                    'USERNAME' => $this->input->post('USERNAME'),
                    'ACTIVE' => $this->input->post('ACTIVE'),
                    'EMAIL' => $this->input->post('EMAIL')
                );
                $this->global_model->update('user',$arrayPage, 'ID_USER',$this->input->post('ID_USER'));
                break;
            case 'user_group':
                $name_success=$this->input->post('GROUP_NAME');
                $arrayPage=array(
                    'GROUP_NAME' => str_replace(" ","-",strtolower ($this->input->post('GROUP_NAME'))),
                    'LEVEL' => $this->input->post('LEVEL'),
                    'DESCRIPTION' => $this->input->post('DESCRIPTION')
                );
                $this->global_model->update('user_group',$arrayPage, 'ID_GROUP',$this->input->post('ID_GROUP'));
                break;
            case 'interactive':
                $name_success=$this->input->post('NAMA');
                $arrayPage=array(
                    'NAMA' => str_replace(" ","-",strtolower ($this->input->post('NAMA'))),
                    'IMAGES' => $this->input->post('IMAGES'),
                    'LINK' => $this->input->post('LINK'),
                    'DATE' => strtotime(date("Y-m-d H:i:s")),
                    'IS_ONLINE' => $this->input->post('IS_ONLINE')
                );
                $this->global_model->update('interactive',$arrayPage, 'ID_INTERACTIVE',$this->input->post('ID_INTERACTIVE'));
                for($i=0; $i<$this->input->post('count_lang'); $i++){
                    $arrayPageLang=array(
                        'ID_INTERACTIVE' => $this->input->post('ID_INTERACTIVE'),
                        'TITLE' => $_POST['TITLE'][$i],
                        'DESCRIPTION' => $_POST['DESCRIPTION'][$i]
                    );
                    $this->global_model->update('interactive_lang',$arrayPageLang, 'ID_INTERACTIVE_LANG', $_POST['ID_INTERACTIVE_LANG'][$i]);
                }
                if($this->input->post('count_new_lang')){
                    $temp2=$i+1;
                    for($i=0; $i<$this->input->post('count_new_lang'); $i++){
                        $arrayPageLang=array(
                            'ID_INTERACTIVE' => $this->input->post('ID_INTERACTIVE'),
                            'ID_LANG' => $_POST['ID_LANG'.$temp2],
                            'TITLE' => $_POST['TITLE_NEW'.$temp2],
                            'DESCRIPTION' => $_POST['DESCRIPTION_NEW'.$temp2]
                        );
                        $temp2++;
                        $this->global_model->insert('interactive_lang',$arrayPageLang);
                    }
                }
                break;
            case 'profile':
                if(empty($_POST['PASSWORD'])){
                    $name_success=$this->input->post('USERNAME');
                    $arrayPage=array(
                        'ID_GROUP' => $this->input->post('ID_GROUP'),
                        'USERNAME' => $this->input->post('USERNAME'),
                        'ACTIVE' => $this->input->post('ACTIVE'),
                        'EMAIL' => $this->input->post('EMAIL')
                    );
                }
                else {
                    $name_success=$this->input->post('USERNAME').' dan password baru '.$this->input->post('PASSWORD');
                    $arrayPage=array(
                        'ID_GROUP' => $this->input->post('ID_GROUP'),
                        'USERNAME' => $this->input->post('USERNAME'),
                        'PASSWORD' => md5($this->input->post('PASSWORD')),
                        'ACTIVE' => $this->input->post('ACTIVE'),
                        'EMAIL' => $this->input->post('EMAIL')
                    );
                }
                $this->global_model->update('user',$arrayPage, 'ID_USER',$this->input->post('ID_USER'));
                break;
        }
        $this->session->set_flashdata('success', 'Berhasil memperbarui data '.$this->input->post('name_page').' '.$name_success);
        if($this->input->post('name_page')=="profile")
            redirect(base_url().'backoffice/index');
        else
            redirect(base_url().'backoffice/'.$this->input->post('name_page').'/manage');
    }

    public function check_privilege(){
        $comma_separated = implode(";", $this->input->post('value'));
        $id_backend=explode(";", $comma_separated);

        $data = array (
            'action' => $this->input->post('action'),
            'type' => $this->input->post('type'),
            'value' =>$id_backend[0]
        );

        if($this->input->post('action')=="update"){
            foreach($id_backend as $temp){
                $arrayPage=array(
                    'ID_BACKEND_PAGE' => $temp,
                    'ID_GROUP' => $this->input->post('id_group')
                );
                $this->global_model->insert('backend_access',$arrayPage);
            }
        }
        else {
            foreach($id_backend as $temp){
                $arrayPage=array(
                    'ID_BACKEND_PAGE' => $temp,
                    'ID_GROUP' => $this->input->post('id_group')
                );
                $this->global_model->delete('backend_access','ID_BACKEND_PAGE',$temp);
            }
        }
        print json_encode($data);
    }

    /*check dual login kirim kode verifikasi via email*/
    public function check_dual_login(){
        $count=0;
        $count= $this->login_history_model->cek_dual_login($this->session->userdata('ID_USER'));
        if($count>1){
            require_once(APPPATH.'/libraries/phpmailer/class.phpmailer.php');
            $mail = new PHPMailer;

            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->SMTPAuth = true; // enable SMTP authentication
            $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
            $mail->Host = "geosolution-sby.com"; //host
            $mail->Port = 465; //port smtp
            $mail->Username = "geosolut"; //username
            $mail->Password = "t5seP48j2R"; //password

            //Typical mail data
            $mail->AddAddress($this->session->userdata('EMAIL'));
            $mail->SetFrom('admin@geosolution-sby.com', 'Admin Geosolution');
            $mail->Subject = "Multiple Login Detected";
            $mail->Body = "Multiple login detected click this link to validate and login again :".base_url()."backoffice/reset_user_login";

            if($mail->Send()){
                $mail->ClearAllRecipients();
                redirect(base_url().'backoffice/cek_your_mail');
            }else{
                $mail->ClearAllRecipients();
                $this->session->set_flashdata('errors', 'Multiple login detected, failed send email');
                redirect(base_url().'member/index');
            }
        }
    }

    public function cek_your_mail(){
        $this->load->view("backend/cek_email");
    }

    public function reset_user_login(){
        $query= $this->login_history_model->cek_dual_login($this->session->userdata('ID_USER'));
        foreach($query as $row){
            $arrayData=array(
                'ID_USER' => $row->ID_USER,
                'IP_ADDRESS' => $row->IP_ADDRESS,
                'TIME' => strtotime(date("Y-m-d H:i:s")),
                'IS_ONLINE' => 0
            );
            $this->global_model->insert('login_history',$arrayData);
//            $this->global_model->update('login_history',$arrayData,'ID_HISTORY',$row->ID_HISTORY);
        }
        $this->session->set_flashdata('errors', 'Please login again');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('ID_USER');
        $this->session->unset_userdata('ID_GROUP');
        $this->session->unset_userdata('EMAIL');
        redirect(base_url().'member/index');
    }

    public function getAll($table){
//        $this->db->select('*');
//        $this->db->from('kontent_page');
//        $this->db->join('comments', 'comments.id = kontent_page.id');
//        $this->db->where('ID_Member', $member);
//        $this->db->where('type', $type);
//        $query = $this->db->get($table, $start, $end);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function getByAttribute($table, $arrayData){
//        $this->db->select('*');
//        $this->db->from('kontent_page');
//        $this->db->join('comments', 'comments.id = kontent_page.id');
//        $this->db->where('ID_Member', $member);
//        $this->db->where('type', $type);
//        $query = $this->db->get($table, $start, $end);
//        $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
        $query = $this->db->get_where($table, $arrayData);
        return $query->result();
    }
}
