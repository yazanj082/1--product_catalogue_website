<?php

namespace App\Controllers;
use App\Models\CategoriesModel;
use App\Models\ProductsModel;
class Home extends BaseController
{   private $products_model;
	private $categories_model;
    public function __construct()
    {
		$this->products_model = new ProductsModel();
        $this->categories_model = new CategoriesModel();
    }
	public function index()
	{	
		$data['categories'] = $this->categories_model->getList();
	
		$data['new_products'] = $this->products_model->listNewArrivals();
		$data['special_offers'] = $this->products_model->listSpecialOffers();

		$this->loadView('home','Home',$data);
		
	}
	public function product($product_id){
		$data['product']=$this->products_model->getById($product_id);
		$data['categories'] = $this->categories_model->getList();
            $this->loadView('product','product',$data);

	}
	public function allProducts(){
		$data['categories'] = $this->categories_model->getList();
	
		$data['products'] = $this->products_model->getList();
		

		$this->loadView('allproducts','All Products',$data);
	}
	public function filter($categorie_id){
		$data['products']=$this->products_model->filter($categorie_id);
		$data['categories'] = $this->categories_model->getList();
            $this->loadView('filter','product',$data);

	}
	public function search(){
		if ( $this->request->getMethod() == 'post'){
			$name=$this->request->getPost('name');
			
		$data['products']=$this->products_model->search($name);
		$data['categories'] = $this->categories_model->getList();
		
            $this->loadView('search','Search',$data);}
			else{return $this->index();
			}

	}
}
