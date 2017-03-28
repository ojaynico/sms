<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 11/21/16
 * Time: 11:31 AM
 */
class Login_m extends CI_Model{

    function loginUser($email, $password){
        $this->db->select('*');
        $this->db->from('userlogin');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get();

        return $query->result();
    }
}