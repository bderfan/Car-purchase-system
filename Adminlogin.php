<?php
 include('header.php');

 require('authenticate.php');

 if(isset($_SESSION['authenticate'])){
    header('Location:Admin_activities/Adminlogininfo.php');
 }

 
 
 if(isset($_POST['login'])){
     $old = $_POST;
     $login = login();
     if($login['status'] == 'error'){
         $errors = $login['message'];
     }
     if($login['status'] == 'success'){
         $success['success'] = $login['message'];
     }
 }

 

?>


  <main>
    <section id="Admin" style="background-color:#132a00;">
       <a href="Users.php" class="mx-2 pt-2 d-flex justify-content-end"><button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a> 
      <div class="admin py-5">
         <div class="container">
           <div class="row">
             <div class="col-12">
                <h1 class="text-white text-center fw-700">Admin Panel</h1>
             </div>
             <div class="col-6 mx-auto py-5 px-5 text-white" style="background-image: url(images/Admin.jpg); background-position: center; background-size: cover;background-repeat: no-repeat;">
                <?php
                     if(isset($success)){
                  ?>
                  <div class="alert alert-warning" role="alert" name="success">
                    <?php 
                      echo $success['success']; 
                    ?>
                  </div>
                  <?php
                     }
                  ?>
               <form method="post">
                   <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">User Name</label>
                     <input type="text" class="form-control" name="user_name" value="<?php echo $old['user_name']??$_COOKIE['user_name']?? ''; ?>" id="exampleInputEmail1">
                   </div>
                   <p class="text-warning" style="font-size:15px"> <?php echo $errors['user_name']?? '';
                    ?> </p>
                   <div class="mb-3 password-container" style="position: relative;">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" value="<?php echo $old['password']??$_COOKIE['password']?? ''; ?>" id="exampleInputPassword1">
                      <i class="fa-solid fa-eye-slash" id="eye" style="position: absolute; top: 60.5%; right: 3%;  cursor: pointer; color: #000;"></i>
                   </div>
                    <p class="text-warning" style="font-size:15px"> <?php echo $errors['password']?? '';
                    ?> </p>
                   <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember_check" <?php echo $_COOKIE['remember_check']?? ''?>>
                        <label class="form-check-label text-white" for="flexCheckDefault">
                          Remember me
                        </label>
                    </div>
                   <div class="d-flex justify-content-center">
                     <button type="submit" name="login" class="btn" style="background-color: #21564f; color:#fff;">Submit</button>
                   </div>
                 </form>
             </div>
           </div>  
         </div> 
      </div>
    </section>  
  </main>
 

<?php
  include('footer.php');
?>

<script>
 $(function(){
  
  $('#eye').click(function(){
       if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#exampleInputPassword1').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#exampleInputPassword1').attr('type','password');
        }
        
    });
});

</script>