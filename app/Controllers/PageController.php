<?php
namespace App\Controllers;
use App\Models\PageModel;

class PageController extends BaseController
{
    public function index()
    {
        $model = new PageModel();

        $data=['rows'=>$model->getAll()];
        printNavBar();
        echo view('Universal/UniversalListView',$data);
    }

    public function add(){
        printNavBar();
        echo view('Forms/AddPageView');
    }

    private function f($text){
        return filter_var($text,FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
    }

    public function addAction()
    {
        if($this->request->getMethod()=="post"){
            echo "<h1>Adding your page request!!!</h1>";
            d($this->request->getBody());
            d($this->request->getFile('file'));

            if($this->validate([
                'name'=>'required'
            ])){
                $pageModel=new PageModel();
                $pageModel->save([
                    'name'=>$this->request->getPost('name'),
                    'type'=>$this->request->getPost('type'),
                    'description'=>$this->request->getPost('description'),
                    'image'=>$this->request->getFile('file')->getName(),
                    'is_a_spread'=>$this->request->getPost('is_a_spread'),
                    'is_two_sided'=>$this->request->getPost('is_two_sided')
                ]);

                $file=$this->request->getFile('file');
                $file->move(WRITEPATH.'uploads');
            }

        }
    }
    public function allPages(){
        $pagesModel=new PageModel();
        $data=['rows'=>$pagesModel->getAll()];
        printNavBar();
        echo view('Pages/AllPagesView',$data);
    }

    public function test()
    {
        printNavBar();
    }

}