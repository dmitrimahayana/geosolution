<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend_page_model extends CI_Model {

    public function menu(){
        $sql = "
        SELECT * FROM `backend_page`
        WHERE `ID_PARENT_BACKEND` IS NULL
        ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function sub_menu($ID_GROUP, $ID_PARENT){
        $sql = "
        SELECT * FROM (
            SELECT backend_access.ID_BACKEND_PAGE, ID_GROUP, `ID_PARENT_BACKEND`, `NAME_BACKEND`,
                `ORDERING_BACKEND`, `LINK_BACKEND`, `ONLINE_BACKEND`, `DISPLAY_NAME`
            FROM backend_access
            INNER JOIN backend_page
            ON backend_access.ID_BACKEND_PAGE=backend_page.ID_BACKEND_PAGE
            ) query1
        WHERE `ID_GROUP`=".$ID_GROUP." AND `ONLINE_BACKEND`=1 AND `ID_PARENT_BACKEND`=".$ID_PARENT."
        ORDER BY ID_PARENT_BACKEND, ORDERING_BACKEND
        ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function show_access($ID){
        $this->db->select('ba.ID_BACKEND_PAGE, bp.NAME_BACKEND, ba.ID_GROUP');
        $this->db->from('backend_access ba');
        $this->db->join('backend_page bp', 'ba.ID_BACKEND_PAGE=bp.ID_BACKEND_PAGE');
        $this->db->where("ba.ID_GROUP",$ID);
        $this->db->where("ONLINE_BACKEND",1);

        $query = $this->db->get();
        return $query->result();
    }

    public function show_access_remain($ID){
        $sql="
        SELECT `ID_BACKEND_PAGE`, `NAME_BACKEND`
        FROM `backend_page`
        WHERE `ONLINE_BACKEND`=1 AND `ID_PARENT_BACKEND` IS NOT NULL AND `ID_BACKEND_PAGE` NOT IN
        (
            SELECT ba.ID_BACKEND_PAGE
            FROM backend_access ba
            LEFT JOIN backend_page bp
            ON ba.ID_BACKEND_PAGE=bp.ID_BACKEND_PAGE
            WHERE ba.ID_GROUP=".$ID."
        )
        ";

        $query = $this->db->query($sql);
        return $query->result();
    }
}

?>
