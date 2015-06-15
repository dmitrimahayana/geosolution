<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_category_model extends CI_Model {

    //fungsi get all
    public function get_all(){
        $this->db->select('*');
        $this->db->from('menu_category');
        $this->db->order_by("ID_MENU_CATEGORY", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    public function insert($arrayData){
        $this->db->insert('menu_category',$arrayData);
        return $this->db->insert_id();
    }

    public function getSome($ID){
        $this->db->select('*');
        $this->db->from('menu_category');
        $this->db->where("ID_MENU_CATEGORY",$ID);
//        $this->db->order_by("ID_MENU_CATEGORY", "desc");

        $query = $this->db->get();
        return $query->result();
    }
}
?>