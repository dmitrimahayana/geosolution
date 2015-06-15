<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Message_model extends CI_Model {

    //fungsi get all
    public function get_all(){
        $sql="
        SELECT *
        FROM (
            SELECT *
            FROM (
            SELECT * FROM message
            ORDER BY ID_MESSAGE desc/*, TIME_MESSAGE DESC*/
            )query1
            GROUP BY query1.`ID_PARENT`
            ORDER BY query1.ID_MESSAGE desc
        )query2
        ORDER BY query2.ID_MESSAGE desc
        ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insert($arrayData){
        $this->db->insert('message',$arrayData);
//        return $this->db->insert_id();
    }

    public function getSome($id){
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('ID_PARENT', $id);
        ($id==0)?$this->db->where('ID_MESSAGE', $id):"";
        $this->db->order_by('ID_MESSAGE', 'desc');
//        $this->db->order_by('TIME_MESSAGE', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function checkUsernameAndSubject($username, $subject){
        $sql="
        SELECT * FROM (
        SELECT * FROM message where USERNAME='".$username."' and SUBJECT='".$subject."'
        ORDER BY ID_MESSAGE desc
        )query1
        GROUP BY query1.USERNAME, query1.SUBJECT
        ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getNew(){
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('IS_READ', 0);
//        $this->db->order_by('TIME_MESSAGE', 'desc');

        $query = $this->db->get();
        return $query->num_rows();
    }
}
?>