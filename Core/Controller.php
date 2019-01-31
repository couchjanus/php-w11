<?php
namespace Core;

use Core\View;

class Controller {

    protected $_view;

    function __construct()
    {
        $this->_view = new View();

    }
}
