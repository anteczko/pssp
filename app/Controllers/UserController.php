<?php
namespace App\Controllers;

use App\Models\UserModel;



class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $data=['rows'=>$model->getAll()];
        echo view('BootstrapView');
        echo view('Users/AllUsersView',$data);
    }

    public function register()
    {
        echo view('BootstrapView');
        echo view('Website/Navbar');
        echo view('Forms/RegisterView');
    }

    public function login()
    {
        echo view('BootstrapView');
        echo view('Website/Navbar');
        echo view('Forms/LoginView');
    }

    public function registerAction()
    {
        if($this->request->getMethod()=='post'){

            if($this->validate([
                'username'=>'required|min_length[5]|max_length[64]|valid_email',
                'password'=>'required|min_length[5]|max_length[64]',
                'repeatPassword'=>'required|matches[password]'
            ])){
                #TODO add sanitizzation and verification
                $userModel=new UserModel();
                $userModel->save([
                    'email'=>$this->request->getPost('username'),
                    'password'=>$this->request->getPost('password'),
                ]);
            }else{
                d($this->validator->getErrors());
            }
            d($this->request);
       }else{
            d("Not post!!!");
        }
    }
    public function loginAction()
    {
        if($this->request->getMethod()=="post" &&
            !empty($this->request->getPost('username')) &&
            !empty($this->request->getPost('password'))){

            #TODO add sanitizzation and verification

            $userModel=new UserModel();
            d($userModel->login($this->request->getPost('username'),$this->request->getPost('password')));
        }
    }
    public function logout()
    {
        $userModel=new UserModel();
        $userModel->deleteSession();
        d($userModel->getSession()->get('email'));
    }

}
