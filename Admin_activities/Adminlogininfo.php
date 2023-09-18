<?php

 include('header.php');


require('../classes/AdminClass.php');

 $admin = new AdminClass;

 
if(isset($_POST['update'])){
    $update_adminlogin = $admin->update();
     
     if($update_adminlogin['status'] == 'error'){
         $errors = $update_adminlogin['message'];
     }
     if($update_adminlogin['status'] == 'success'){
         $success['success'] = $update_adminlogin['message'];
     }
 }

 
?>


  <main>
      <!-- Modal -->
       <div class="modal fade" id="UpdateModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content" style="background-color:#577069;">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Update Admin Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
              <form method="post" >
                  <div class="modal-body">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="user_name" value="<?php echo $_SESSION['authenticate']['user_name']?? ''; ?>" id="exampleInputEmail1">
                     </div>
                     <p class="text-warning" style="font-size:15px"> <?php echo $errors['user_name']?? '';
                      ?> </p>
                      <div class="mb-3 Pass6" style="position:relative;">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $_SESSION['authenticate']['password']?? ''; ?>" id="exampleInputPassword6">
                        <i class="fa-solid fa-eye-slash" id="eye7"></i>
                      </div>
                      <p class="text-warning" style="font-size:15px"> <?php echo $errors['password']?? '';
                      ?> </p>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" name="update" class="btn btn-light">Update</button>
                  </div>  
             </form>
          </div>
        </div>
      </div>  
    <section id="Customer" style="background-color:#3c4257;">
       <a href="../welcome.php" class="d-flex justify-content-end"><button type="button" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i></button></a>
      <div class="welcome py-5">
         <div class="container">
           <div class="row">
             <div class="col-12">
                <h1 class="text-white text-center fw-700">Admin Login Information</h1>
             </div>
             <div class="col-6 mx-auto py-5 px-5 text-dark bg-secondary-subtle">
                <?php
                     if(isset($success)){
                  ?>
                  <div class="alert alert-warning" role="alert" name="success">
                    <?php 
                      echo $success['success']; 
                      header('Refresh:1, url=Customerprofile.php');
                    ?>
                  </div>
                  <?php
                     }
                  ?>
              <form method="post">
                  
                   <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label">User Name</label>
                     <input type="text" class="form-control" name="user_name" value="<?php echo $_SESSION['authenticate']['user_name']?? ''; ?>" id="exampleInputEmail1">
                   </div>
                   <p class="text-warning" style="font-size:15px"> <?php echo $errors['user_name']?? '';
                    ?> </p>
                   <div class="mb-3 Pass5">
                     <label for="exampleInputPassword1" class="form-label">Password</label>
                     <input type="password" class="form-control" name="password" value="<?php echo $_SESSION['authenticate']['password']?? ''; ?>" id="exampleInputPassword5" style="position:relative;" readonly>
                     <i class="fa-solid fa-eye-slash" id="eye6"></i>
                   </div>
                    <p class="text-warning" style="font-size:15px"> <?php echo $errors['password']?? '';
                    ?> </p>
                 </form>
                 <div class="d-flex justify-content-center">
                     <button type="button" name="update_adminlogin" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#UpdateModel">Update</button>
                 </div>
                   
                 <form method="post" class="d-flex justify-content-center mt-2">
                     <button type="submit" name="logout" class="btn btn-dark">Logout</button>
                 </form>
                 <div class="d-flex justify-content-center mt-2">
                     <a href="../Admin_activities/Customertable.php"><button class="btn btn-warning">Proceed</button></a>
                 </div>
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
  
  $('#eye6').click(function(){
       if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#exampleInputPassword5').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#exampleInputPassword5').attr('type','password');
        }
        
    });
});
    
$(function(){
  
  $('#eye7').click(function(){
       if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#exampleInputPassword6').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#exampleInputPassword6').attr('type','password');
        }
        
    });
});

</script>