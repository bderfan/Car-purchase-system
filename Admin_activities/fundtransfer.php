<?php
 include('header.php');

 require('../classes/Customerclass.php');

 $customer = new Customerclass;

 $rows = $customer->fundTransfer();


?>


  <main>
    <section id="Admin" style="background-color:#3c4257;"> 
       <div class="py-2 px-2">
        <a href="cashmethod.php"><button type="button" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
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
                            <th scope="col">Cash Method</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Bank Name</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Swift Code</th>
                            <th scope="col">Branch Code</th>
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
                            <td data-label="Cash Method"><?php echo $row['cash_method'];?></td>
                            <td data-label="Account Number"><?php echo $row['account_number'];?></td>
                            <td data-label="Bank Name"><?php echo $row['bank_name'];?></td>
                            <td data-label="Account Name"><?php echo $row['account_name'];?></td>
                            <td data-label="Swift Code"><?php echo $row['swift_code'];?></td>
                            <td data-label="Branch Code"><?php echo $row['branch_code'];?></td>
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
         </div> 
      </div>
    </section>  
  </main>
 


<?php
  include('footer.php');
?>