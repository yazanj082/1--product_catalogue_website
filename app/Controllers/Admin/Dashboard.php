<?php 

namespace App\Controllers\Admin;

class Dashboard extends BaseController{

    public function index(){
        $session=session();
        if(!$session->has('username'))
        {
            return redirect()->to(base_url('Admin/Auth'));
        }
       
        $this->loadView('dashboard/index','Dashboard');
        

    }
 

}