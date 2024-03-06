<?php 
include('../Connection.php');
include('../functions.php');
include 'adminHeader.php';
include 'adminSideNavBar.php';


 $successMessage = '';
  $failureMessage = '';
  $errorMessage = '';

     //Collect branch Data from inputs

     if(isset($_POST['add'])){
          $branchCode = $_POST['branchCode'];
          $branch = $_POST['branch'];
          $remark = $_POST['remark'];
      
      
          //create a function to validate branch input
          function validate($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }

          
    //validate branch input
    $branchCode = validate($branchCode);
    $branch = validate($branch);
    $remark = validate($remark);



     //Insert branch Data Into the Database.
     $branchSQL = "INSERT INTO branches (BRANCH_CODE, BRANCH, REMARK)
     VALUES ('$branchCode', '$branch', '$remark')";
     
     
     
     //Check whether record has been inserted successfully
    try{
            if ($conn->query($branchSQL) !== TRUE) {
                throw new Exception();
            }else{
                $successMessage = 'SUCCESS! NEW BRANCH CREATED SUCCESSFULLY...';
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "create";
                $description = "$userSvcNo"." "."created a branch with code -> $branchCode";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
            }
        }
    catch(Exception $ex)
            {   
               $failureMessage = 'OOPS...! BRANCH ALREADY EXISTS. ENTER A DIFFERENT BRANCH CODE.';
               //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating a branch with code -> $branchCode. The branch already existed";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
     
            }
}
?>

<main id="main" class="main"
   style="
    background-image: url('../IMAGES/img1.jpg'); 
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    zIndex:-1;
    "
>
    <div class="pagetitle">
      <h1>NEW BRANCH</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">New Branch</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section" id="newUserSection">
      <div class="row">
           <div class="card"  style="padding:30px; border-radius:1px;">
            <div class="card-body">

          
              <!-- php block of code to display success, failure or error message starts here -->
      <?php if (!empty($successMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewBranch" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $successMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($failureMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewBranch" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $failureMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($errorMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewBranch" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $errorMessage; ?>
    </div>
  <?php endif; ?>
   <!-- php block of code to display success, failure or error message ends -->
   
              <h5 class="card-title">New Branch Form</h5>

              <!-- Multi Columns Form -->
              <form method="post" action="adminNewBranch" class="row g-3">
                <div class="col-md-4">
                  <label for="branchCode" class="form-label">Branch Code</label>
                  <input type="text" style="border-radius:1px;" name="branchCode" class="form-control" id="branchCode" placeholder="Enter Code" required>
                </div>
                <div class="col-md-4">
                  <label for="branch" class="form-label">Branch</label>
                  <input type="text" style="border-radius:1px;" name="branch" class="form-control" id="branch" placeholder="Enter Branch" required>
                </div>
                <div class="col-md-4">
                  <label for="remark" class="form-label">Remark</label>
                  <input type="text" style="border-radius:1px;" name="remark" class="form-control" id="remark" placeholder="Enter Remark">
                </div>
                <div class="col-md-12">
                  <button type="submit" style="border-radius:1px;" name="add" class="btn btn-primary" style="border-radius:2px; width:120px; height:50px">CREATE</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'adminFooter.php'; ?>
