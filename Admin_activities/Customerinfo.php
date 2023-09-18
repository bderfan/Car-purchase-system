<?php
 include('header.php');

 require('../classes/Customerclass.php');

 $customer = new Customerclass;

 $rows = $customer->info();


?>


  <main>
    <section id="Admin" style="background-color:#a9a9a9;"> 
       <div class="py-2 px-2">
        <a href="Paymentshow.php"><button type="button" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a>  
      </div>
      <div class="welcome py-5">
         <div class="container">
           <div class="row">
            
             <div class="col-12">
                <h1 class="text-dark text-center fw-700">Customer Infomations</h1>
             </div>
             
                 
                 
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
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Car ID</th>
                            <th scope="col">Car Name</th>
                            <th scope="col">Car Price</th>
                            <th scope="col">Car Details</th>
                            <th scope="col">Car Image</th>
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
                                $x = $row['customer_id'];
                                echo $x++;
                              ?>
                            </td>
                            <td data-label="First Name"><?php echo $row['first_name'];?></td>
                            <td data-label="Last Name"><?php echo $row['last_name'];?></td>
                            <td data-label="Phone Number"><?php echo $row['phone_no'];?></td>
                            <td data-label="Address"><?php echo $row['address'];?></td>
                            <td data-label="Car ID"><?php echo $row['car_id'];?></td>
                            <td data-label="Car Name"><?php echo $row['car_name'];?></td>
                            <td data-label="Car Price"><?php echo $row['car_price'];?></td>
                            <td data-label="Car Details"><?php echo $row['car_details'];?></td>
                            <td data-label="Car Image"><img src="../images/car_img/<?php echo $row['car_image'];?>" style="height:100px;"></td>
                          </tr>
                        </tbody>
                       <?php    
                              }
                          }         
                       ?>
                     </table> 
                 </form>
             </div>
               <form class="d-flex justify-content-center mt-5" method="post">
                     <button type="submit" name="logout" class="btn btn-light">Logout</button>
               </form>
           </div>  
         </div> 
      </div>
    </section>  
  </main>
 


<?php
  include('footer.php');
?>