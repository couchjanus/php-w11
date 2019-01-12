<?php
// AboutController.php


class AboutController extends Controller
{
    public function index()
    {
        $title = 'SHOPAHOLIC <b>ABOUT PAGE</b>';
        
        $this->_view->render('pages/about', ['title'=>$title]);
    }
}
