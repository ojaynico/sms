<?php

/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 12/5/16
 * Time: 11:20 AM
 */
class Discount_m extends CI_Model
{

    function updateAmount($amount, $id){
        $this->db->update('discount', $amount);
        $this->db->where('student_id', $id);
        $this->db->where('program', "diploma");
    }
}