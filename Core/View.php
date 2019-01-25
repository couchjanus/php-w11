<?php

class View {

    protected function getFrontHeader() {
        return require_once VIEWS.'partials/_head.php';
    }
    protected function getBackHeader() {
        return require_once VIEWS.'partials/admin/_head.php';
    }
    
    protected function getFrontFooter() {
        return require_once VIEWS.'partials/_footer.php';
    }

    protected function getBackFooter() {
        return require_once VIEWS.'partials/admin/_footer.php';
    }

    protected function renderContent($path, $data, $error) {
        extract($data);
        return require VIEWS."/{$path}.php";
    }

    public function showFront($path, $data = [], $error = false) {
        return $this->getFrontHeader().$this->renderContent($path, $data, $error).$this->getFrontFooter();
    } 

    public function showBack($path, $data = [], $error = false) {
        return $this->getBackHeader().$this->renderContent($path, $data, $error).$this->getBackFooter();
    } 

    public function auth($path, $data = [], $error = false)
    {
        extract($data);
        return require VIEWS."/{$path}.php";
    }
}
