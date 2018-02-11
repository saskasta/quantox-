<?php


class Product {
     public function index(){
        echo "Product controller";
    }
    public function create(){
         echo "Product controller create";
    }
    public function show($id){
         echo "Product controller show ".$id;
    }
    public function edit($id1, $id2){
         echo "Product controller edit ".$id1. "-". $id2;
    }
}
