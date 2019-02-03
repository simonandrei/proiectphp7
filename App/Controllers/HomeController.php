<?php

namespace App\Controllers;
use App\Constants\Languages;
use Framework\BaseController;

class HomeController extends BaseController
{
    public function index(){
        $this->smarty->display('Homepage\index.html');
    }


}