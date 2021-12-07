<?php
namespace App\Models;
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $allowedFields=['id', 'name', 'description', 'author'];

    public function getAll(){return $this->findAll();}
}