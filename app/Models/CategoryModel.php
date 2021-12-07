<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model{
    protected $table='categories';
    protected $allowedFields=[ 'id', 'name', 'var1', 'var2', 'var3', 'var4', 'description'];

    public function getAll(){
        return $this->findAll();
    }

}