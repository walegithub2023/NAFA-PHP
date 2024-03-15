
<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['account']=='ADMIN') {

?>
<?php include 'adminHeader.php'; ?>
<?php include 'adminSideNavBar.php'; ?>

<main id="main" class="main"
 style="
    background-image: url('../IMAGES/img1.jpg'); 
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    zIndex:-1;
    "
>
      <div class="row" id="text404div">
        <p id="text404">404</p>
      </div>
      <div class="row" id="errorTextDiv">
       <p id="errorText">The page you are looking for doesn't exist.</p>
      </div>

  </main><!-- End #main -->
  <?php include 'adminFooter.php'; ?>
  <?php 
}else{
    header("Location: login");
    exit();
}
  ?>
