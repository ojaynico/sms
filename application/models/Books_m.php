<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/14/16
 * Time: 12:13 PM
 */

class Books_m extends CI_Model{

    function form_insert($data){
        $this->db->insert('books', $data);
    }
    
    function deleteBook($id){
        $this->db->where('id', $id);
        $this->db->delete('books');
    }

    function getBookList(){
        $this->db->select('*');
        $this->db->from('books');
        $query = $this->db->get();
        return $query->result();
    }
    function editBook($id, $data){
        $this->db->where('id', $id);
        $this->db->update('books', $data);

    }
    function getBookDetails($id){
        $this->db->select('*');
        $this->db->from('books');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
}