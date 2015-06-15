<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile_model extends CI_Model {
    //fungsi login
    public function login($username,$password){
        $this->db->select('*');
        $this->db->from('user');

        $this->db->where('USERNAME', $username);
        $this->db->where('PASSWORD',md5($password));

        $query = $this->db->get();
        return $query->result();
    }

    //fungsi get all
    public function get_all(){
        $this->db->select('ID_USER, user.ID_GROUP, GROUP_NAME, JOIN_DATE, LAST_VISIT, USERNAME, PASSWORD, EMAIL, ACTIVE');
        $this->db->from('user');
        $this->db->join('user_group', 'user_group.ID_GROUP = user.ID_GROUP');
        $this->db->order_by("ID_USER", "asc");

        $query = $this->db->get();
        return $query->result();
    }

    public function insert($arrayData){
        $this->db->insert('user',$arrayData);
        return $this->db->insert_id();
    }

    public function getSome($ID){
        $this->db->select('ID_USER, user.ID_GROUP, GROUP_NAME, JOIN_DATE, LAST_VISIT, USERNAME, PASSWORD, EMAIL, ACTIVE');
        $this->db->from('user');
        $this->db->join('user_group', 'user_group.ID_GROUP = user.ID_GROUP');
        $this->db->where("ID_USER",$ID);
//        $this->db->order_by("ID_MENU_CATEGORY", "desc");

        $query = $this->db->get();
        return $query->result();
    }
}
?>