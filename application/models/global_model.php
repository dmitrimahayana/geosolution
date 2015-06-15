<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_model extends CI_Model {

    //fungsi untuk insert data
    public function insert($table,$arrayData){
        $this->db->insert($table,$arrayData);
    }

    //fungsi untuk update data
    public function update($table,$arrayData,$idColumn,$id)
    {
        $this->db->where($idColumn, $id);
        $this->db->update($table, $arrayData);
    }

    //fungsi untuk delete data
    public function delete($table,$idColumn,$id)
    {
        $this->db->where($idColumn, $id);
        $this->db->delete($table);
    }

    public function getAll($table){
//        $this->db->select('*');
//        $this->db->from('kontent_page');
//        $this->db->join('comments', 'comments.id = blogs.id');
//        $this->db->where('ID_Member', $member);
//        $this->db->where('type', $type);
//        $query = $this->db->get($table, $start, $end);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function getByAttribute($table,$arrayData){
//        $this->db->select('*');
//        $this->db->from('kontent_page');
//        $this->db->join('comments', 'comments.id = blogs.id');
//        $this->db->where('ID_Member', $member);
//        $this->db->where('type', $type);
//        $query = $this->db->get($table, $start, $end);
//        $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
        $query = $this->db->get_where($table, $arrayData);
        return $query->result();
    }
}

?>
