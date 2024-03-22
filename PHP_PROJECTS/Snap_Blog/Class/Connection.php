<?php


class Connection{
    private $localhost = 'localhost' , $user = 'root' , $password = '' , $dbname = 'Blogging_site';
    protected $conn;
    
    function createConnection(){

        $this->conn = mysqli_connect( $this->localhost , $this->user , $this->password , $this->dbname );
        
        if(!$this->conn){
            return false;
        }

        return true;
    }
}

?>