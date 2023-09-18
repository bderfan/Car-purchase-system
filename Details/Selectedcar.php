<?php

 include('header.php');
 
 require_once('../classes/Homeclass.php');
 $home = new Homeclass;

 $Select_car = $home->Getselectedcar($_GET['id']);

 $Select_customer_email = $home->GetCustomer($_GET['email']);

 $get_car = $home->get_Selectedcar($_GET['car_id']);

?>

<main>
 <!-- Car selection part -->
 <section id="Select_car" style="background-color:#3c4257;">
     <a href="Customerprofile.php" class="d-flex justify-content-end py-3 px-2"><button type="button" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i></button></a>
    <div class="container">
      <div class="row py-3">
        <?php 
          if($Select_car->num_rows == 1){
              while($Select = $Select_car->fetch_assoc()){
        ?>
           <div class="col-12">
             <img src="../images/car_img/<?php echo $Select['image']; ?>" alt="<?php echo $Select['car_name']; ?>" class="w-100" style="height:600px;">
           </div>
           <div class="col-6 mx-auto text-left mt-5 bg-white p-5 rounded">
               <h1 class="text-danger"><span class="fw-bold">Name:</span> <?php echo $Select['car_name']; ?></h1>
               <h2 class="text-warning mt-3"><span class="fw-bold">Price:</span> <?php echo $Select['price']; ?></h2>
               <h4 class="text-black mt-2"><span class="fw-bold">Details:</span> <?php echo $Select['details']; ?></h4>
               <div class="d-flex justify-content-center mt-3">
                   <a href="Customer.php?id=<?php echo $Select['id']; ?>&email=<?php echo $Select_customer_email['email']; ?>&car_id=<?php echo $get_car['id']; ?>" class="btn btn-warning">Go to payment process</a>
               </div>
           </div>
        <?php
              }
          }  
        ?>
      </div>
    </div>
 </section>
</main>


<?php
  include('footer.php');
?>


