<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder =  $this->db->table('users');
    }

    public function valid($username, $password)
    {

        $this->builder->select('name');
        $this->builder->select('password');
        $this->builder->where('name', $username) and $this->builder->where('password', $password);
        $this->builder->where('suspend',0);
        $results = $this->builder->countAllResults();

        if ($results == 1) {
            return true;
        }
            return false;
        
    }
    public function exist($username){
        $this->builder->select('name');
        $this->builder->select('password');
        $this->builder->where('name', $username);
        
        $results = $this->builder->countAllResults();

        if ($results == 1) {
            return true;
        }
            return false;
    }
    public function existEdit($username,$user_id){
        
        $this->builder->select('name');
        $this->builder->select('password');
        $this->builder->where('name', $username);
        $this->builder->where('id !=', $user_id);
        $results = $this->builder->countAllResults();

        if ($results == 1) {
            return true;
        }
            return false;
    }
    public function list()
    {
 
        $this->builder->select('password');
        $this->builder->select('id');
        $this->builder->select('name');
        $this->builder->select('suspend');
    
        
        return (array) $this->builder->get()->getResultArray();
    }
    public function deleteRow($user_id)
    {
        $this->builder->delete(['id' => $user_id]);
    }
    public function add($data)
    {
        $this->builder->insert($data);
    }
    public function getById($user_id)
    {

        $this->builder->select('id');
        $this->builder->select('name');
        $this->builder->select('suspend');
        $this->builder->where('id', $user_id);

        return (array) $this->builder->get()->getRowArray();
    }
    public function edit($data, $user_id)
    {

        $this->builder->where('id', $user_id);
        $this->builder->update($data);
    }
}