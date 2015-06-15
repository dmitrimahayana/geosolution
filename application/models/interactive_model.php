<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Interactive_model extends CI_Model {

    //fungsi get all
    public function get_all(){
        $this->db->select('*');
        $this->db->from('interactive');
        $this->db->order_by("ID_INTERACTIVE", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    public function insert($arrayData){
        $this->db->insert('interactive',$arrayData);
        return $this->db->insert_id();
    }

    public function getSome($ID){
        $this->db->select('*');
        $this->db->from('interactive');
        $this->db->where("ID_INTERACTIVE",$ID);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_some_lang($ID){
        $sql = "
        SELECT ID_INTERACTIVE_LANG, lang.ID_LANG, ID_INTERACTIVE, LANG, DESCRIPTION, TITLE
        FROM interactive_lang
        INNER JOIN lang
        ON lang.ID_LANG=interactive_lang.ID_LANG
        WHERE ID_INTERACTIVE=".$ID." AND ONLINE_LANG=1";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function check_lang_count($id){
        $sql = '
        SELECT * FROM lang WHERE `ONLINE_LANG`=1 AND
        `ID_LANG` NOT IN (
        SELECT ID_LANG FROM `interactive_lang` WHERE ID_INTERACTIVE='.$id.'
        )';

        $query = $this->db->query($sql);
//        return $query->result();
        return $query->num_rows();
    }

    public function check_lang($id){
        $sql = '
        SELECT * FROM lang WHERE `ONLINE_LANG`=1 AND
        `ID_LANG` NOT IN (
        SELECT ID_LANG FROM `interactive_lang` WHERE ID_INTERACTIVE='.$id.'
        )';

        $query = $this->db->query($sql);
        return $query->result();
//        return $query->num_rows();
    }

    public function get_for_images(){
        $this->db->select('*');
        $this->db->from('page');
        $this->db->where("ONLINE_PAGE", 1);
        $this->db->order_by("TIME_PAGE", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    public function get_page_by_id($id){
        $this->db->select('*');
        $this->db->from('page');
        $this->db->where("ID_PAGE", $id);

        $query = $this->db->get();
        return $query->result();
    }

    public function show_list_image(){
        $this_dir=getcwd().'/upload/images/';//cangefolder upload
        $dir = opendir($this_dir);        // Open the sucker
        $files = array();
        while ($files[] = readdir($dir));
        sort($files);
        closedir($dir);

        $files_new = array();
        foreach ($files as $file) {
            $parts = explode(".", $file);                    // pull apart the name and dissect by period
            if (is_array($parts) && count($parts) > 1) {    // does the dissected array have more than one part
                $extension = end($parts);
                $extension= strtolower($extension);
                //MANIPULATE FILENAME HERE, YOU HAVE $file...
                if ($file <> "." && $file <> ".." && !preg_match("/^hide/i",$file)){
                    if($extension=='jpg' || $extension=='png' || $extension=='bmp' || $extension=='gif')
//                        echo $extension.' '."<td><img src='".base_url().'upload/images/'. rawurlencode($file) ."' width='50' height='50'><br /></td>\n";
                        $files_new[]=rawurlencode($file);
                }
            }
        }
        return $files_new;
    }
}
?>