<?php

/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/28/16
 * Time: 4:43 PM
 */
class Dashboard_m extends CI_Model
{

    function getUsers()
    {
        $this->db->select('*');
        $this->db->from('userlogin');
    }

    function certificateCount()
    {
        $query = $this->db->query("SELECT * FROM students WHERE program = 'certificate'");
        return $query->num_rows();
    }

    function diplomaCount()
    {
        $query = $this->db->query("SELECT * FROM students WHERE program = 'diploma'");
        return $query->num_rows();
    }

    function trainerCount()
    {
        $query = $this->db->query("SELECT * FROM teaching_staff");
        return $query->num_rows();
    }

    function bookCount()
    {
        $query = $this->db->query("SELECT * FROM books");
        return $query->num_rows();
    }

    function getRoles()
    {
        $this->db->select("*");
        $this->db->from("roles");
        $query = $this->db->get();
        return $query->result();
    }

    function insertAdmin($data)
    {
        $this->db->insert('userlogin', $data);
    }

    function getAdminUsers()
    {
        $query = $this->db->query("SELECT * FROM userlogin WHERE role != 6");
        return $query->result();
    }

    function getRoleName($role)
    {
        $this->db->select("*");
        $this->db->from("roles");
        $this->db->where("role", $role);
        $query = $this->db->get();
        return $query->result();
    }

    function userDetails($id, $role)
    {
        if ($role == 1) {
            $this->db->select("*");
            $this->db->from("non_teaching_staff");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->result();
        } else if ($role == 2) {
            $this->db->select("*");
            $this->db->from("non_teaching_staff");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->result();
        } else if ($role == 3) {
            $this->db->select("*");
            $this->db->from("teaching_staff");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->result();
        } else if ($role == 4) {
            $this->db->select("*");
            $this->db->from("non_teaching_staff");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->result();
        } else if ($role == 5) {
            $this->db->select("*");
            $this->db->from("non_teaching_staff");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->result();
        } else if ($role == 6) {
            $this->db->select("*");
            $this->db->from("students");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->result();
        } else if ($role == 7) {
            $this->db->select("*");
            $this->db->from("non_teaching_staff");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->result();
        } else if ($role == 8) {
            $this->db->select("*");
            $this->db->from("non_teaching_staff");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->result();
        } else if ($role == 9) {
            $this->db->select("*");
            $this->db->from("non_teaching_staff");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->result();
        } else if ($role == 10) {
            $this->db->select("*");
            $this->db->from("non_teaching_staff");
            $this->db->where("id", $id);
            $query = $this->db->get();
            return $query->result();
        }
    }
}