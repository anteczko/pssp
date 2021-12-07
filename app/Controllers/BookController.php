<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\PagesBingingModel;


class BookController extends BaseController{
    public function showBooks(){
        $bookModel=new BookModel();
        printNavBar();
        echo view('Books/AllBooksView',['books'=>$bookModel->getAll()]);
    }

    public function showBook($bookId){
        $pagesBindingModel=new PagesBingingModel();
        $data=['pages'=>$pagesBindingModel->getBook($bookId)];

        printNavBar();
        echo view('Books/BookView',$data);
    }
}