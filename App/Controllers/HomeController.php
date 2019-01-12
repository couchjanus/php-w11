<?php
// HomeController.php

class HomeController extends Controller
{
  
    public function index()
    {  
        $title = 'Our <b>Best Cat</b> Members Home Page';
        $this->_view->showFront('pages/index', ['title'=>$title]);
        // render('pages/index', ['title'=>$title]);
        // $this->_view->render('pages/index', ['title'=>$title]);
    }
}
