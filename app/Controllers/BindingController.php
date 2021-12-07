<?php
namespace App\Controllers;
use App\Models\BookModel;
use App\Models\CategoryModel;
use App\Models\PageModel;
use App\Models\PagesBingingModel;

class BindingController extends BaseController
{
    public function index()
    {

    }

    public function binding()
    {
        $session=session();
        $pagesModel=new PageModel();
        $categoryModel=new CategoryModel();

        $data=['rows'=>$pagesModel->getAll(),
            'categories'=>$categoryModel->getAll()];

        if(!empty($session->get('email'))){
            if($session->has('binding')){
                if(!empty($session->get('binding'))){
                    $bindings =$pagesModel->getBinding($session->get('binding'));
                    $data['binding']=$pagesModel->getBinding($session->get('binding'));
                }else{
                    $session->set('binding',[]);
                }
            }else{
                $session->set('binding',[]);

            }
        }

        printNavBar();
        echo view('Binding/ConfiguratorView',$data);
    }

    public function pageRightAction(){
        $session=session();
        $val= $session->get('selectedPageId');
        $session=session()->set('selectedPageId',$session->get('selectedPageId')+1 );
        return redirect()->back();
    }

    public function pageLeftAction(){
        $session=session();
        $val= $session->get('selectedPageId');
        if($val>=1)
            $session=session()->set('selectedPageId',$session->get('selectedPageId')-1 );
        return redirect()->back();
    }

    public function addSelectedPageAction($element){
        $session=session();
        $pageList=$session->get('binding');
        array_push($pageList,$element);
        session()->set('binding',$pageList);
        d($session->get('binding'));
        return redirect()->back();
    }

    public function addSelectedPageActionAt($element,$index){
        $session=session();
        $pageList=$session->get('binding');
        $pageList[$index]=$element;
        session()->set('binding',$pageList);
        d($pageList);
        return redirect()->back();
    }

    public function bindingRightAction(){
        $session=session();
        $session=session()->set('bindingPageId',$session->get('bindingPageId')+1 );
        return redirect()->back();
    }

    public function bindingLeftAction(){
        $session=session();
        $val=$session->get('bindingPageId');
        if($val>=1)
            $session=session()->set('bindingPageId',$session->get('bindingPageId')-1 );
        return redirect()->back();
    }

    public function resetBinding(){
        $session=session();
        session()->set('selectedPageId',0);
        session()->set('bindingPageId',0);
        session()->set('binding',[]);
    }

    public function saveBinding(){
        $session=session();
        $pageList=$session->get('binding');

        if($this->request->getMethod()=='post'){


            $bookModel=new BookModel();
            $bookModel->save([
                'name'=>$this->request->getPost('bookName'),
                'description'=>$this->request->getPost('bookDescription'),
                'author'=>$session->get('id')
            ]);

            $pagesBindingModel=new PagesBingingModel();
            $i=0;
            $bookId=$bookModel->db->insertID();
            foreach ($pageList as $page){
                $pagesBindingModel->save([
                    'book_id'=>$bookId,
                    'page_id'=>$page,
                    'page_index'=>$i
                ]);
                $i++;
            }

            $this->resetBinding();
        }
        return redirect()->to('/books/showBooks');
    }

}