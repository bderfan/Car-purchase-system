<?php
 include('header.php');
?>
  <main>
    <section id="Welcome">
      <h1 class="text-black text-center fw-900 pt-5">Car Purchase System</h1>
      <div class="welcome py-3">
         <div class="container">
           <div class="row">
             <div class="col-sm-9 col-md-7 col-lg-5 col-2 mx-auto welcome">
                  <div class="p-2 mx-auto d-flex justify-content-center" style="border: 10px solid #000; border-radius:50%; width:370px;">
                    <img src="images/car.jpg" alt="car" style="width:500px; clip-path: circle();">  
                  </div>  
             </div>
             <div class="col-12 mx-auto">
                 <a href="Users.php" class="mt-5 d-flex justify-content-center"><button type="button" class="btn btn-lg">Welcome</button></a>  
             </div>
           </div>  
         </div> 
      </div>
    </section>  
  </main>
 
<?php
  include('footer.php');
?>