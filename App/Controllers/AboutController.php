<?php
// AboutController.php

class AboutController
{
    // Class properties and methods go here   
    public function __construct()
    {
        render('pages/about', ['title'=>'About <b>Our Cats</b> Page']);
    }

}

// class AboutController extends Controller
// {
//     public function index()
//     {
//         $title = 'SHOPAHOLIC <b>ABOUT PAGE</b>';
        
//         $this->_view->render('home/about', ['title'=>$title]);
//     }
// }
