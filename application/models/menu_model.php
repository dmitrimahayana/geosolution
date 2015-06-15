<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends CI_Model {

    //fungsi get all
    public function get_all(){
        $sql = "
        SELECT query1.`ID_PARENT` AS parent_ID, parent.`NAME_MENU` AS parent_menu, query1.ID_MENU,`NAME_CATEGORY`,
        query1.`NAME_MENU`,query1.`ORDERING_MENU`, query1.`LINK_MENU`, query1.`ONLINE_MENU`, query1.`METADATA`
        FROM (
            SELECT `ID_PARENT`,`ID_MENU`,`menu_category`.`NAME_CATEGORY`, `NAME_MENU`, menu.ID_MENU_CATEGORY, `ORDERING_MENU`, `LINK_MENU`, `ONLINE_MENU`, `METADATA`
            FROM `menu`
            INNER JOIN `menu_category`
            ON menu_category.ID_MENU_CATEGORY=menu.ID_MENU_CATEGORY
        )query1
        LEFT JOIN menu parent
        ON query1.ID_PARENT=parent.ID_MENU
        ORDER BY parent_ID DESC, query1.ID_MENU_CATEGORY DESC, query1.ORDERING_MENU DESC
        ";

//        $query = $this->db->get();
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insert($arrayData){
        $this->db->insert('menu',$arrayData);
        return $this->db->insert_id();
    }

    public function getSome($ID_MENU){
        $sql = "
        SELECT `ID_MENU_LANG`, lang.`ID_LANG`, `ID_MENU`, `TEXT_MENU`, LANG
        FROM `menu_lang`
        INNER JOIN lang
        ON lang.`ID_LANG`=`menu_lang`.`ID_LANG`
        WHERE `ID_MENU`=".$ID_MENU." and ONLINE_LANG=1";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function check_lang_count($id){
        $sql = '
        SELECT * FROM lang WHERE `ONLINE_LANG`=1 AND
        `ID_LANG` NOT IN (
        SELECT ID_LANG FROM `menu_lang` where ID_MENU='.$id.'
        )';

        $query = $this->db->query($sql);
//        return $query->result();
        return $query->num_rows();
    }

    public function check_lang($id){
        $sql = '
        SELECT * FROM lang WHERE `ONLINE_LANG`=1 AND
        `ID_LANG` NOT IN (
        SELECT ID_LANG FROM `menu_lang` where ID_MENU='.$id.'
        )';

        $query = $this->db->query($sql);
        return $query->result();
//        return $query->num_rows();
    }
}
?>