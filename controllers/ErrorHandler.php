<?php

class ErrorHandler extends Controller{
   
    public function index(){
        echo $this->view->msg;
    }
}
