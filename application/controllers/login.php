<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('login_tracker_model');
    }

	public function index()
	{
        $username= $this->session->userdata('USERNAME');
        if($username){
            redirect(base_url().'backoffice/index');
        }
        $this->cannot_login();
		$this->load->view('backend/login');
	}

    public function  cannot_login(){
        $query=$this->global_model->getByAttribute('login_tracker',array('IP_ADDRESS' => $this->input->ip_address()));
        foreach($query as $key){
            if($key->FAILURE==3){
                    redirect(base_url().'member/wait_login');
            }
        }
    }

    public function wait_login(){
        $query['time']=$this->global_model->getByAttribute('login_tracker',array('IP_ADDRESS' => $this->input->ip_address()));
        $this->load->view('backend/wait_login',$query);
    }

    public function update_login(){
        $arrayData=array(
            'FIRST_TIME' => null,
            'FAILURE' => 0
        );
        $this->global_model->update('login_tracker',$arrayData, "IP_ADDRESS", $this->input->ip_address() );
        redirect(base_url().'member/index');
    }

    public function validation_login(){
        $this->form_validation->set_rules('username','username','trim|required|xss_clean|callback_check_regex');
        $this->form_validation->set_rules('password','password','trim|required|xss_clean|callback_check_regex|callback_check_database');

        if($this->form_validation->run()==FALSE){
            //jika gagal login
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url().'member/index');
        }
        else
        {
            //jika berhasil login
            $timeInteger=strtotime(date("Y-m-d H:i:s"));
            $arrayData=array( 'LAST_VISIT' => $timeInteger );
            $this->global_model->update('user',$arrayData,"USERNAME", $this->session->userdata('USERNAME'));
            $arrayData2=array(
                'ID_USER' => $this->session->userdata('ID_USER'),
                'IP_ADDRESS' => $this->input->ip_address(),
                'TIME' => $timeInteger,
                'IS_ONLINE' => 1
            );
            $this->global_model->insert('login_history',$arrayData2);
//            echo date('Y-m-d', strtotime($today)).'<br/>';
            $this->session->set_flashdata('success', "Success Login");
            redirect(base_url().'backoffice/index');
        }
    }

    public function check_regex($str){
        if(preg_match('/[^.a-zA-Z0-9 ]/i', $str)){
            $this->form_validation->set_message('check_regex', 'inputan salah atau tidak sesuai');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function check_database($password){
        //jika validasi sukses validasi dengan database
        $username=  $this->input->post('username');
        //query database
        $result=$this->user_model->login($username,$password);
        $tracker=$this->login_tracker_model->cek_ip($this->input->ip_address());
        if($result)
        {
            foreach($result as $row){
                if($row->ACTIVE==1){
                    $array_session=array(
                        'USERNAME'=>    $row->USERNAME,
                        'ID_USER'=>     $row->ID_USER,
                        'ID_GROUP'=>    $row->ID_GROUP,
                        'EMAIL'=>       $row->EMAIL
                    );
                    $this->session->set_userdata($array_session);
                    if($tracker){
                        $timeInteger=strtotime(date("Y-m-d H:i:s"));
                        $arrayData=array(
                            'FIRST_TIME' => null,
                            'FAILURE' => 0
                        );
                        $this->global_model->update('login_tracker',$arrayData, "IP_ADDRESS", $this->input->ip_address() );
                    }
                    else {
                        $timeInteger=strtotime(date("Y-m-d H:i:s"));
                        $arrayData=array(
                            'IP_ADDRESS' => $this->input->ip_address(),
                            'FIRST_TIME' => $timeInteger,
                            'FAILURE' => 0
                        );
                        $this->global_model->insert('login_tracker',$arrayData);
                    }
                    return TRUE;
                }
                else {
                    $this->form_validation->set_message('check_database','account is not active');
                    return false;
                }
            }
        }
        else
        {
            if($tracker){
                foreach($tracker as $key){
                    $fail=$key->FAILURE;
                    $fail+=1;
                    $timeInteger=strtotime(date("Y-m-d H:i:s"));
                    $arrayData=array(
                        'FIRST_TIME' => $timeInteger,
                        'FAILURE' => $fail
                    );
                    $this->global_model->update('login_tracker',$arrayData, "IP_ADDRESS", $this->input->ip_address() );
                }
            }
            else {
                $timeInteger=strtotime(date("Y-m-d H:i:s"));
                $arrayData=array(
                    'IP_ADDRESS' => $this->input->ip_address(),
                    'FIRST_TIME' => $timeInteger,
                    'FAILURE' => 1
                );
                $this->global_model->insert('login_tracker',$arrayData);
            }
            $this->form_validation->set_message('check_database','invalid username or password');
            return false;
        }
    }

    public function log_out(){
        $timeInteger=strtotime(date("Y-m-d H:i:s"));
        $arrayData2=array(
            'ID_USER' => $this->session->userdata('ID_USER'),
            'IP_ADDRESS' => $this->input->ip_address(),
            'TIME' => $timeInteger,
            'IS_ONLINE' => 0
        );
        $this->global_model->insert('login_history',$arrayData2);
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('ID_USER');
        $this->session->unset_userdata('ID_GROUP');
        $this->session->unset_userdata('EMAIL');
        redirect(base_url().'member/index');
    }
}