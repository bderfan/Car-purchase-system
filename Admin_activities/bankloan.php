<?php
 include('header.php');

 require('../classes/Customerclass.php');

 $customer = new Customerclass;

 $rows = $customer->index();


?>


  <main>
    <section id="Admin" style="background-color:#F2A938;"> 
       <div class="py-2 px-2">
        <a href="Paymentmethod.php"><button type="button" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:25px;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>
        </button></a>  
      </div>
      <div class="welcome py-5">
         <div class="container">
           <div class="row">
            
             <div class="col-12">
                <h1 class="text-black text-center fw-700">Bank Loan</h1>
                <h3 class="text-black text-center fw-700">Select Customer Profession</h3>
             </div>
            
               <div class="d-flex justify-content-center mt-2">
                  <a href="../Admin_activities/officer.php"><button class="btn btn-light me-2">Officer</button></a>
               </div>
               <div class="d-flex justify-content-center mt-2">
                  <a href="../Admin_activities/businessman.php"><button class="btn btn-dark me-2">Businessman</button></a>
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