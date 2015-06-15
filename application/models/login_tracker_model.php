<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_tracker_model extends CI_Model {
    //fungsi login
    public function cek_ip($ip){
        $this->db->select('*');
        $this->db->from('login_tracker');

        $this->db->where('IP_ADDRESS', $ip);

        $query = $this->db->get();
        return $query->result();
    }
}
?>