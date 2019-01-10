<?php

// DashboardController.php

// class DashboardController
// {
//     // Class properties and methods go here   
//     public function __construct()
//     {
//         // render('admin/index', ['title'=>'Dashboard Controller PAGE']);
//     }

// }

class DashboardController extends Controller      
{
    public function index()
    {
           $this->_view->render('admin/index', ['title'=>'Dashboard Controller PAGE']);
    }
}

