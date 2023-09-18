<?php

class Databaseclass{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'car_purchase_system';
    
    protected $connection;
    
    public function __construct(){
      $this->db_connect();   
    }
    
    public function db_connect(){
        $connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        
        if($connection->connect_error){
            die("Database error: ".$connection->connect_error);
        }
        
        return $this->connection = $connection;
    }
}

?>