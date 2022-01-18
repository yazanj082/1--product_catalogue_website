<?php 

namespace App\Controllers\Admin;
use App\Models\CategoriesModel;


class Categories extends BaseController{
    private $categories_model;
    public function __construct()
    {
        $this->categories_model = new CategoriesModel();
    }

    public function index(){
        $session=session();
        if(!$session->has('username'))
        {
            return redirect()->to(base_url('Admin/Auth'));
        }
        $data['categories'] = $this->categories_model->list();
        $this->loadView('Categories/index','Categories',$data);
        

    }

    private function addIsValid()
    {

        $rules = [
            'name' => [
                'label' => 'categorie name',
                'rules' => 'required|min_length[2]|max_length[35]'
            ],
            'order' => [
                'label' => 'order',
                'rules' => 'required'
            ]
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
                'label' => 'name',
                'rules' => 'required|min_length[2]|max_length[35]'
            ],
            'order' => [
                'label' => 'order',
                'rules' => 'required'
            ]
        ];

        if ($this->validate($rules) == false) {

            $this->errors = $this->validator->getErrors();

            return false;
        }

        return true;
    }
   
    

    public function deleteRow($categorie_id)
    {

        $this->categories_model->deleteRow($categorie_id);
        return redirect()->to(base_url('admin/categories'));
    }

   
    public function edit($categorie_id){
        


        $session=session();
        if(!$session->has('username'))
        {
            return redirect()->to(base_url('Admin/Auth'));
        }
        
        if ( $this->request->getMethod() == 'post' && $this->editIsValid() ){
            $en;
            if($this->request->getPost('enabled')!=null){$en=1;}else{$en=0;}
            
            $data=[
                'name'=>$this->request->getPost('name'),
                'order'=>$this->request->getPost('order'),
                'enabled'=>$en

            ];
            $this->categories_model->edit($data,$categorie_id); 
            return redirect()->to(base_url('Admin/Categories'));
        }
        else{$data['edit']=$this->categories_model->getById($categorie_id);
            
            $this->loadView('Categories/edit','edit categorie',$data);
        }
    }
    public function add(){
    
        $session=session();
        if(!$session->has('username'))
        {
            return redirect()->to(base_url('Admin/Auth'));
        }
        
        if ( $this->request->getMethod() == 'post' && $this->addIsValid() ){
            $en;
            if($this->request->getPost('enabled')!=null){$en=1;}else{$en=0;}
            
            $data=[
                'name'=>$this->request->getPost('name'),
                'order'=>$this->request->getPost('order'),
                'enabled'=>$en

            ];
            $this->categories_model->add($data); 
            return redirect()->to(base_url('Admin/Categories'));
        }
        else{$this->loadView('Categories/add','add categorie');
        }

    }

}