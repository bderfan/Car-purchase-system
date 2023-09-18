<?php
 include('header.php');

 require('../classes/Carclass.php');

 $car = new Carclass;


 if(isset($_POST['update'])){
    $car_details = $car->updateDetails();
     
     if($car_details['status'] == 'error'){
         $errors = $car_details['message'];
     }
     if($car_details['status'] == 'success'){
         $success['success'] = $car_details['message'];
     }
 }

  $targetdata = $car->targetData($_GET['id']);

?>


  <main>
    <section id="Admin" style="background-color:#99904b;">
      <div class="py-2 px-2">
        <a href="Create_car_details.php"><button type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a>  
      </div>
      <div class="welcome py-5">
         <div class="container">
           <div class="row">
            
             <div class="col-12">
                <h1 class="text-white text-center fw-700">Update Car Details</h1>
             </div>
             <div class="col-12 mx-auto py-2 px-2 text-white">
                 
                 
                  <?php
                    if(isset($success)){
                  ?>
                  <div class="alert alert-warning" role="alert" name="success">
                    <?php 
                      echo $success['success']; 
                      header('Refresh:.5,url=Create_car_details.php');  
                    ?>
                  </div>
                  <?php
                     }
                  ?>
               
                     <form class="d-none" id="Deletedform" method="post">
                       <input type="hidden" id="DeletedID" name="DeletedID">
                     </form>
             </div>            
              
             <div class="col-8 mx-auto">
                   <form method="post" enctype="multipart/form-data"> 
                       <input type="hidden" name="car_details_id" value="<?php echo $targetdata['id']; ?>">
                        <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label black">Name</label>
                             <input type="text" class="form-control" name="name" value="<?php echo $row['name']??$targetdata['car_name']?? ''; ?>" id="exampleInputEmail1">
                                            
                             <p class="text-warning" style="font-size:15px"> <?php $errors['name']?? ''; ?> </p>    
                          </div>
                          <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label black">Price</label>
                             <input type="text" class="form-control" name="price" value="<?php echo $row['price']??$targetdata['price']?? ''; ?>" id="exampleInputEmail1">
                                           
                             <p class="text-warning" style="font-size:15px"> <?php $errors['price']?? ''; ?> </p>
                           </div>
                          <div class="mb-5">
                             <label for="exampleInputEmail1" class="form-label black">Details</label>
                             <textarea type="text" class="form-control" name="details" style="width:100%; height:150px;"><?php echo $row['details']??$targetdata['details']?? ''; ?></textarea>
                                           
                             <p class="text-warning" style="font-size:15px"> <?php $errors['details']?? ''; ?> </p>
                           </div>
                           <div class="mb-5 d-flex justify-content-center">
                               <img src="../images/car_img/<?php echo $targetdata['image']; ?>" alt="car" class="img-fluid" style="width:250px; height:200px;">
                           </div>
                           <div class="input-group mb-3">
                             <input type="file" class="form-control" id="inputGroupFile02" name="car_img">
                             <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                           
                             <p class="text-warning" style="font-size:15px"> <?php echo $errors['car_img']?? ''; ?> </p>
                           </div>      
                           <div class="d-flex justify-content-center mt-5">
                              <button type="submit" name="update" class="btn btn-light">Update</button>
                           </div>
                    </form>
             </div>
              
            
               <form class="d-flex justify-content-center mt-2" method="post">
                     <button type="submit" name="logout" class="btn btn-danger">Logout</button>
               </form>
           </div>  
         </div> 
      </div>
    </section>  
     
  </main>
  

<?php
  include('footer.php');
?>



<script>

    function deletebrand(x){
      document.querySelector('#DeletedID').value = x;
      document.querySelector('#Deletedform').submit();
    }
    
</script>