<?php
 include('header.php');

 require('../classes/Carclass.php');

 $car = new Carclass;

 $brands_index = $car->index();
 
 $details_index = $car->Detailsindex();


 if(isset($_POST['submit'])){
    $car_details = $car->addDetails();
     
     if($car_details['status'] == 'error'){
         $errors = $car_details['message'];
     }
     if($car_details['status'] == 'success'){
         $success['success'] = $car_details['message'];
     }
 }

 if(isset($_POST['DeletedID'])){
    $delete_car_details = $car->deleteDetails();
     
     if($delete_car_details['status'] == 'success'){
         $success['success'] = $delete_car_details['message'];
     }
 }

  if(isset($_POST['StatusID'])){
    $status_car_details = $car->statusDetails();
     
     if($status_car_details['status'] == 'success'){
         $success['success'] = $status_car_details['message'];
     }
 }

?>


  <main>
    <section id="Admin" style="background-color:#3c4257;">
      <div class="py-2 px-2">
        <a href="Customertable.php"><button type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a>  
      </div>
      <div class="welcome py-5">
         <div class="container">
           <div class="row">
            
             <div class="col-12">
                <h1 class="text-white text-center fw-700">Create Car Details</h1>
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
                   <table class="table table-warning text-center">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Details</th>
                            <th scope="col">Image</th>
                            <th></th>
                          </tr>
                        </thead>
                         <?php
                           if(mysqli_num_rows($details_index) > 0){
                               while($detail_index = mysqli_fetch_assoc($details_index)){
                         ?>
                        <tbody>
                          <tr>
                            <td>
                              <?php
                                $x = $detail_index['id'];
                                echo $x;
                                $x++;
                              ?>
                            </td>
                            <td><?php echo $detail_index['car_name']; ?></td>
                            <td><?php echo $detail_index['price']; ?></td>
                            <td><?php echo $detail_index['details']; ?></td>
                            <td><img src="../images/car_img/<?php echo $detail_index['image']; ?>" alt="car" class="img-fluid"></td>
                            <td>
                               <div class="d-flex align-items-center">
                                  <a href="Update_car_details.php?id=<?php echo $detail_index['id']; ?>"><button type="button" class="btn btn-danger me-1">Update</button></a>
                                  <button type="submit" name="delete" class="btn btn-dark me-1" onclick="if(!confirm('Do you want to delete <?php echo $detail_index['car_name'];?> details?')){
                                     return event.preventDefault();                                  
                                  }else{
                                  deletebrand(<?php echo $detail_index['id'];?>);                                       
                                  }">Delete</button> 
                                  <button type="button" class="btn <?php echo ($detail_index['status'] == 1? 'btn-success' : 'btn-warning'); ?>" onclick="if(!confirm('Do you want to make <?php echo ($detail_index['status'] == 1 ? 'deactive' : 'active');?> <?php echo $detail_index['car_name']?> details')){
                                  return event.preventDefault();
                                   }else{
                                     Car_details_status(<?php echo $detail_index['id']; ?>);    
                                   }">
                                   <?php
                                     if($detail_index['status'] == 1){
                                   ?>
                                        Make deactive
                                     <?php
                                       }else{
                                     ?>
                                       Make active
                                   <?php
                                       } 
                                    ?>
                                   </button>
                                 </div>
                            </td>
                          </tr>
                       </tbody>
                        <?php        
                            }
                        }      
                        ?>
                     </table> 
                     <form class="d-none" id="Deletedform" method="post">
                       <input type="hidden" id="DeletedID" name="DeletedID">
                     </form>
                 
                     <form class="d-none" id="Statusform" method="post">
                       <input type="hidden" id="StatusID" name="StatusID">
                     </form>
             </div>            
              
             <div class="d-flex justify-content-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddbrandModal">
                    Add Car Details
                </button>
                <!-- Modal -->
                   <form method="post" enctype="multipart/form-data">               
                      <div class="modal fade" id="AddbrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="background-color:#df2a2a;">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Car Details</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                      <div class="form-floating my-3">
                                        <select class="form-control" id="brand" name="brand">
                                           <option value="">Select Car Brand</option>
                                        <?php
                                           if(mysqli_num_rows($brands_index) > 0){
                                             while($brand_index = mysqli_fetch_assoc($brands_index)){
                                         ?>
                                                <option value="<?php echo $brand_index['id']; ?>"><?php echo $brand_index['name']; ?></option>
                                         <?php
                                            }
                                           }      
                                         ?>
                                         </select>
                                         <label for="brand">Brands</label>
                                         
                                         <p class="text-warning" style="font-size:15px"> <?php echo $errors['brand']?? ''; ?> </p>   
                                       </div>
                                       <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label text-black">Name</label>
                                          <input type="text" class="form-control" name="name" value="<?php echo $row['name']?? ''; ?>" id="exampleInputEmail1">
                                            
                                          <p class="text-warning" style="font-size:15px"> <?php echo $errors['name']?? ''; ?> </p>    
                                        </div>
                                       <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label text-black">Price</label>
                                          <input type="number" class="form-control" name="price" value="<?php echo $row['price']?? ''; ?>" id="exampleInputEmail1">
                                           
                                          <p class="text-warning" style="font-size:15px"> <?php echo $errors['price']?? ''; ?> </p>
                                        </div>
                                       <div class="mb-5">
                                          <label for="exampleInputEmail1" class="form-label text-black">Details</label>
                                          <textarea type="text" class="form-control" name="details" style="width:100%; height:150px;"><?php echo $row['details']?? ''; ?></textarea>
                                           
                                          <p class="text-warning" style="font-size:15px"> <?php echo $errors['details']?? ''; ?> </p>
                                        </div>
                                       <div class="input-group mb-3">
                                         <input type="file" class="form-control" id="inputGroupFile02" name="car_img">
                                         <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                           
                                         <p class="text-warning" style="font-size:15px"> <?php echo $errors['image']?? ''; ?> </p>
                                       </div>
                               </div>
                               <div class="modal-footer d-flex justify-content-center">
                                 <button type="submit" name="submit" class="btn btn-light">Submit</button>
                               </div>
                            </div>
                          </div>
                        </div>
                    </form>
             </div>
              
               
               <form class="d-flex justify-content-center mt-5" method="post">
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
    
     function Car_details_status(y){
         document.querySelector('#StatusID').value = y;
         document.querySelector('#Statusform').submit();
     }
    
</script>