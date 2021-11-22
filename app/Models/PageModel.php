<?php
namespace App\Models;
use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table = 'pages';
    protected $allowedFields=['id', 'name', 'type', 'description', 'image', 'is_a_spread', 'is_two_sided'];

    public function getAll(){
        return $this->findAll();
    }

    public function addPage($name,$type,$description,$image,$is_a_spread,$is_two_sided){

    }

}