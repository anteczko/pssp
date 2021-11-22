<?php
namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields=['id','email','password','role'];

    public function getAll(){
        return $this->findAll();
    }

    public function login($email,$password)
    {
       $entry=$this->table('users')->where('email',$email)->get()->getRowArray();

       if($entry['password']==$password)
           return $this->setSession($email);
       else
           return false;
    }

    private function setSession($email){
        helper('session');
        $session=session();
        $session->destroy();
        $session->start();
        $session->set('email',$email);
        return $session;
    }

    public function getSession()
    {
        return \Config\Services::session();
    }

    public function deleteSession()
    {
        $session=\Config\Services::session();
        $session->destroy();
        $session->start();
    }

}