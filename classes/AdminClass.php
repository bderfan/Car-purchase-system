<?php

require_once('Databaseclass.php');

class AdminClass extends Databaseclass{
    
    
    
    public function update(){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $errors = [];
        
        if(strlen($user_name) == 10){
            $errors['user_name'] = 'Please enter your user name';
        }
        if(strlen($user_name) > 30){
            $errors['user_name'] = 'Can not exceed 30 characters';
        }
        if(strlen($password)  == 0){
            $errors['password'] = 'Please enter password';
        }
        if(strlen($password) > 50){
            $errors['password'] = 'Can not exceed 50 characters';
        }
        
        if(count($errors) == 1){
            return[
                'status' => 'error',
                'message' => $errors
            ];
        }
        
        $connection = $this->connection;
        
        $adminlogin_view_query = "SELECT * FROM admin_login";
        
        $result = $connection->query($adminlogin_view_query);
        
        
        if($connection->error){
          die('Table error: '.$connection->error);
       }
        
       $success = [];
        
       $update_adminlogin_query = "UPDATE admin_login SET user_name='$user_name', password = '$password'";
        
       $result = $connection->query($update_adminlogin_query);
        
        if($connection->error){
          die('Table error: '.$connection->error);
       }
        
       $view_final_adminlogin = "SELECT * FROM admin_login";
        
       $result = $connection->query($view_final_adminlogin);
        
        if($connection->error){
          die('Table error: '.$connection->error);
       }
        
       $success['success'] = 'Admin login updated successfully';
        
       return[
           'status' => 'success',
           'message' => $success['success']
       ];
        
    }
     
}

?>