<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('frontend_page_model');
    }

    public function page($name_page, $lang){
        $query['name_page'] = $name_page;
        $query['lang'] = $lang;
        $query['menu'] = $this->frontend_page_model->get_menu($lang);
        $query['all_lang'] = $this->frontend_page_model->get_lang();
        if($name_page=='home'){
            $query['slider'] = $this->frontend_page_model->get_slider($lang);
            $this->load->view("frontend/home",$query);
        }
        else {
            $query['page'] = $this->frontend_page_model->getPage($name_page,$lang);
            $this->load->view("frontend/content_page",$query);
        }
    }

    public function message($type,$lang){
//        echo $type.' '.$lang.' '.$this->input->post('name').' '.$this->input->post('subject').' '.$this->input->post('message');
        switch($type):
            case 'insert':
                sleep(5);
                $this->load->model('message_model');
                $query=$this->message_model->checkUsernameAndSubject($this->input->post('name'), $this->input->post('subject'));

                if($query){
//                    echo 'found ';
                    $parent=0;
                    foreach($query as $key){
//                        echo $key->ID_MESSAGE.' '.$key->ID_PARENT.'<br/>';
                        if($key->ID_PARENT!=0)
                            $parent=$key->ID_PARENT;
                        else
                            $parent=$key->ID_MESSAGE;
                    }
                    echo $parent;
                    $arrayPage=array(
                        'ID_PARENT' => $parent,
                        'SUBJECT' => $this->input->post('subject'),
                        'USERNAME' => $this->input->post('name'),
                        'TIME_MESSAGE' => strtotime(date("Y-m-d H:i:s")),
                        'IS_READ' => 0,
                        'TEXT_MESSAGE' => $this->input->post('message')
                    );
                    $this->db->insert('message',$arrayPage);
                }
                else {
//                    echo 'not found';
                    $arrayPage=array(
                        'ID_PARENT' => 0,
                        'SUBJECT' => $this->input->post('subject'),
                        'USERNAME' => $this->input->post('name'),
                        'TIME_MESSAGE' => strtotime(date("Y-m-d H:i:s")),
                        'IS_READ' => 0,
                        'TEXT_MESSAGE' => $this->input->post('message')
                    );
                    $this->db->insert('message',$arrayPage);
                }
                redirect(base_url().'home/'.$lang);
                break;
        endswitch;
    }
}