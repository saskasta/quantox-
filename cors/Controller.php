<?php


abstract class Controller {
    var $view;
    var $model;

    public function __construct($msg = '') {
        $this->view = new View();
        $this->view->msg = $msg;
    }
    public function loadModel($name){
        $path = BASE_PATH . 'models/'.$name.'Model.php';
        if(file_exists($path)){
            include $path;
            $modelName = ucfirst($name)."Model";
            $this->model = new $modelName();
        } 
    }
}
