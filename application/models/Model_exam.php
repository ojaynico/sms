<?php
class Model_exam extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    function updateStatus($id, $status){
        $this->db->where("id", $id);
        $this->db->update("examinee", $status);
    }
    
    public function update()
        {
            $id = $_REQUEST['editid'];
            $this->db->where('id',$id);
            $query = $this->db->get('examinee');
            return $result = $query->result();
    }
    
    function status_update($id, $data)
    {
          $this->db->where('id',$id);
          $query=  $this->db->update('examinee', $data);
           return $query ;
    }
}
