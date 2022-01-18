<?php 

namespace App\Controllers\Admin;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;
class Products extends BaseController{
    private $products_model;
    private $categories_model;
    public function __construct()
    { 
        $this->products_model = new ProductsModel();
        $this->categories_model = new CategoriesModel();
    }
    public function index(){
        $session=session();
        if(!$session->has('username'))
        {
            return redirect()->to(base_url('Admin/Auth'));
        }
        $data['products'] = $this->products_model->list();
        
        $this->loadView('Products/index','Products',$data);
        

    }
    private function addIsValid()
    {

        $rules = [
            'name' => [
                'label' => 'categorie name',
                'rules' => 'required|min_length[2]|max_length[100]'
            ],
            'price' => [
                'label' => 'price',
                'rules' => 'required'
            ],
           
            
            'order' => [
                'label' => 'order',
                'rules' => 'required'
            ],
            
        ];

        if ($this->validate($rules) == false) {

            $this->errors = $this->validator->getErrors();

            return false;
        }

        return true;
    }
    private function editIsValid()
    {

        $rules = [
            'name' => [
                'label' => 'categorie name',
                'rules' => 'required|min_length[2]|max_length[100]'
            ],
            'price' => [
                'label' => 'price',
                'rules' => 'required'
            ],
            
            
            'order' => [
                'label' => 'order',
                'rules' => 'required'
            ],
            
        ];

        if ($this->validate($rules) == false) {

            $this->errors = $this->validator->getErrors();

            return false;
        }

        return true;
    }
    

    

    public function deleteRow($product_id)
    {

        $this->products_model->deleteRow($product_id);
        return redirect()->to(base_url('Admin/Products'));
    }

  
    public function edit($product_id){
        


        $session=session();
        if(!$session->has('username'))
        {
            return redirect()->to(base_url('Admin/Auth'));
        }
        
        if ( $this->request->getMethod() == 'post' && $this->editIsValid() ){
            $en;


            $imagefile = $this->request->getFile('image');
            if($imagefile->isValid() ){
                $newName ="product".((string)$product_id);
                unlink('../public/assets/images/'.$newName.'.png');
                $imagefile->move('../public/assets/images', $newName.'.png');}


            if($this->request->getPost('enabled')!=null){$en=1;}else{$en=0;}
            
            $data=[
                'name'=>$this->request->getPost('name'),
                'order'=>$this->request->getPost('order'),
                'description'=>$this->request->getPost('description'),
                'price'=>$this->request->getPost('price'),
                'sale_price'=>$this->request->getPost('sale_price'),
                
                'categorie_id'=>$this->request->getPost('categorie_id'),
                'enabled'=>$en

            ];
            $this->products_model->edit($data,$product_id); 
           
            return redirect()->to(base_url('Admin/Products'));
        }
        else{$data['edit']=$this->products_model->getById($product_id);
            $data['categories'] = $this->categories_model->getlist();
            $this->loadView('products/edit','edit product',$data);
        }
    }
    public function add(){
    
        $session=session();
        if(!$session->has('username'))
        {
            return redirect()->to(base_url('Admin/Auth'));
        }
        $imagefile = $this->request->getFile('image');
        if ( $this->request->getMethod() == 'post' && $this->addIsValid() ){
            
            if($imagefile->isValid() ){
            $en;
            if($this->request->getPost('enabled')!=null){$en=1;}else{$en=0;}
            
            $data=[
                'name'=>$this->request->getPost('name'),
                'order'=>$this->request->getPost('order'),
                'description'=>$this->request->getPost('description'),
                'price'=>$this->request->getPost('price'),
                'sale_price'=>$this->request->getPost('sale_price'),
                
                'categorie_id'=>$this->request->getPost('categorie_id'),
                'enabled'=>$en

            ];
            $this->products_model->add($data); 
            
            
            $newName ="product".(string)($this->products_model->lastId());
            $imagefile->move('../public/assets/images', $newName.'.png');
          
            return redirect()->to(base_url('Admin/Products'));
        }
        else{$this->errors =["image filed is required"];
            $data['categories'] = $this->categories_model->getlist();
            $this->loadView('products/add','add product',$data);
        }
    }

        else{
           $data['categories'] = $this->categories_model->getlist();
            $this->loadView('products/add','add product',$data);
        }
        
    }
    
}