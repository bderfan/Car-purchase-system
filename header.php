<?php
  ob_start();
  session_start();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Purchase System</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-extensions.css">
    <style>
        #Welcome{
            background-color: #c0c1c1; 
        }
        .welcome button{
            background-color: #090444;
            color: white;
            transition: all linear 1s;
        }
        .welcome button:hover{
            background-color: #cb2d2d;
            color: #fff;
            transition: all linear 1s;
        }
        #User{
            position: relative;
            z-index: 999999;
        }
        #User:after{
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.79);
            z-index: -1;
        }
        a{
            text-decoration: none;
        }
        .navbar{
            background-color: #FEC03F;
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
        
        .Pass1 i{
            position: absolute; 
            top: 30.5%; 
            right: 3%;  
            cursor: pointer; 
            color: #000;
        }
        .Pass2 i{
            position: absolute; 
            top: 30.5%; 
            right: 3%; 
            cursor: pointer; 
            color: #000;
        }
        
        .Pass4 i{
            position: absolute; 
            top: 30.5%; 
            right: 3%; 
            cursor: pointer; 
            color: #000;
        } 
        .btn-2:hover{
            color: #000;
        }
        
       @media only screen and (max-width: 992px) {
           .Pass1 i{
               top: 30.5%; 
               right: 3%; 
           }
           .Pass2 i{
              top: 30.5%; 
              right: 3%; 
           }
           .Pass4 i{
              top: 30.5%; 
              right: 3%; 
           }
       }
    
       @media only screen and (max-width: 768px) {
           .Pass1 i{
               top: 30.5%; 
               right: 3%; 
           }
           .Pass2 i{
               top: 30.5%; 
               right: 3%; 
           }
           .Pass4 i{
              top: 30.5%; 
              right: 3%;  
           }
       }
        
       @media only screen and (max-width: 576px) {
           .Pass1 i{
               top: 30.5%; 
               right: 3%; 
           }
           .Pass2 i{
               top: 30.5%; 
               right: 3%; 
           }
           .Pass4 i{
               top: 30.5%; 
               right: 3%; 
           }
       }

        .nav-link{
            color: #fff;
        }
        .nav-link:hover{
            color: #000;
            transition: all linear 1s;
        }
    </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg">
       <div class="container-fluid">
         <a class="navbar-brand" href="#"><img src="images/logo.jpg" alt="logo" style="width:90px; height:75px;"></a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link fw-bold fs-5" href="welcome.php">Home</a>
             </li>
             <li class="nav-item">
               <a class="nav-link fw-bold fs-5" href="Users.php">Users</a>
             </li>
           </ul>
         </div>
       </div>
     </nav>
  </header> 
  