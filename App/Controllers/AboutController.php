<?php
namespace App\Controllers;

use Core\Controller;

// AboutController.php

class AboutController extends Controller
{
    public function index()
    {
        $title = 'SHOPAHOLIC <b>ABOUT PAGE</b>';
        $this->_view->showFront('pages/about', ['title'=>$title]);

    }
}
