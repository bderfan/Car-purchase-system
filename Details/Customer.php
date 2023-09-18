<?php

 include('header.php');
 
 include('../classes/Homeclass.php');

 $home = new Homeclass;

 $old = $_POST;

 $GetCustomer = $home->GetCustomer($_GET['email']);

 $getCar = $home->get_Selectedcar($_GET['car_id']);

 if(isset($_POST['save_customer_data'])){
     
     $customer_data = $home->Customerdata($_GET['id'],$_GET['email']);

  }

 
 
?>

<main>
 <!-- Car selection part -->
 <section id="Select_car" style="background-color:#3c4257;">
     <a href="Customerprofile.php" class="d-flex justify-content-end py-3 px-2"><button type="button" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i></button></a>
    <div class="container">
      <div class="row py-3">
       
        <h1 class="text-center text-white">Payment page</h1>    
        <div class="col-6 mx-auto">
           <form method="post">
           <div class="border border-light border-4 my-5 px-4">
                 <h3 class="text-center text-white my-2 fw-bold">Customer Information</h3>
               
                 <div class="mb-3">
                   <input type="text" class="form-control" name="first_name" value="<?php echo $old['first_name']??$GetCustomer['first_name']?? ''; ?>" id="exampleInputPassword1" placeholder="First name">
                 </div>
                 
                 <div class="mb-3">
                   <input type="text" class="form-control" name="last_name" value="<?php echo $old['last_name']??$GetCustomer['last_name']?? ''; ?>" id="exampleInputPassword1" placeholder="Last name">
                 </div>
               
                 <div class="mb-3">
                   <input type="text" class="form-control" name="phone_no" value="<?php echo $old['phone_no']??$GetCustomer['phone_number']?? ''; ?>" id="exampleInputPassword1" placeholder="Phone No.">
                 </div>
                
                 <div class="mb-3">
                   <input type="text" class="form-control" name="address" value="<?php echo $old['address']??$GetCustomer['address']?? ''; ?>" id="exampleInputPassword1" placeholder="Address">
                 </div>
               
               
                 <div class="d-flex justify-content-center my-3">
                   <button type="submit" name="save_customer_data" class="btn btn-success">Save</button>
                 </div>
             </div>  
             </form>   
              <div class="d-flex justify-content-center mt-3">
                   <a href="Payment.php?email=<?php echo $GetCustomer['email']; ?>&car_id=<?php echo $getCar['id']; ?>" class="btn btn-warning">Go to payment method</a>
               </div>
        </div>
            
      </div>
    </div>
 </section>
</main>


<?php
  include('footer.php');
?>


