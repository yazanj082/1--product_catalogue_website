<?php 

namespace App\Controllers\Admin;
use App\Models\LoginModel;
class Admins extends BaseController{
    private $login_model;
    public function __construct()
    {
        $this->login_model = new LoginModel();
    }
    public function index(){
        $session=session();
        if(!$session->has('username'))
        {
            return redirect()->to(base_url('Admin/Auth'));
        }
        $data['users'] = $this->login_model->list();
        $this->loadView('users/index','Admins',$data);
        

    }
    public function deleteRow($user_id)
    {

        $this->login_model->deleteRow($user_id);
        return redirect()->to(base_url('admin/admins'));
    }
    public function add(){
    
        $session=session();
        if(!$session->has('username'))
        {
            return redirect()->to(base_url('Admin/Auth'));
        }
        
        if ( $this->request->getMethod() == 'post' && $this->addIsValid() ){
            if(!$this->login_model->exist($this->request->getPost('name'))){
            $en;
            if($this->request->getPost('suspend')!=null){$en=1;}else{$en=0;}
            
            $data=[
                'name'=>$this->request->getPost('name'),
                'password'=>md5($this->request->getPost('password')),
                'suspend'=>$en

            ];
            $this->login_model->add($data); 
            return redirect()->to(base_url('Admin/Admins'));}
            else{$this->errors =["user name already exist"];
                
                $this->loadView('users/add','add product');}
        }
        else{$this->loadView('users/add','add user');
        }

    }
    private function addIsValid()
    {

        $rules = [
            'name' => [
                'label' => 'name',
                'rules' => 'required|min_length[2]|max_length[35]|alpha_numeric'
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required|alpha_numeric'
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
                'rules' => 'required|min_length[2]|max_length[35]|alpha_numeric'
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required|alpha_numeric'
            ]
        ];

        if ($this->validate($rules) == false) {

            $this->errors = $this->validator->getErrors();

            return false;
        }

        return true;
    }
   
    public function edit($user_id){
        


        $session=session();
        if(!$session->has('username'))
        {
            return redirect()->to(base_url('Admin/Auth'));
        }
        
        if ( $this->request->getMethod() == 'post' && $this->editIsValid() ){
            if(!$this->login_model->existEdit($this->request->getPost('name'),$user_id)){
            $en;
            if($this->request->getPost('suspend')!=null){$en=1;}else{$en=0;}
            
            $data=[
                'name'=>$this->request->getPost('name'),
                'password'=>md5($this->request->getPost('password')),
                'suspend'=>$en

            ];
            $this->login_model->edit($data,$user_id); 
            return redirect()->to(base_url('Admin/Admins'));}
            else{$this->errors =["user name already exist"];
                $data['edit']=$this->login_model->getById($user_id);
                $this->loadView('users/add','add user',$data);

            }
        }
        else{$data['edit']=$this->login_model->getById($user_id);
            
            $this->loadView('users/edit','edit user',$data);
        }
    }


}