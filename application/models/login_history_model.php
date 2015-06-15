<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_history_model extends CI_Model {
    //fungsi login
    public function cek_dual_login($ID_USER){
        $sql = "
        SELECT * FROM (
            SELECT * FROM (
                SELECT * FROM login_history
                WHERE ID_USER=1
                ORDER BY TIME DESC
            ) query1
            GROUP BY IP_ADDRESS
        ) query2
        WHERE IS_ONLINE=1
        ";

        $query = $this->db->query($sql);
//        return $query->result();
        return $query->num_rows();
    }
}
?>