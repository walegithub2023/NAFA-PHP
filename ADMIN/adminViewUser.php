<?php 

include('../Connection.php');
include('../functions.php');
include 'adminHeader.php';
include 'adminSideNavBar.php';


    //get user ID and fetch selected user's record and assign them to variables
 
    if(isset($_GET['svcNo'])){
     $svcNo = $_GET['svcNo'];
     $userSQL = "SELECT * FROM users WHERE SVC_NO = '$svcNo'";
     $userResult = mysqli_query($conn, $userSQL);

 
    while($row = mysqli_fetch_assoc($userResult)){

 
      //Collect User Data From Signup Form Inputs
 
     //Collect User Data From Signup Form Inputs

 
 
?>

   
<main id="main" class="main">
    <div class="pagetitle">
      <h1><?php echo ($_SESSION['svcNo']);?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">View User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


              <!-- Multi Columns Form -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-left:50px; padding-right:50px;">
            <div class="card-body">
              <h5 class="card-title"><?php echo ($_SESSION['svcNo']);?></h5>
            
              <!-- Table with stripped rows -->
              <table class="table table-striped" style="text-transform:uppercase;"> 
                <thead>
             
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>ROLE:</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $row['USER_ROLE']; ?></td>
                  </tr>
                  <tr>
                     <th scope="row">2</th>
                    <td>ACCOUNT:</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $row['ACCOUNT']; ?></td>
                 </tr>
                  <tr>
                     <th scope="row">3</th>
                    <td>SVC NO:</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $row['SVC_NO']; ?></td>
                 </tr>
                 <tr>
                     <th scope="row">4</th>
                    <td>RANK:</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $row['RANK']; ?></td>
                 </tr>
                   <tr>
                     <th scope="row">5</th>
                    <td>INITIALS:</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $row['INITIALS']; ?></td>
                 </tr>
                   <tr>
                     <th scope="row">6</th>
                    <td>SURNAME:</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $row['SURNAME']; ?></td>
                 </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <a href="adminUsers" type="button" name="update" class="btn btn-primary" style="border-radius:2px; width:120px; height:45px; margin-top:10px;">BACK</a>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'adminFooter.php'; ?>
 <?php

 //declare or prepare variables for log_event function
$userSvcNo = $_SESSION['svcNo'];
$action = "view";
$description = "$userSvcNo"." "."viewed user ($svcNo) record";
$account = $_SESSION['account'];

 //call the log_event function
log_event($conn, $userSvcNo, $action, $description, $account);

}}?>