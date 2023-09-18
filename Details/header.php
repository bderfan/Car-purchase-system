<?php 
  ob_start();
  session_start();

  if(!isset($_SESSION['authenticate'])){
      header('Location:../welcome.php');
  }

  if(isset($_POST['logout'])){
      session_destroy();
      session_unset();
      header('Location:../welcome.php');
  }

  

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Purchase System</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-extensions.css">
    <style>
        
        a{
            text-decoration: none;
        }
        .navbar{
            background-color: #E31837;
        }
        #Admin .col-6{
            background-color: black; 
            overflow: hidden; 
            position: relative;
            z-index: 999;
        }
        #Admin .col-6:after{
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.64);
            z-index: -1;
        }
        #Admin .col-8{
            background-color: black; 
            overflow: hidden; 
            position: relative;
            z-index: 999;
        }
        #Admin .col-8:after{
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.64);
            z-index: -1;
        }
        .Pass6 i{
           position: absolute;
           top: 60.5%; 
           right: 3%;
           cursor: pointer;
           color: #000;
        }
        
        
        @media only screen and (max-width: 992px) {
           .Pass6 i{
            top: 60.5%; 
            right: 3%;
           }
       }
        
        @media only screen and (max-width: 768px) {
           .Pass6 i{
            top: 60.5%; 
            right: 3%;
           }
       }
        
        @media only screen and (max-width: 576px) {
           .Pass6 i{
            top: 60.5%; 
            right: 3%;
           }
       }
        
    </style>
</head>
<body>
    
<header>

</header>

  