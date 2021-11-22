<?php
namespace App\Controllers;
use App\Models\PageModel;

class BindingController extends BaseController
{
    public function index()
    {

    }

    public function binding()
    {
        $pagesModel=new PageModel();
        $data=['rows'=>$pagesModel->getAll()];
        echo view('BootstrapView');
        echo view('Website/Navbar');
        echo view('Binding/ConfiguratorView',$data);
    }

}