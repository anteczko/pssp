<?php
namespace App\Models;
use CodeIgniter\Model;
use mysql_xdevapi\RowResult;

class PageModel extends Model
{
    protected $table = 'pages';
    protected $allowedFields=['id', 'name', 'type', 'category', 'val1', 'val2','val3','val4', 'description', 'image', 'is_a_spread', 'is_two_sided'];

    public function getAll(){
        return $this->findAll();
    }

    public function getBinding($array){
        $list=[];
        $builder=$this->db->table('pages');
        foreach($array as $page){
            array_push($list, $builder->getWhere(['id'=>$page])->getResultArray()[0]);
        }
        return $list;
    }


}