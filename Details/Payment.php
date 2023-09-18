<?php

 include('header.php');
 
 include('../classes/Homeclass.php');

 $home = new Homeclass;

 $old = $_POST;

 $GetCustomer = $home->GetCustomer($_GET['email']);

 
if(isset($_POST['confrm_payment'])){

    
     $payment_method = $home->Paymentmethod($_GET['email'],$_GET['car_id']);
    
     if($payment_method['status'] == 'error'){
        $errors = $payment_method['message'];
     }
     if($payment_method['status'] == 'success'){
         $success['success'] = $payment_method['message'];
     }
  }
 
 
?>

<main>
 <!-- Car selection part -->
 <section id="Select_car" style="background-color:#3c4257;">
     <a href="Customerprofile.php" class="d-flex justify-content-end py-3 px-2"><button type="button" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i></button></a>
    <div class="container">
      <div class="row py-3">
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
        <h1 class="text-center text-white">Payment page</h1>    
        <div class="col-9 mx-auto">
         <div class="border border-light border-4 my-5 py-5 px-4"> 
           <form method="post">
             <h3 class="text-center text-white my-2 fw-bold">Payment Information of <?php echo $GetCustomer['first_name'].' '.$GetCustomer['last_name']; ?></h3>  
             <div class="col-6 mx-auto bg-white py-5">
             <h5 class="text-center text-dark my-2">Please choose your payment method</h5>    
                 
                 
                 
                 
            <!-- ================== Bank Loan payment method =================== -->
             <div class="d-flex justify-content-center" data-bs-toggle="collapse" href="#collapseExample"> 
               <input type="radio" class="btn-check" name="payment_method" id="bl" autocomplete="off" value="bl" <?php echo isset($old['payment_method']) && $old['payment_method'] == 'bl'? 'checked' : ''; ?>>
               <label class="btn btn-outline-danger" for="bl">Bank Loan</label> 
             </div>
             <div class="mt-2 collapse mx-3" id="collapseExample">
                 <div class="card card-body text-center">
                    <h5>Select your profession</h5>
                     
                     
                       <!-- ================= officer profession ========== -->
                       <div class="d-flex justify-content-center" data-bs-toggle="collapse" href="#collapseExample3">
                         <input type="radio" class="btn-check" name="bankloan_payment_profession" id="officer" autocomplete="off" value="officer" <?php echo isset($old['bankloan_payment_profession']) && $old['bankloan_payment_profession'] == ''? 'checked' : ''; ?>>
                         <label class="btn btn-outline-danger" for="officer">Officer</label> 
                       </div>
                     
                     
                   <!-- ============== officers infos ============== -->
                   <div class="mt-2 collapse" id="collapseExample3">
                      <div class="bg-transparent">
                         <div class="mb-1">
                           <input type="text" class="form-control" value="<?php echo $GetCustomer['first_name']?? ''; ?>" id="exampleInputEmail1" placeholder="First name" readonly>
                         </div>
                         <div class="mb-1">
                          <input type="text" class="form-control" value="<?php echo $GetCustomer['last_name']?? ''; ?>" id="exampleInputEmail1" placeholder="Last name" readonly>
                        </div>
                         <div class="mb-1">
                           <textarea class="form-control" placeholder="Address" readonly><?php echo $GetCustomer['address']?? ''; ?></textarea>
                         </div>
                         <div class="mb-1">
                            <input type="text" class="form-control" value="<?php echo $GetCustomer['phone_number']?? ''; ?>" id="exampleInputEmail1" placeholder="Mobile" readonly>
                         </div>
                         
                         <div class="mb-1">
                            <textarea class="form-control" name="city" placeholder="City"><?php echo $old['city']?? '';?></textarea>
                         </div>
                         <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['city']?? '';
                         ?> </p>
                         <div class="mb-1">
                            <input type="text" class="form-control" name="period" value="<?php echo $old['period']?? ''; ?>" id="exampleInputEmail1" placeholder="Period">
                         </div>
                         <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['period']?? '';
                         ?> </p>
                         <div class="mb-1">
                            <input type="text" class="form-control" name="bank_name" value="<?php echo $old['bank_name']?? ''; ?>" id="exampleInputEmail1" placeholder="Bank name">
                         </div>
                         <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['bank_name']?? '';
                         ?> </p>
                         <div class="mb-1">
                            <input type="text" class="form-control" name="branch_name" value="<?php echo $old['branch_name']?? ''; ?>" id="exampleInputEmail1" placeholder="Branch name">
                         </div>
                         <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['branch_name']?? '';
                         ?> </p>
                         <div class="mb-1">
                           <input type="number" class="form-control" name="account_no" value="<?php echo $old['account_no']?? ''; ?>" id="exampleInputEmail1" placeholder="A/C No">
                        </div>
                         <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['account_no']?? '';
                         ?> </p>
                         <div class="mb-1">
                           <input type="text" class="form-control" name="account_type" value="<?php echo $old['account_type']?? ''; ?>" id="exampleInputEmail1" placeholder="A/C Type">
                         </div>
                         <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['account_type']?? '';
                         ?> </p>
                         <div class="mb-1">
                           <input type="text" class="form-control" name="currency" value="<?php echo $old['currency']?? ''; ?>" id="exampleInputEmail1" placeholder="Currency">
                         </div>
                         <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['currency']?? '';
                         ?> </p>
                         <div class="mb-1">
                            <input type="text" class="form-control" name="account_status" value="<?php echo $old['account_status']?? ''; ?>" id="exampleInputEmail1" placeholder="A/C Status">
                         </div>
                         <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['account_status']?? '';
                         ?> </p>
                         <div class="mb-1">
                            <input type="text" class="form-control" name="generation_date" value="<?php echo $old['generation_date']?? ''; ?>" id="exampleInputEmail1" placeholder="Generation Date">
                         </div>
                         <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['generation_date']?? '';
                         ?> </p>
                         <div class="mb-1">
                           <input type="number" class="form-control" name="total_amount" value="<?php echo $old['total_amount']?? ''; ?>" id="exampleInputEmail1" placeholder="Total Amount">
                         </div>
                         <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['total_amount']?? '';
                         ?> </p>
                       </div>
                   </div>
                     
                      <!-- ================ businessman profession =========== -->
                      <div class = "d-flex justify-content-center mt-2" data-bs-toggle="collapse" href="#collapseExample4">
                         <input type="radio" class="btn-check" name="bankloan_payment_profession" id="businessman" autocomplete="off" value="businessman" <?php echo isset($old['bankloan_payment_profession']) && $old['bankloan_payment_profession'] == 'businessman'? 'checked' : ''; ?>>
                         <label class="btn btn-outline-dark" for="businessman">Businessman</label> 
                       </div> 
                       <p class="text-danger fw-bold text-center my-2" style="font-size:15px;"> <?php echo $errors['bankloan_payment_profession']??'' ?></p> 
                     
                      <!-- ============= businessman infos ============== -->
                      <div class="mt-2 collapse" id="collapseExample4">
                         <div class="bg-transparent">
                             <div class="mb-1">
                               <input type="text" class="form-control" value="<?php echo $old['first_name']??$GetCustomer['first_name']?? ''; ?>" id="exampleInputEmail1" placeholder="First name" readonly>
                             </div>
                             <div class="mb-1">
                                <input type="text" class="form-control" value="<?php echo $old['last_name']??$GetCustomer['last_name']?? ''; ?>" id="exampleInputEmail1" placeholder="Last name" readonly>
                             </div>
                             <div class="mb-1">
                               <textarea class="form-control" placeholder="Address" readonly><?php echo $old['Address']??$GetCustomer['address']?? '; '?></textarea>
                             </div>
                              <div class="mb-1">
                                <input type="text" class="form-control" value="<?php echo $old['mobile_no']??$GetCustomer['phone_number']?? ''; ?>" id="exampleInputEmail1" placeholder="Mobile" readonly>
                             </div>
                             <div class="mb-1">
                                <textarea class="form-control" name="City" placeholder="City"></textarea>
                             </div>
                             <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['City']?? '';
                             ?> </p>
                             <div class="mb-1">
                                <input type="text" class="form-control" name="Period" value="<?php echo $old['Period']?? ''; ?>" id="exampleInputEmail1" placeholder="Period">
                              </div>
                              <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['Period']?? '';
                              ?> </p>
                              <div class="mb-1">
                                 <input type="text" class="form-control" name="Bank_name" value="<?php echo $old['Bank_name']?? ''; ?>" id="exampleInputEmail1" placeholder="Bank name">
                              </div>
                              <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['Bank_name']?? '';
                              ?> </p>
                              <div class="mb-1">
                                <input type="text" class="form-control" name="Branch_name" value="<?php echo $old['Branch_name']?? ''; ?>" id="exampleInputEmail1" placeholder="Branch name">
                             </div>
                              <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['Branch_name']?? '';
                              ?> </p>
                              <div class="mb-1">
                               <input type="number" class="form-control" name="Account_no" value="<?php echo $old['Account_no']?? ''; ?>" id="exampleInputEmail1" placeholder="A/C No">
                              </div>
                              <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['Account_no']?? '';
                              ?> </p>
                              <div class="mb-1">
                                 <input type="text" class="form-control" name="Account_type" value="<?php echo $old['Account_type']?? ''; ?>" id="exampleInputEmail1" placeholder="A/C Type">
                              </div>
                              <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['Account_type']?? '';
                              ?> </p>
                              <div class="mb-1">
                                 <input type="text" class="form-control" name="Currency" value="<?php echo $old['Currency']?? ''; ?>" id="exampleInputEmail1" placeholder="Currency">
                              </div>
                              <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['Currency']?? '';
                              ?> </p>
                              <div class="mb-1">
                                 <input type="text" class="form-control" name="Account_status" value="<?php echo $old['Account_status']?? ''; ?>" id="exampleInputEmail1" placeholder="AC Status">
                              </div>
                              <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['Account_status']?? '';
                              ?> </p>
                              <div class="mb-1">
                                 <input type="text" class="form-control" name="Generation_date" value="<?php echo $old['Generation_date']?? ''; ?>" id="exampleInputEmail1" placeholder="Generation Date">
                              </div>
                              <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['Generation_date']?? '';
                              ?> </p>
                              <div class="mb-1">
                                 <input type="text" class="form-control" name="Total_amount" value="<?php echo $old['Total_amount']?? ''; ?>" id="exampleInputEmail1" placeholder="Total Amount">
                              </div>
                              <p class="text-warning fw-bold text-start my-2" style="font-size:15px"> <?php echo $errors['Total_amount']?? '';
                              ?> </p>
                           </div>
                         </div>    
                     </div>
                  </div> 
                 
                 
                 
              <!-- ===================== Cash Payment Method ================== -->
               <div class = "d-flex justify-content-center mt-2" data-bs-toggle="collapse" href="#collapseExample2">
                    <input type="radio" class="btn-check" name="payment_method" id="cp" autocomplete="off" value="cp" <?php echo isset($old['payment_method']) && $old['payment_method'] == 'cp'? 'checked' : ''; ?>>
                    <label class="btn btn-outline-warning" for="cp">Cash Payment</label> 
                </div>   
                <p class="text-dark fw-bold text-center my-2" style="font-size:15px;"> <?php echo $errors['payment_method']??'' ?></p>
             <div class="mt-2 collapse mx-3" id="collapseExample2">
                <div class="card card-body">
                    
                      <!-- ============= direct payment ============= -->
                      <div class="d-flex justify-content-center" data-bs-toggle="collapse" href="#collapseExample5">
                            <input type="radio" class="btn-check" name="cash_payment" id="dp" autocomplete="off" value="dp" <?php echo isset($old['cash_payment']) && $old['cash_payment'] == 'dp'? 'checked' : ''; ?>>
                            <label class="btn btn-outline-secondary" for="dp">Direct Payment</label> 
                      </div>
                   
                    
                   <!-- =============== direct payment infos ============ -->
                   <div class="mt-2 collapse" id="collapseExample5">
                      <div class="bg-transparent">
                      <h5 class="my-4 text-black text-start">Set up your credit or debit card</h5>
                      <div class="mb-1">
                        <input type="number" class="form-control" name="card_number" value="<?php echo $old['card_number']?? ''; ?>" id="exampleInputEmail1" placeholder="Card Number">
                      </div>
                      <p class="text-warning" style="font-size:15px"> <?php echo $errors['card_number']?? '';
                      ?> </p>
                      <div class="mb-1">
                         <input type="text" class="form-control" name="expired_date" value="<?php echo $old['expired_date']?? ''; ?>" id="exampleInputEmail1" placeholder="Expired Date">
                      </div>
                      <p class="text-warning" style="font-size:15px"> <?php echo $errors['expired_date']?? '';
                      ?> </p>
                      <div class="mb-1">
                        <input type="number" class="form-control" name="cvv" value="<?php echo $old['cvv']?? ''; ?>" id="exampleInputEmail1" placeholder="CVV">
                      </div>
                      <p class="text-warning" style="font-size:15px"> <?php echo $errors['cvv']?? '';
                      ?> </p>
                      <div class="mb-1">
                         <input type="text" class="form-control" value="<?php echo $GetCustomer['first_name'].' '.$GetCustomer['last_name']?? ''; ?>" id="exampleInputEmail1" placeholder="Full Name" readonly>
                      </div>
                      </div>
                      </div>
                    
                    
                      <!-- ============= fund transfer ============ -->
                      <div class="d-flex justify-content-center mt-2" data-bs-toggle="collapse" href="#collapseExample6">
                           <input type="radio" class="btn-check" name="cash_payment" id="ft" autocomplete="off" value="ft" <?php echo isset($old['cash_payment']) && $old['cash_payment'] == 'ft'? 'checked' : ''; ?>>
                           <label class="btn btn-outline-secondary" for="ft">Fund Transfer</label> 
                      </div>
                    
                      <p class="text-danger fw-bold text-center my-2" style="font-size:15px;"> <?php echo $errors['cash_payment']??'' ?></p> 
                    
                    
                      <!-- =================== fund transfer infos ========= -->
                      <div class="mt-2 collapse" id="collapseExample6">
                      <div class="bg-transparent">
                      <div class="mb-1">
                        <input type="number" class="form-control" name="account_number" value="<?php echo $old['account_number']?? ''; ?>" id="exampleInputEmail1" placeholder="Account Number">
                      </div>
                      <p class="text-warning" style="font-size:15px"> <?php echo $errors['account_number']?? '';
                      ?> </p>
                      <div class="mb-1">
                        <input type="text" class="form-control" name="BANK_name" value="<?php echo $old['BANK_name']?? ''; ?>" id="exampleInputEmail1" placeholder="Bank Name">
                      </div>
                      <p class="text-warning" style="font-size:15px"> <?php echo $errors['BANK_name']?? '';
                      ?> </p>
                      <div class="mb-1">
                        <input type="text" class="form-control" name="swift_code" value="<?php echo $old['swift_code']?? ''; ?>" id="exampleInputEmail1" placeholder="Swift Code">
                      </div>
                      <p class="text-warning" style="font-size:15px"> <?php echo $errors['swift_code']?? '';
                      ?> </p>
                      <div class="mb-1">
                          <input type="text" class="form-control" name="branch_code" value="<?php echo $old['branch_code']?? ''; ?>" id="exampleInputEmail1" placeholder="Branch Code">
                      </div>
                      <p class="text-warning" style="font-size:15px"> <?php echo $errors['branch_code']?? '';
                      ?> </p>
                      <div class="mb-1">
                        <input type="text" class="form-control" value="<?php echo $GetCustomer['first_name'].' '.$GetCustomer['last_name']?? ''; ?>" id="exampleInputEmail1" placeholder="Account Name" readonly>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>   
                                        
             <div class="d-flex justify-content-center mt-5">
                 <button class="btn btn-dark" type="submit" name="confrm_payment">Confirm payment</button> 
             </div>        
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


