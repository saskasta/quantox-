<?php


class DB {
        var $database;
        

        public function __construct($dbtype, $dbhost, $dbname, $dbuser, $dbpass) {	
	       $this->database = NewADOConnection('pdo');            
               $this->database->connect($dbtype.':host='.$dbhost.';dbname='.$dbname .';charset=utf8mb4',$dbuser, $dbpass);
               //$this->db->debug = true; 	
	       $this->database->SetFetchMode(ADODB_FETCH_ASSOC);
               
	}
        
        public function getAll($sql){
            
             $data = [];
             $result = $this->database->Execute($sql);
              if($result->recordCount()>0){
                while($rs = $result->FetchRow()){
                   $data[]=$rs;
                }  
              }  
              return $data;
        }
        public function save($sql){
            
            $this->database->Execute($sql);
        }
        
}
