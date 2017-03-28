<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Batcht_m
 *
 * @author Nabakooza Josephine
 */
class Batcht_m extends CI_Model {
    //put your code here
    function addTracker($data){
        $this->db->insert('batch_tracker', $data);
    }
    
    function allTrackers(){
        return $this->db->query('SELECT * FROM batch_tracker')->result();
    }
}
