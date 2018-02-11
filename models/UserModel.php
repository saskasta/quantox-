<?php

class UserModel extends Model{
    
    public function getUsers(){
        return $this->select()->from('users')->run();
    }
    
    public function insertUsers($data){
        $this->insert()->to('users')->save($data);
    }
}
