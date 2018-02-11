<?php

class View {
    var $data = [];
    
    public function __construct() {
    }
    
    public function render($template, $data=[]) {
        $this->data = $data;
        include_once BASE_PATH . 'views/'.$template.".php";

    }
}
