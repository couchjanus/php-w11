<?php

class View {
    
    protected $header;
    protected $navigation;
    protected $aside;
    protected $footer;

    public function __construct() {
        
    }

    protected function getHeader() {
        return require_once VIEWS.'partials/_head.php';
    }
    protected function getNavigation() {
        return require_once VIEWS.'partials/_navigation.php';;
    }

    protected function getAside() {
        return require_once VIEWS.'partials/_aside.php';
    }

    protected function getFooter() {
        return require_once VIEWS.'partials/_footer.php';
    }

    protected function render($path, $data, $error) {
        extract($data);
        return require VIEWS."/{$path}.php";
    }

    public function show($path, $data = [], $error = false) {
        return $this->getHeader().$this->getNavigation().$this->render($path, $data, $error).$this->getAside().$this->getFooter();
    } 

    // public function render($path, $data = [], $error = false)
    // {
    //     extract($data);
    //     return require VIEWS."/{$path}.php";
    // }

}
