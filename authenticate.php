<?php
  require("database.php");


  function customerdata(){
       $first_name = $_POST['first_name'];
       $last_name = $_POST['last_name'];
       $age = $_POST['age'];
       $gender = $_POST['gender'];
       $phone_number = $_POST['phone_number'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $confirm_password = $_POST['confirm_password'];
       $address = $_POST['address'];
       
       $errors = [];
      
       if(strlen($first_name) == 0){
           $errors['first_name'] = 'Please enter first name';
       }
       if(strlen($last_name) == 0){
           $errors['last_name'] = 'Please enter last name';
       }
       if(strlen($age) == 0){
           $errors['age'] = 'How old are you?';
       }
       if(strlen($gender) == 0){
           $errors['gender'] = 'Male/Female?';
       }
       if(strlen($phone_number) == 0){
           $errors['phone_number'] = 'Please enter your phone number';
       }
       if(strlen($email) == 0){
           $errors['email'] = 'Please provide your email address';
       }
       if(strlen($password) == 0){
           $errors['password'] = 'Password field can not be empty';
       }
       if(strlen($confirm_password) == 0){
           $errors['confirm_password'] = 'Confirm password field can not be empty';
       }
       if(strlen($address) == 0){
           $errors['address'] = 'Please enter your address';
       }
       if(strlen($first_name) > 100){
           $errors['first_name'] = 'Can not exceed 100 characters...';
       }
       if(strlen($last_name) > 100){
           $errors['last_name'] = 'Can not exceed 100 characters...';
       }
       if(strlen($age) > 3){
           $errors['age'] = 'Can not exceed 3 digits...';
       }
       if(!$gender == 'Male' || !$gender =='Female'){
           $errors['gender'] = 'Only Male/Female...';
       }
       if(strlen($phone_number) > 30){
           $errors['phone_number'] = 'Can not exceed 30 digits...';
       }
       if(strlen($address) > 300){
           $errors['address'] = 'Can not exceed 300 characters...';
       }
       if(strlen($password) > 50){
           $errors['password'] = 'Password can not exceed 50 characters...';
       }
       if($password != $confirm_password){
           $errors['confirm_password'] = 'Password does not match';
       }
      
       if(count($errors) > 0){
          return[
               'status' => 'error',
               'message' => $errors
          ];
       }
       
       $connection = db_connection();
      
       $insert_customerdata_query = "INSERT INTO customer_info(first_name, last_name, age, gender, phone_number, email, password, address) VALUES('$first_name', '$last_name', '$age', '$gender', '$phone_number', '$email', '$password', '$address')";
      
       $result = mysqli_query($connection, $insert_customerdata_query);
      
       if(mysqli_error($connection)){
           die('Table error:'.mysqli_error($connection));
       }
      
       
       $success['success'] = 'Customer Data saved successfully!';
      
       return[
           'status' => 'success',
           'message' => $success['success']
       ];
       
  }

  function customerlogin(){
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $remember = isset($_POST['remember_check'])? true:false;
      
      $errors = [];
      
      if(strlen($email) == 0){
          $errors['email'] = 'Email field can not be empty...';
      }
      if(strlen($password) == 0){
          $errors['password'] = 'Password field can not be empty...';
      }
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         $errors['email'] = 'Invalid Email';
      }
      
      if(count($errors) > 0){
         return[
              'status' => 'error',
              'message' => $errors
         ];
      }
      
      $connection = db_connection();
      
      $view_customerdata_query = "SELECT * FROM customer_info WHERE email='$email' and password='$password'";
      
      $result = mysqli_query($connection, $view_customerdata_query);
      
      if(mysqli_error($connection)){
          die('Table error: '.mysqli_error($connection));
      }
      
      $_SESSION['authenticate'] = mysqli_fetch_assoc($result);
      
      if($remember){
           setcookie('email',$email, time()+(120), '/');
           setcookie('password',$password, time()+(120), '/');
       }else{
           setcookie('email','', 0, '/');
           setcookie('password','', 0, '/');
      }
      
      header('location:Details/Customerprofile.php');
      
      $success['success'] = 'Login successfully';
      
      return[
          'status' => 'success',
          'message' => $success['success']
      ];
  
  }

  function login(){
      $username = $_POST['user_name'];
      $password = $_POST['password'];
      
      $remember = isset($_POST['remember_check'])? true:false;
      
      $errors = [];
      
      if(strlen($username) == 0){
          $errors['user_name'] = "Please enter username";
      }
      if(strlen($password) == 0){
           $errors['password'] = "Please enter password";
      } 
      
      if(count($errors) > 0){
         return[
              'status' => 'error',
              'message' => $errors
         ];
      }
      
      $success = [];
      $connection = db_connection();
      
      
       $adminlogin_view_query = "SELECT * FROM admin_login WHERE user_name='$username' and password='$password'";
      
      $result = mysqli_query($connection, $adminlogin_view_query);
      
      if(mysqli_error($connection)){
          die('Table error: '.mysqli_error($connection));
      }
      
      $_SESSION['authenticate'] = mysqli_fetch_assoc($result);
      
      if($remember){
           setcookie('user_name',$username, time()+(120), '/');
           setcookie('password',$password, time()+(120), '/');
       }else{
           setcookie('user_name','', 0, '/');
           setcookie('password','', 0, '/');
      }
      
      if(isset($_SESSION['authenticate'])){
          $success['success'] = 'Loggedin successfully!'; 
      }
         
      header('Location:Admin_activities/Adminlogininfo.php');
      
      return[
              'status' => 'success',
              'message' => $success['success']
           ];
      
     
  }

  function index(){
      
      $username = $_POST['username'];
      $errors = [];
      
      if(strlen($username) == 0){
          $errors['username'] = 'Please insert your user name';
      }
      
      if(count($errors) > 0){
          return[
              'status' => 'error',
              'message' => $errors
          ];
      }
        
      $connection = db_connection();
      $success = [];
        
      $admin_login_view_query = "SELECT * FROM admin_login";
        
      $result = mysqli_query($connection, $admin_login_view_query);
      
          
      if(mysqli_error($connection)){
          die('Table error: '.mysqli_error($connection));
      }
        
      $admin = mysqli_fetch_assoc($result);
    
      
      if($username == $admin['user_name']){
           header('Location: Adminlogin.php');
           $success['success'] = 'Correct username';
          
          return [
            'status' => 'success',
            'message' => $success['success']
          ];
      }else{
          header('Location: Users.php');
      }
      
      
    }
   
  
?>