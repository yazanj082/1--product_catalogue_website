<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{

    public function __construct()
    { 
        $this->db = \Config\Database::connect();
        
        $this->builder =  $this->db->table('products');
    }

    
    public function list()
    {
 
        $this->builder->select('products.order');
        $this->builder->select('products.id');
        $this->builder->select('products.name');
        $this->builder->select('products.description');
        $this->builder->select('products.categorie_id');
        $this->builder->select('products.price');
        $this->builder->select('products.sale_price');
        $this->builder->select('products.enabled');
        $this->builder->select('categories.name as categorie_name');
        $this->builder->join('categories','categories.id=products.categorie_id');
        
        return (array) $this->builder->get()->getResultArray();
    }

    
    public function getList()
    {

        $this->builder->select('id');
        $this->builder->select('name');
        $this->builder->select('description');
        $this->builder->select('categorie_id');
        $this->builder->select('price');
        $this->builder->select('sale_price');
        $this->builder->select('order');
        $this->builder->select('enabled',1);
        
       

        return (array) $this->builder->get()->getResultArray();
    }

    public function getById($product_id)
    {
        $this->builder->select('products.order');
        $this->builder->select('products.id');
        $this->builder->select('products.name');
        $this->builder->select('products.description');
        $this->builder->select('products.categorie_id');
        $this->builder->select('products.price');
        $this->builder->select('products.sale_price');
        $this->builder->select('products.enabled');
        $this->builder->select('categories.name as categorie_name');
        $this->builder->join('categories','categories.id=products.categorie_id');
        $this->builder->where('products.id', $product_id);

        return (array) $this->builder->get()->getRowArray();
    }
  
    public function add($data)
    {
        $this->builder->insert($data);
    }

    public function edit($data, $product_id)
    {

        $this->builder->where('id', $product_id);
        $this->builder->update($data);
    }
  
    public function deleteRow($product_id)
    {
        $this->builder->delete(['id' => $product_id]);
        $Name="product".((string)$product_id);
        unlink('../public/assets/images/'.$Name.'.png');
    }
    public function lastId(){
        
        $last_row =$this->builder->orderBy('id',"desc")
		->limit(1)
		->get()->getRowArray();
		
    
    return($last_row["id"]);

}
public function listNewArrivals()
    {

        $this->builder->select('id');
        $this->builder->select('name');
        $this->builder->select('description');
        $this->builder->select('categorie_id');
        $this->builder->select('price');
        $this->builder->select('sale_price');
        $this->builder->select('order');
        $this->builder->select('enabled');
        $this->builder->orderBy('id','desc');
        $this->builder->limit(10);
        $this->builder->where('enabled',1);
        
       

        return (array) $this->builder->get()->getResultArray();
    }
    public function listSpecialOffers()
    {

        $this->builder->select('id');
        $this->builder->select('name');
        $this->builder->select('description');
        $this->builder->select('categorie_id');
        $this->builder->select('price');
        $this->builder->select('sale_price');
        $this->builder->select('order');
        $this->builder->orderBy('order');
        $this->builder->limit(10);
        $this->builder->select('enabled',1);
        $this->builder->where('sale_price>',0);
        $this->builder->where('enabled',1);
       

        return (array) $this->builder->get()->getResultArray();
    }

    public function filter($categorie_id)
    {

        $this->builder->select('id');
        $this->builder->select('name');
        $this->builder->select('description');
        $this->builder->select('categorie_id');
        $this->builder->select('price');
        $this->builder->select('sale_price');
        $this->builder->select('order');
        $this->builder->select('enabled',1);
        $this->builder->where('categorie_id',$categorie_id);
        $this->builder->where('enabled',1);
       

        return (array) $this->builder->get()->getResultArray();
    }
    public function search($name)
    {

        $this->builder->select('id');
        $this->builder->select('name');
        $this->builder->select('description');
        $this->builder->select('categorie_id');
        $this->builder->select('price');
        $this->builder->select('sale_price');
        $this->builder->select('order');
        $this->builder->select('enabled',1);
        $this->builder->like('name',$name);
        $this->builder->where('enabled',1);
       

        return (array) $this->builder->get()->getResultArray();
    }

}
