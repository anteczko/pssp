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

       if(password_verify($password,$entry['password']))
           return $this->setSession($email);
       else
           return false;
    }

    private function setSession($email){
        $session = \Config\Services::session();
        $session->start();
        $session->set('email',$email);
        $entry=$this->table('users')->where('email',$email)->get()->getRowArray();
        $session->set('id',$entry['id']);
        return $session;
    }

    public function getSession()
    {
        return \Config\Services::session();
    }

    public function deleteSession()
    {
        $session=\Config\Services::session();
        $session->stop();
        $session->destroy();
    }

}