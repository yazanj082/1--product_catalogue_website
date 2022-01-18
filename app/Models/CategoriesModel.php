<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder =  $this->db->table('categories');
    }

    
    public function list()
    {

 

        $this->builder->select('id');
        $this->builder->select('name');
        $this->builder->select('order');
        $this->builder->select('enabled');
        

        return (array) $this->builder->get()->getResultArray();
    }

    
    public function getList()
    {

        $this->builder->select('id');
        $this->builder->select('name');
        $this->builder->select('order');
        $this->builder->orderBy('order');
        $this->builder->where('enabled', 1);
       

        return (array) $this->builder->get()->getResultArray();
    }

    public function getById($categorie_id)
    {

        $this->builder->select('id');
        $this->builder->select('name');
        $this->builder->select('enabled');
        $this->builder->select('order');
        $this->builder->where('id', $categorie_id);

        return (array) $this->builder->get()->getRowArray();
    }
  
    public function add($data)
    {
        $this->builder->insert($data);
    }

    public function edit($data, $categorie_id)
    {

        $this->builder->where('id', $categorie_id);
        $this->builder->update($data);
    }
  
    public function deleteRow($categorie_id)
    {
        $this->builder->delete(['id' => $categorie_id]);
    }
}
