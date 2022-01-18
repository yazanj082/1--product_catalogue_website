<?php

namespace App\Controllers\Admin;

use App\Models\LoginModel;

class Auth extends BaseController
{


  private $loginModel;



  public function __construct()
  {
    $this->loginModel = new LoginModel();
  }

  public function index()
  {


    if ($this->request->getMethod() == 'post' && $this->checkvalidation()) {

      $session = session();
      $username = $this->request->getPost('username');
      $session->set('username', $username);
      return redirect()->to(base_url('Admin/Dashboard'));
    } else {
      $data['errors']=$this->errors;
      echo view('admin/auth/login', $data);
    }
    if($this->request->getMethod()=='get'){
        if($this->request->getGet('logout')==1){
             $this->logout();
        }
    }
  }
  private function checkvalidation()
  {
    $rules = [
      'username' => [
          'label' => 'username',
          'rules' => 'required|min_length[2]|max_length[35]|alpha_numeric'
      ],
      'password' => [
          'label' => 'password',
          'rules' => 'required|alpha_numeric'
      ]
  ];
    $username = $this->request->getPost('username');
    $password = md5($this->request->getPost('password'));

    $vaild = $this->loginModel->valid($username, $password);

    if ($this->validate($rules) == false) {

      $this->errors = $this->validator->getErrors();

      return false;
    }
    if ($vaild == false) {
      $this->errors = ["Incorrect Username Or Password"];
      return false;
    }

    return true;
  }

  public function logout()
  {
      $session = session();
      $session->destroy();
      return redirect()->to(base_url('Admin/Auth'));
  }
}
