<?php

class User_model extends CI_Model
{
    function insertUser($data)
    {
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() >= 0) {
            return true;
        } 
        else
        {
            return false;
        }
    }

    function getUsers()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }
    
    function getUser($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    function updateUser($data,$id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('users', $data);
        if ($this->db->affected_rows() >= 0) {
            return true;
        } 
        else
        {
            return false;
        }
    }
    
    function deleteUser($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('users');
        if ($this->db->affected_rows() >= 0) {
            return true;
        } 
        else
        {
            return false;
        }
    }
    
    function registerUser($data)
    {
        $this->db->insert('login', $data);
    }
    
    function checkPassword($password,$email)
    {
        $query = $this->db->query("SELECT username, email, status FROM login WHERE password='$password' AND email='$email' AND status='1'");
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    
}