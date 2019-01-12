<?php
/**
 * DashboardController.php
 */

class DashboardController extends Controller      
{
    public function index()
    {
        //    $this->_view->render('admin/index', ['title'=>'Dashboard Controller PAGE']);
           $this->_view->showBack('admin/index', ['title'=>'Dashboard Controller PAGE']);
        //    render('admin/index', ['title'=>'Dashboard Controller PAGE']);
    }
}

