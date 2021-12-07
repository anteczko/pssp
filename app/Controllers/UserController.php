<?php
namespace App\Controllers;

use App\Models\UserModel;



class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $data=['rows'=>$model->getAll()];
        printNavBar();
        echo view('Users/AllUsersView',$data);
    }

    public function register()
    {
        printNavBar();
        echo view('Forms/RegisterView');
    }

    public function login()
    {
        printNavBar();
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
                    'email'=> $this->request->getPost('username'),
                    'password'=>password_hash($this->request->getPost('password'),PASSWORD_BCRYPT),
                ]);
            }else{
                d($this->validator->getErrors());
            }
            d($this->request);
       }else{
            d("Not post!!!");
        }
        d($userModel->getSession()->get('email'));
    }
    public function loginAction()
    {
        if($this->request->getMethod()=="post" &&
            !empty($this->request->getPost('username')) &&
            !empty($this->request->getPost('password'))){

            #TODO add sanitizzation and verification

            $userModel=new UserModel();
            $session=$userModel->login($this->request->getPost('username'),$this->request->getPost('password'));
            return redirect()->to('/');
        }
    }
    public function logout()
    {
        $userModel=new UserModel();
        $userModel->deleteSession();
        return redirect()->to('/');
    }

}
