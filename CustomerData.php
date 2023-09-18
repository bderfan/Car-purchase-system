<?php
 include('header.php');

 
 
 if(isset($_POST['submit_customerdata'])){
     require('authenticate.php');
     $old = $_POST;
     $customer_data = customerdata();
     if($customer_data['status'] == 'error'){
         $errors = $customer_data['message'];
     }
     if($customer_data['status'] == 'success'){
         $success['success'] = $customer_data['message'];
     }
 }

?>


  <main>
    <section id="Admin" style="background-color:#db0404;">
       <a href="Users.php" class="mx-2 pt-2 d-flex justify-content-end"><button type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a>  
      <div class="customer-data py-5">
         <div class="container">
           <div class="row">
             <div class="col-12">
                <h1 class="text-white text-center fw-700">Customer Info</h1>
             </div>
             <div class="col-6 mx-auto py-5 px-5 text-white" style="background-image: url(images/Customer.jpg); background-position: center; background-size: cover;background-repeat: no-repeat;">
                <?php
                     if(isset($success)){
                  ?>
                  <div class="alert alert-warning" role="alert" name="success">
                    <?php 
                      echo $success['success']; 
                      header('Refresh:1,url=Customerlogin.php');  
                    ?>
                  </div>
                  <?php
                     }
                  ?>
               <form method="post">
                   <div class="mb-3">
                     <input type="text" class="form-control" name="first_name" value="<?php echo $old['first_name']?? ''; ?>" id="exampleInputEmail1" placeholder="First Name">
                   </div>
                   <p class="text-warning" style="font-size:15px"> <?php echo $errors['first_name']?? '';
                     ?> </p>
                   <div class="mb-3">
                     <input type="text" class="form-control" name="last_name" value="<?php echo $old['last_name']?? ''; ?>" id="exampleInputPassword1" placeholder="Last Name">
                   </div>
                   <p class="text-warning" style="font-size:15px"> <?php echo $errors['last_name']?? '';
                     ?> </p>
                   <div class="mb-3">
                     <input type="text" class="form-control" name="age" value="<?php echo $old['age']?? ''; ?>" id="exampleInputPassword1" placeholder="Age">
                   </div>
                   <p class="text-warning" style="font-size:15px"> <?php echo $errors['age']?? '';
                     ?> </p>
                   <div class="mb-3">
                     <input type="text" class="form-control" name="gender" value="<?php echo $old['gender']?? ''; ?>" id="exampleInputPassword1" placeholder="Gender">
                   </div>
                   <p class="text-warning" style="font-size:15px"> <?php echo $errors['gender']?? '';
                     ?> </p>
                   <div class="mb-3">
                     <input type="text" class="form-control" name="phone_number" value="<?php echo $old['phone_number']?? ''; ?>" id="exampleInputPassword1" placeholder="Phone Number">
                   </div>
                    <p class="text-warning" style="font-size:15px"> <?php echo $errors['phone_number']?? '';?> </p>
                   <div class="mb-3">
                     <input type="email" class="form-control" name="email" value="<?php echo $old['email']?? ''; ?>" id="exampleInputEmail1" placeholder="Email">
                   </div> 
                   <p class="text-warning" style="font-size:15px"> <?php echo $errors['email']?? '';
                     ?> </p>
                   <div class="mb-3 Pass1" style="position:relative;">
                     <input type="password" class="form-control" name="password" value="<?php echo $old['password']?? ''; ?>" id="exampleInputPassword2" placeholder="Password">
                      <i class="fa-solid fa-eye-slash" id="eye2"></i>
                   </div>
                   <p class="text-warning" style="font-size:15px"> <?php echo $errors['password']?? '';
                      ?> </p>
                    <div class="mb-3 Pass2" style="position:relative;">
                     <input type="password" class="form-control" name="confirm_password" value="<?php echo $old['confirm_password']?? ''; ?>" id="exampleInputPassword3" placeholder="Confirm Password">
                      <i class="fa-solid fa-eye-slash" id="eye3"></i>
                   </div>
                    <p class="text-warning" style="font-size:15px"> <?php echo $errors['confirm_password']?? '';?> </p>
                   <div class="mb-3">
                     <textarea class="form-control" name="address">Address</textarea>
                   </div>
                   <p class="text-warning" style="font-size:15px"> <?php echo $errors['address']?? '';
                     ?> </p>
                   
                   <div class="my-5">
                      <a href="Customerlogin.php" class="text-danger">Old user? Please login ...</a>
                   </div>
                   <div class="d-flex justify-content-center">
                     <button type="submit" name="submit_customerdata" class="btn" style="background-color:#f94646; color:#fff;">Submit</button>
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
  
  $('#eye2').click(function(){
       if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#exampleInputPassword2').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#exampleInputPassword2').attr('type','password');
        }
        
    });
});
    
$(function(){
  
  $('#eye3').click(function(){
       if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#exampleInputPassword3').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#exampleInputPassword3').attr('type','password');
        }
        
    });
});
 </script>