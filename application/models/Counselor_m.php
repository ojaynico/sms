<?php
class Counselor_m extends CI_Model{
    
function _construct()
{
    parent::_construct();

}
function form_insert($data){
    $this->db->insert('counselor',$data);
}
function getCounselsList(){
    
        $this->db->where('counseled',0);
        $query = $this->db->get('students');
        return $query->result();
}
 function getCounselDetails($id){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
     
      } 
