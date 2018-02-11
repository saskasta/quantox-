<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author aleksandras
 */
class Home extends Controller{
    public function index(){
        $this->loadModel('User');
        $users = $this->model->getUsers();
        //var_dump($users);
        $this->view->render('home', $users);
    }
    public function create(){
          $this->view->render('create');
    }
    
    public function save(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $this->loadModel('User');
        $users = $this->model->insertUsers(['name' => $name, 'email'=>$email]);
        header("Location: index.php?c=Home");
        die();
    }
    
    
    public function show($id){
         echo "Home controller show ".$id;
    }
    public function edit($id1, $id2){
         echo "Home controller edit ".$id1. "-". $id2;
    }
}
