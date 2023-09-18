<?php
 include('header.php');

 require('../classes/Carclass.php');

 $car = new Carclass;

 if(isset($_POST['submit'])){
    $car_brand = $car->addBrand();
     
     if($car_brand['status'] == 'error'){
         $errors = $car_brand['message'];
     }
     if($car_brand['status'] == 'success'){
         $success['success'] = $car_brand['message'];
     }
 }

 $rows = $car->index();

 if(isset($_POST['update'])){
    $update_car_brand = $car->update();
     
     if($update_car_brand['status'] == 'error'){
         $errors = $update_car_brand['message'];
     }
     if($update_car_brand['status'] == 'success'){
         $success['success'] = $update_car_brand['message'];
     }
 }

 if(isset($_POST['DeletedID'])){
    $delete_car_brand = $car->delete();
     
     if($delete_car_brand['status'] == 'success'){
         $success['success'] = $delete_car_brand['message'];
     }
 }

if(isset($_POST['StatusID'])){
    $status_car_brand = $car->brand_status();
     
     if($status_car_brand['status'] == 'success'){
         $success['success'] = $status_car_brand['message'];
     }
 }

?>


  <main>
    <section id="Admin" style="background-color:#3c4257;">
      <div class="py-2 px-2">
        <a href="Customertable.php"><button type="button" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a>  
      </div>
      <div class="welcome py-5">
         <div class="container">
           <div class="row">
            
             <div class="col-12">
                <h1 class="text-white text-center fw-700">Create Car Brand</h1>
             </div>
             <div class="col-8 mx-auto py-2 px-2 text-white">
                 
                 
                  <?php
                    if(isset($success)){
                  ?>
                  <div class="alert alert-warning" role="alert" name="success">
                    <?php 
                      echo $success['success']; 
                      header('Refresh:.5,url=Create_car_brand.php');  
                    ?>
                  </div>
                  <?php
                     }
                  ?>
                   <table class="table table-light">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th></th>
                          </tr>
                        </thead>
                        <?php
                         if(mysqli_num_rows($rows) > 0){
                             while($row = mysqli_fetch_assoc($rows)){
                       ?>
                        <tbody>
                          <tr>
                            <td data-label="Id">
                              <?php
                                $x = $row['id'];
                                echo $x;
                                $x++;
                              ?>
                            </td>
                            <td data-label="Name"><?php echo $row['name']?></td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#UpdateModel_<?php echo $row['id']; ?>">
                                  Update
                                </button>
                                <button type="submit" name="delete" class="btn btn-dark" onclick="if(!confirm('Do you want to delete <?php echo $row['name'];?> brand?')){
                                     return event.preventDefault();                                  
                                }else{
                                  deletebrand(<?php echo $row['id'];?>);                                       
                                }">Delete</button>
                                <button type="button" class="btn <?php echo ($row['status'] == 1? 'btn-success' : 'btn-warning'); ?>" onclick="if(!confirm('Do you want to make <?php echo ($row['status'] == 1 ? 'deactive' : 'active');?> <?php echo $row['name']?> brand')){
                                  return event.preventDefault();
                                }else{
                                  Car_brand_status(<?php echo $row['id']; ?>);    
                                }">
                                <?php
                                  if($row['status'] == 1){
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
                            </td>
                          </tr>
                        </tbody>
                         <!-- Modal -->
                        <div class="modal fade" id="UpdateModel_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="background-color:#2e2a64;">
                              <form method="post" >
                                <input type="hidden" name="updateid" value="<?php echo $row['id']; ?>">
                                   <div class="modal-header">
                                     <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Update Car Brand</h1>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                        <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label text-white">Name</label>
                                          <input type="text" class="form-control" name="name" value="<?php echo $row['name']?? ''; ?>" id="exampleInputEmail1">
                                        </div>
                                        <p class="text-warning" style="font-size:15px"> <?php echo $errors['name']?? '';
                                        ?> </p>
                                   </div>
                                   <div class="modal-footer d-flex justify-content-center">
                                     <button type="submit" name="update" class="btn btn-light">Update</button>
                                   </div>  
                              </form>
                           </div>
                         </div>
                       </div>  
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
                    Add Brand
                </button>
                <!-- Modal -->
                   <form method="post">               
                      <div class="modal fade" id="AddbrandModal" tabindex="-1" aria-       labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="background-color:#df2a2a;">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Car Brand</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                 <div class="mb-3">
                                   <label for="exampleInputEmail1" class="form-label text-white">Name</label>
                                   <input type="text" class="form-control" name="name" value="<?php echo $old['name']?? ''; ?>" id="exampleInputEmail1">
                                 </div>
                                    <p class="text-warning" style="font-size:15px"><?php echo $errors['name']?? '';?></p>
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
    
     function Car_brand_status(y){
      document.querySelector('#StatusID').value = y;
      document.querySelector('#Statusform').submit();
    }
    
</script>