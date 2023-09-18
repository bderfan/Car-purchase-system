<?php
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
      
        .Pass5 i{
            position: absolute; 
            top: 56%; 
            right: 32%; 
            cursor: pointer; 
            color: #000;
        }
        
        .Pass6 i{
            position: absolute; 
            top: 30.5%; 
            right: 3%;  
            cursor: pointer; 
            color: #000;
        }
        
        
        @media only screen and (max-width: 992px) {
           .Pass5 i{
            top: 65%; 
            right: 32%; 
           }
       }
    
       @media only screen and (max-width: 768px) {
           .Pass5 i{
             top: 64%; 
             right: 34%; 
           }
       }
        
       @media only screen and (max-width: 576px) {
           .Pass5 i{
             top: 63.5%; 
             right: 36%; 
           }
          .table thead{
            display: none;
           }
           .table, .table tbody, .table tbody tr, .table tbody td{
               display: block;
               width: 100%;
           }
           .table tr{
               margin-bottom: 15px;
           }
           .table td{
               text-align: right;
               padding-left: 50%;
               text-align: right;
               position: relative;
           }
           .table td::before{
               content: attr(data-label);
               position: absolute;
               left: 0;
               width: 50%;
               padding-left: 15px;
               font-size: 15px;
               font-weight: bold;
               text-align: left;
           }
       }
        
    </style>
</head>
<body>
  <header>
    
  </header> 
  