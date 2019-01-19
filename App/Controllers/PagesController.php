<?php


class PagesController extends Controller
{
    
    public function notFound()
    {
        $this->_view->showFront('errors/404');
    }

}