<?php
// HomeController.php

// class HomeController
// {
//     // Class properties and methods go here   
//     public function __construct()
//     {
//         // render('pages/index', ['title'=>'<b>Our Cats</b> Members Home Page']);
//     }

//     public function index()
//     {
//         $title = 'Our <b>Best Cat Members Home Page </b>';

//         render('pages/index', ['title'=>$title]);
//     }
// }

class HomeController extends Controller
{
  
    public function index()
    {  
        $title = 'Our <b>Best Cat</b> Members Home Page';
        $this->_view->show('pages/index', ['title'=>$title]);
        // $this->_view->render('home/index', ['title'=>$title]);
    }
}
