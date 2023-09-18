<?php

require_once('Databaseclass.php');

class Customerclass extends Databaseclass{
    
    public function index(){
        
      $connection = $this->connection;
        
      $customer_view_query = "SELECT * FROM customer_info";
        
      $result = $connection->query($customer_view_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      return $result;
    }
    
    
    public function info(){
        
      $connection = $this->connection;
        
      $customer_view_query = "SELECT * FROM customer_information";
        
      $result = $connection->query($customer_view_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      return $result;
    }
    
    
    public function directPayment(){
        
      $connection = $this->connection;
        
      $cash_payment_view_query = "SELECT * FROM payment_method2 WHERE cash_method='dp'";
        
      $result = $connection->query($cash_payment_view_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      return $result;
    }
    
    
    public function fundTransfer(){
        
      $connection = $this->connection;
        
      $cash_payment_view_query = "SELECT * FROM payment_method2 WHERE cash_method='ft'";
        
      $result = $connection->query($cash_payment_view_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      return $result;
    }
    
    public function Officer(){
        
      $connection = $this->connection;
        
      $officer_view_query = "SELECT * FROM payment_method WHERE profession='officer'";
        
      $result = $connection->query($officer_view_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      return $result;
    }
    
    
     public function Businessman(){
        
      $connection = $this->connection;
        
      $businessman_view_query = "SELECT * FROM payment_method3 WHERE profession='businessman'";
        
      $result = $connection->query($businessman_view_query);
        
      if($connection->error){
          die('Table error: '.$connection->error);
      }
        
      return $result;
    }
    
    
    
    
}

?>