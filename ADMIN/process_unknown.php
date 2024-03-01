<?php
include('../connection.php');
include('../functions.php');
include 'adminHeader.php';
include 'adminSideNavBar.php';

$successMessage = '';
$failureMessage = '';
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['archive_unknown'])) {
    // Process signal document form
    // Retrieve form data using $_POST
    // Perform necessary actions
    // Redirect to appropriate page
}
?>
<main id="main" class="main">
 <!--    <div class="pagetitle">
      <h1>ARCHIVE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Archive</li>
        </ol>
      </nav>
    </div> -->
    <!-- End Page Title -->
    <section class="section" id="newUserSection">
      <div class="row" style="padding-right:10px;">
           <div class="card"  style="padding:50px; padding-top:20px;">
            <div class="card-body">

        

      <!-- php block of code to display success, failure or error message starts here -->
      <?php if (!empty($successMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $successMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($failureMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $failureMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($errorMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $errorMessage; ?>
    </div>
  <?php endif; ?>
   <!-- php block of code to display success, failure or error message ends -->


              
         

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->
<?php 
include 'adminFooter.php'; 

/*  //declare or prepare variables for log_event function
$userSvcNo = $_SESSION['svcNo'];
$action = "visit";
$description = "$userSvcNo"." "."visited the adminUsers page";
$account = $_SESSION['account'];

 //call the log_event function
log_event($conn, $userSvcNo, $action, $description, $account); */

?>