<?php
// HomeController.php

class HomeController extends Controller
{
    public function index()
    {  
        $title = 'Our <b>Best Cat</b> Members Home Page';
        $this->_view->showFront('pages/index', ['title'=>$title]);
    }
}
