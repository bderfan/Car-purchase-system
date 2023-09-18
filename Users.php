<?php

 include('header.php');

 require('authenticate.php');

 if(isset($_POST['submit'])){
     $old = $_POST;
     $index = index();
     if($index['status'] == 'error'){
         $errors = $index['message'];
     }
     if($index['status'] == 'success'){
         $success['success'] = $index['message'];
     }
 }

?>

  <main>
    <section id="User" style="background-image: url('images/Users.jpg'); background-size:cover; background-repeat: no-repeat;">
       <a href="welcome.php" class="mx-2 pt-2 d-flex justify-content-end"><button type="button" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a> 
      <?php
         if(isset($success)){
      ?>
      <div class="alert alert-warning" role="alert" name="success">
        <?php 
          echo $success['success']; 
          header('Location:Adminlogin.php');
        ?>
      </div>
      <?php
         }
      ?>
      <div class="user py-5">
         <div class="container">
           <div class="row">
             <div class="col-4 mx-0 py-5" style="background-color: #3b3d57; border-radius:25px;">
                <h1 class="text-white text-center fw-700">User Panel</h1>
                <div class="mt-5 d-flex justify-content-center">
                  <button type="button" class="btn btn-warning px-4" data-bs-toggle="modal" data-bs-target="#AdminModal">Admin</button>  
                </div>
                <!-- Modal -->
                   <form method="post">               
                      <div class="modal fade" id="AdminModal" tabindex="-1" aria-       labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="background-color:#f44141;">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Please insert your user name</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                 <div class="mb-3">
                                   <label for="exampleInputEmail1" class="form-label text-white">User Name</label>
                                   <input type="text" class="form-control" name="username" value="<?php echo $old['username']?? ''; ?>" id="exampleInputEmail1">
                                 </div>
                                    <p class="text-white" style="font-size:15px"><?php echo $errors['username']?? '';?></p>
                               </div>
                               <div class="modal-footer d-flex justify-content-center">
                                 <button type="submit" name="submit" class="btn btn-light">Submit</button>
                               </div>
                            </div>
                          </div>
                        </div>
                    </form>
                <a href="CustomerData.php" class="mt-3 d-flex justify-content-center"><button type="button" class="btn btn-light">Customer</button></a>
             </div>
           </div>  
         </div> 
        </div>
        
    </section>  
  </main>

<?php
  include('footer.php');
?>

