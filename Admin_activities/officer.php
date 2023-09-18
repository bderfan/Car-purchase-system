<?php
 include('header.php');

 require('../classes/Customerclass.php');

 $customer = new Customerclass;

 $rows = $customer->Officer();


?>


  <main>
    <section id="Admin" style="background-color:#CECECC;"> 
       <div class="py-2 px-2">
        <a href="bankloan.php"><button type="button" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a>  
      </div>
      <div class="welcome py-5">
           <div class="row">
            
             <div class="col-12">
                <h1 class="text-black text-center fw-700">Bank Statements of Officers</h1>
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
                            <th class="text-danger">Profession</th>
                            <th class="text-danger">Customer Id</th>
                            <th class="text-danger">Customer Details</th>
                            <th class="text-danger">Period</th>
                            <th class="text-danger">Bank Name</th>
                            <th class="text-danger">Branch Name</th>
                            <th class="text-danger">Account Information</th>
                            <th class="text-danger">Currency</th>
                            <th class="text-danger">Generation Date</th>
                            <th class="text-danger">Total Amount</th>
                          </tr>
                        </thead>
                        <?php
                          if(mysqli_num_rows($rows)>0){
                              while($row = mysqli_fetch_assoc($rows)){
                        ?>
                        <tbody>
                          <tr>
                            <td data-label="Profession"><?php echo $row['profession'];?></td>
                            <td data-label="Customer Id">
                              <?php
                                $x = $row['customer_id'];
                                echo $x++;
                              ?>
                            </td>
                            <td data-label="Customer Details">
                                <p class="fw-bold my-0">Name:</p>
                                <p class="my-0"><?php echo $row['customer_name'];?></p>
                                <p class="fw-bold my-0">Address:</p>
                                <p class="my-0"><?php echo $row['customer_address'];?></p>
                                <p class="fw-bold my-0">City:</p>
                                <p class="my-0"><?php echo $row['customer_city'];?></p>
                                <p class="fw-bold my-0">Phone Number:</p>
                                <p class="my-0"><?php echo $row['customer_mobile_no'];?></p>
                            </td>
                            <td data-label="Period"><?php echo $row['period'];?></td>
                            <td data-label="Bank Name"><?php echo $row['bank_name'];?></td>
                            <td data-label="Branch Name"><?php echo $row['branch_name'];?></td>
                            <td data-label="Acount Information">
                                <p class="fw-bold my-0">Account Number:</p>
                                <p class="my-0"><?php echo $row['account_no'];?></p>
                                <p class="fw-bold my-0">Account Type:</p>
                                <p class="my-0"><?php echo $row['account_type'];?></p>
                                <p class="fw-bold my-0">Account Status:</p>
                                <p class="my-0"><?php echo $row['account_status'];?></p>
                            </td>
                            <td data-label="Currency"><?php echo $row['currency'];?></td>
                            <td data-label="Generation Date"><?php echo $row['generation_date'];?></td>
                            <td data-label="Total Amount"><?php echo $row['total_amount'];?></td>
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
                     <button type="submit" name="logout" class="btn btn-danger">Logout</button>
               </form>
           </div> 
    </section>  
  </main>
 


<?php
  include('footer.php');
?>