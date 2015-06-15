<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_group_model extends CI_Model {
    //fungsi get all
    public function get_all(){
        $this->db->select('*');
        $this->db->from('user_group');
        $this->db->order_by("LEVEL", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    public function insert($arrayData){
        $this->db->insert('user_group',$arrayData);
        return $this->db->insert_id();
    }

    public function getSome($ID){
        $this->db->select('*');
        $this->db->from('user_group');
        $this->db->where("ID_GROUP",$ID);
//        $this->db->order_by("ID_MENU_CATEGORY", "desc");

        $query = $this->db->get();
        return $query->result();
    }
}
?>