<?php
 include('header.php');

 require('authenticate.php');

 if(isset($_SESSION['authenticate'])){
     header('Location:Details/Customerprofile.php');
 }
 
 
 if(isset($_POST['Customer_login'])){
     $old = $_POST;
     $login = customerlogin();
     if($login['status'] == 'error'){
         $errors = $login['message'];
     }
     if($login['status'] == 'success'){
         $success['success'] = $login['message'];
     }
 }

?>


  <main>
    <section id="Admin" style="background-color:#f0cc77;">
      <a href="Users.php" class="mx-2 pt-2 d-flex justify-content-end"><button type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a> 
      <div class="customer-login py-5">
         <div class="container">
           <div class="row">
             <div class="col-12">
                <h1 class="text-black text-center fw-700">Customer Login</h1>
             </div>
             <div class="col-6 mx-auto py-5 px-5 text-white" style="background-image: url(images/Customer.jpg); background-position: center; background-size: cover;background-repeat: no-repeat;">
                <?php
                     if(isset($success)){
                  ?>
                  <div class="alert alert-warning" role="alert" name="success">
                    <?php 
                      echo $success['success']; 
                      header('Refresh:1,url=Details/Car_choice.php');  
                    ?>
                  </div>
                  <?php
                     }
                  ?>
               <form method="post">
                   <div class="mb-3">
                     <input type="email" class="form-control" name="email" value="<?php echo $old['email']??$_COOKIE['email']?? ''; ?>" id="exampleInputEmail1" placeholder="Email">
                   </div>
                    <p class="text-warning" style="font-size:15px"> <?php echo $errors['email']?? '';
                    ?> </p>
                   <div class="mb-3 Pass4" style="position:relative;">
                     <input type="password" class="form-control" name="password" value="<?php echo $old['password']??$_COOKIE['password']?? ''; ?>" id="exampleInputPassword4" placeholder="Password">
                     <i class="fa-solid fa-eye-slash" id="eye3"></i>
                   </div>
                    <p class="text-warning" style="font-size:15px"> <?php echo $errors['password']?? '';
                    ?> </p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember_check" <?php echo $_COOKIE['remember_check']?? ''?>>
                        <label class="form-check-label text-white" for="flexCheckDefault">
                          Remember me
                        </label>
                    </div>
                    <div class="my-5">
                        <a href="CustomerData.php" class="text-warning">New user? Please register ...</a>
                    </div>
                   <div class="d-flex justify-content-center">
                     <button type="submit" name="Customer_login" class="btn btn-2" style="background-color:#fcfca0;">Login</button>
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
  
  $('#eye3').click(function(){
       if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#exampleInputPassword4').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#exampleInputPassword4').attr('type','password');
        }
        
    });
});
</script>