<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lang_model extends CI_Model {

    //fungsi get by attr
    public function get_all_byAttributes($typeColumn, $columnVal,$columnOrder,$ordering){
        $this->db->select('*');
        $this->db->from('lang');
        $this->db->where($typeColumn, $columnVal);
        $this->db->order_by($columnOrder, $ordering);

        $query = $this->db->get();
        return $query->result();
    }

    //fungsi get all
    public function get_all(){
        $this->db->select('*');
        $this->db->from('lang');
        $this->db->order_by("ORDERING_LANG", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    public function insert($arrayData){
        $this->db->insert('lang',$arrayData);
        return $this->db->insert_id();
    }

    public function getSome($ID){
        $this->db->select('*');
        $this->db->from('lang');
        $this->db->where("ID_LANG",$ID);
//        $this->db->order_by("ID_MENU_CATEGORY", "desc");

        $query = $this->db->get();
        return $query->result();
    }
}
?>