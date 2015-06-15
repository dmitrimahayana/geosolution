<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images_model extends CI_Model {

    public function get_all(){
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
//                    if($extension=='jpg' || $extension=='png' || $extension=='bmp' || $extension=='gif')
//                    echo $extension.' '."<td><img src='".base_url().'upload/'. rawurlencode($file) ."' width='50' height='50'><br /></td>\n";
                    $files_new[]=rawurlencode($file);
                }
            }
        }
        return $files_new;
    }

}
?>
