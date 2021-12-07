<?php
function printNavBar(){
    $session = \Config\Services::session();
    $data=['session'=>$session];
    echo view('BootstrapView');
    echo view('Website/Navbar',$data);
}


