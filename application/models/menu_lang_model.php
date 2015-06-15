<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_lang_model extends CI_Model {

    //fungsi get all
    public function get_all(){
        $this->db->select('*');
        $this->db->from('page_lang');
//        $this->db->order_by("ID_PAGE_", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    public function getSome($ID_PAGE){
        $sql = "
        SELECT ID_PAGE_LANG, lang.ID_LANG, ID_PAGE, LANG, CONTENT, TITLE_
        FROM page_lang
        INNER JOIN lang
        ON lang.ID_LANG=page_lang.ID_LANG
        WHERE ID_PAGE=".$ID_PAGE;

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insert_lang($arrayData){
        $this->db->insert('menu_lang',$arrayData);
//        return $this->db->insert_id();
    }
}
?>