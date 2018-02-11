<?php

abstract class Model {
     var $db;
     
     public function __construct() {
        $this->db = new DB('mysql','localhost','code_test','root','root');
        $this->db->type="";
        $this->db->table="";
     }
     
      public function select(){
            $this->db->type= "SELECT"; 
            $this->db->table="";
            return $this;
      }
      public function from($table){
          if($this->db->type == "SELECT"){
              $this->db->table = $table;
              return $this;
          }
      }
      public function run(){
          
          if($this->db->type== "SELECT" && $this->db->table !=""){
              $sql = $this->db->type." * FROM ".$this->db->table;
              return $this->db->getAll($sql);
          }
          
      }
       public function insert(){
            $this->db->type= "INSERT"; 
            $this->db->table="";
            return $this;
      }
       public function to($table){
          if($this->db->type == "INSERT"){
              $this->db->table = $table;
              return $this;
          }
      }
      public function save($data){
         
          if($this->db->type== "INSERT" && $this->db->table !=""){
               $sql = $this->db->type." INTO ".$this->db->table. "(";
               $values = "(";
               foreach($data as $key => $value){
                   $sql .= "`".$key."`,";
                   $values .= "'".$value."',";
               }
               $sql = rtrim($sql, ',').")VALUES ".rtrim($values, ',').")";
               $this->db->save($sql);
          }
      }
}


       
