<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page_model extends CI_Model {

    //fungsi get all
    public function get_all(){
        $this->db->select('*');
        $this->db->from('page');
        $this->db->order_by("ID_PAGE", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    public function insert($arrayData){
        $this->db->insert('page',$arrayData);
        return $this->db->insert_id();
    }

    public function getSome($ID_PAGE){
        $sql = "
        SELECT ID_PAGE_LANG, lang.ID_LANG, ID_PAGE, LANG, CONTENT, TITLE_
        FROM page_lang
        INNER JOIN lang
        ON lang.ID_LANG=page_lang.ID_LANG
        WHERE ID_PAGE=".$ID_PAGE." and ONLINE_LANG=1";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function check_lang_count($id){
        $sql = '
        SELECT * FROM lang WHERE `ONLINE_LANG`=1 AND
        `ID_LANG` NOT IN (
        SELECT ID_LANG FROM `page_lang` where ID_PAGE='.$id.'
        )';

        $query = $this->db->query($sql);
//        return $query->result();
        return $query->num_rows();
    }

    public function check_lang($id){
        $sql = '
        SELECT * FROM lang WHERE `ONLINE_LANG`=1 AND
        `ID_LANG` NOT IN (
        SELECT ID_LANG FROM `page_lang` where ID_PAGE='.$id.'
        )';

        $query = $this->db->query($sql);
        return $query->result();
//        return $query->num_rows();
    }
}
?>