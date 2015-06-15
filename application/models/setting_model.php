<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting_model extends CI_Model {

    //fungsi get by attr
    public function get_all_byAttributes($typeColumn, $columnVal,$columnOrder,$ordering){
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->where($typeColumn, $columnVal);
        $this->db->order_by($columnOrder, $ordering);

        $query = $this->db->get();
        return $query->result();
    }

    //fungsi get all
    public function get_all(){
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->order_by("ID_SETTING", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    public function get_some($id){
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->where("ID_SETTING", $id);

        $query = $this->db->get();
        return $query->result();
    }
}
?>