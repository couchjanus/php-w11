<?php
namespace App\Controllers;

use Core\Controller;

class PagesController extends Controller
{
    
    public function notFound()
    {
        $this->_view->showFront('errors/404');
    }

}