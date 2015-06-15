<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_page_model extends CI_Model {

    public function get_lang(){
        $this->db->select('*');
        $this->db->from('lang');
        $this->db->where('ONLINE_LANG', 1);
        $this->db->order_by('ORDERING_LANG', 'asc');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_slider($lang){
        $sql="
        select query2.ID_INTERACTIVE, query2.ID_LANG, query2.NAMA, query2.IMAGES, query2.DATE, query2.LINK, query2.TITLE, query2.DESCRIPTION, page.NAME_PAGE
        FROM (
            select query1.ID_INTERACTIVE, query1.ID_LANG, query1.NAMA, query1.IMAGES, query1.DATE, query1.LINK, query1.TITLE, query1.DESCRIPTION
            FROM(
                SELECT i.ID_INTERACTIVE, il.ID_LANG, i.NAMA, i.IMAGES, i.DATE, i.LINK, il.TITLE, il.DESCRIPTION
                from interactive i
                INNER JOIN interactive_lang il
                on i.ID_INTERACTIVE=il.ID_INTERACTIVE
            )query1
            INNER JOIN lang
            ON LANG.ID_LANG=query1.ID_LANG
            where LANG.ONLINE_LANG=1
         )query2
        INNER JOIN page
        on page.ID_PAGE=query2.LINK
        WHERE query2.ID_LANG=".$lang."
        order by query2.ID_INTERACTIVE desc
        ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_menu($id){
        $sql = "
        select * from (
            SELECT query1.ID_MENU,`NAME_CATEGORY`,query1.`NAME_MENU`,query1.`ORDERING_MENU`, query1.`LINK_MENU`,
            query1.`ONLINE_MENU`, query1.`METADATA`, mn.TEXT_MENU, mn.ID_LANG
            FROM (
                    SELECT `ID_PARENT`,`ID_MENU`,`menu_category`.`NAME_CATEGORY`, `NAME_MENU`,
                    menu.ID_MENU_CATEGORY, `ORDERING_MENU`, `LINK_MENU`, `ONLINE_MENU`, `METADATA`
                    FROM `menu`
                    INNER JOIN `menu_category`
                    ON menu_category.ID_MENU_CATEGORY=menu.ID_MENU_CATEGORY
            )query1
            INNER JOIN menu_lang mn
            ON query1.ID_MENU=mn.ID_MENU
            ORDER BY query1.ORDERING_MENU asc
        )query2
        where ID_LANG=".$id." and ONLINE_MENU=1
        ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPage($name_page,$id_lang){
        $sql = "
        select page.NAME_PAGE, page.TIME_PAGE, page.METADATA ,query1.LANG, query1.CONTENT, query1.TITLE_
        from (
            SELECT ID_PAGE_LANG, lang.ID_LANG, ID_PAGE, LANG, CONTENT, TITLE_
            FROM page_lang
            INNER JOIN lang
            ON lang.ID_LANG=page_lang.ID_LANG
            WHERE ONLINE_LANG=1
        )query1
        INNER JOIN page
        on page.ID_PAGE=query1.ID_PAGE
        where page.NAME_PAGE='".$name_page."' and query1.ID_LANG=".$id_lang;

        $query = $this->db->query($sql);
        return $query->result();
    }

}

?>
