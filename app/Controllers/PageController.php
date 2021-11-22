<?php
namespace App\Controllers;
use App\Models\PageModel;

class PageController extends BaseController
{
    public function index()
    {
        $model = new PageModel();

        $data=['rows'=>$model->getAll()];
        echo view('BootstrapView');
        echo view('Website/Navbar');
        echo view('Universal/UniversalListView',$data);
    }

    public function add(){
        echo view('BootstrapView');
        echo view('Website/Navbar');
        echo view('Forms/AddPageView');
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
        echo view('BootstrapView');
        echo view('Website/Navbar');
        echo view('Pages/AllPagesView',$data);
    }

    public function test()
    {
        echo view('BootstrapView');
        echo view('Website/Navbar');
    }

}