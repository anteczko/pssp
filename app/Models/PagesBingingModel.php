<?php
namespace App\Models;
use CodeIgniter\Model;

class PagesBingingModel extends Model
{
    protected $table = 'pages_binding';
    protected $allowedFields=['id' ,'book_id' ,'page_id' ,'page_index'];


    public function getBook($bookId){
        $pages=$this->db->table('pages_binding')->getWhere(['book_id'=>$bookId])->getResultArray();
        $builder=$this->db->table('pages');
        $list=[];
        foreach($pages as $page){
            array_push($list,$builder->where(['id'=>$page['page_id']])->get()->getResultArray()[0]);
        }
        return $list;
    }


}