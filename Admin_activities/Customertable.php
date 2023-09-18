<?php
 include('header.php');

 require('../classes/Customerclass.php');

 $customer = new Customerclass;

 $rows = $customer->index();


?>


  <main>
    <section id="Admin" style="background-color:#3c4257;"> 
       <div class="py-2 px-2">
        <a href="Adminlogininfo.php"><button type="button" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a>  
      </div>
      <div class="welcome py-5">
         <div class="container">
           <div class="row">
            
             <div class="col-12">
                <h1 class="text-white text-center fw-700">Customer Table</h1>
             </div>
             <div class="col-12 mx-auto py-1 text-white" style="background-image: url(../images/Customertable.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                 
                 
                  <?php
                    if(isset($success)){
                  ?>
                  <div class="alert alert-warning" role="alert" name="success">
                    <?php 
                      echo $success['success']; 
                      header('Refresh:1,url=Adminlogin.php');  
                    ?>
                  </div>
                  <?php
                     }
                  ?>
                 <form method="post">
                   <table class="table table-light">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Image</th>
                          </tr>
                        </thead>
                        <?php
                          if(mysqli_num_rows($rows)>0){
                              while($row = mysqli_fetch_assoc($rows)){
                        ?>
                        <tbody>
                          <tr>
                            <td data-label="Id">
                              <?php
                                $x = $row['id'];
                                echo $x++;
                              ?>
                            </td>
                            <td data-label="First Name"><?php echo $row['first_name'];?></td>
                            <td data-label="Last Name"><?php echo $row['last_name'];?></td>
                            <td data-label="Age"><?php echo $row['age'];?></td>
                            <td data-label="Gender"><?php echo $row['gender'];?></td>
                            <td data-label="Phone Number"><?php echo $row['phone_number'];?></td>
                            <td data-label="Address"><?php echo $row['address'];?></td>
                            <td data-label="Image"><img src="../images/customer_img/<?php echo $row['image'];?>" style="height:100px;"></td>
                          </tr>
                        </tbody>
                       <?php    
                              }
                          }         
                       ?>
                     </table> 
                 </form>
             </div>
               <div class="d-flex justify-content-center mt-2">
                  <a href="../Admin_activities/Create_car_brand.php"><button class="btn btn-light me-2">Create car brand</button></a>
                  <a href="../Admin_activities/Create_car_details.php"><button class="btn btn-warning">Create car details</button></a>
               </div>
               <div class="d-flex justify-content-center mt-2">
                  <a href="../Admin_activities/Paymentshow.php"><button class="btn btn-dark me-2">Show payment informations</button></a>
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