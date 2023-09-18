<?php
 include('header.php');

 require('../classes/Customerclass.php');

 $customer = new Customerclass;

 $rows = $customer->index();


?>


  <main>
    <section id="Admin" style="background-color:#d10026;"> 
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
                <h1 class="text-white text-center fw-700">Payment Informations</h1>
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
             </div>
               <div class="d-flex justify-content-center mt-2">
                  <a href="../Admin_activities/Customerinfo.php"><button class="btn btn-light me-2">Customer informations</button></a>
               </div>
               <div class="d-flex justify-content-center mt-2">
                  <a href="../Admin_activities/Paymentmethod.php"><button class="btn btn-warning">Payment methods</button></a>
               </div>
               <form class="d-flex justify-content-center mt-5" method="post">
                     <button type="submit" name="logout" class="btn btn-dark">Logout</button>
               </form>
           </div>  
         </div> 
    </section>  
  </main>
 


<?php
  include('footer.php');
?>