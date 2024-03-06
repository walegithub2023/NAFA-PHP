<?php 
include('../Connection.php');
include('../functions.php');
include 'adminHeader.php';
include 'adminSideNavBar.php';


 $successMessage = '';
  $failureMessage = '';
  $errorMessage = '';

     //Collect directorate Data from inputs

     if(isset($_POST['add'])){
          $directorateCode = $_POST['directorateCode'];
          $directorate = $_POST['directorate'];
          $branchCode = $_POST['branchCode'];
          $remark = $_POST['remark'];
      
      
          //create a function to validate directorate input
          function validate($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }

          
    //validate directorate input
    $directorateCode = validate($directorateCode);
    $directorate = validate($directorate);
    $remark = validate($remark);



     //Insert directorate Data Into the Database.
     $directorateSQL = "INSERT INTO directorates (DIRECTORATE_CODE, DIRECTORATE, BRANCH_CODE, REMARK)
     VALUES ('$directorateCode', '$directorate', '$branchCode', '$remark')";
     
     
     
     //Check whether record has been inserted successfully
    try{
            if ($conn->query($directorateSQL) !== TRUE) {
                throw new Exception();
            }else{
                $successMessage = 'SUCCESS! NEW DIRECTORATE CREATED SUCCESSFULLY...';
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "create";
                $description = "$userSvcNo"." "."created a directorate named $directorateCode";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
            }
        }
    catch(Exception $ex)
            {   
               $failureMessage = 'OOPS...! DIRECTORATE ALREADY EXISTS. ENTER A DIFFERENT DIRECTORATE CODE.';
               //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried creating a directorate named $directorateCode. The directorate already existed";
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
      <h1>NEW DIRECTORATE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">New Directorate</li>
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
      <a href="adminNewDirectorate" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $successMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($failureMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewDirectorate" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $failureMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($errorMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewDirectorate" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $errorMessage; ?>
    </div>
  <?php endif; ?>
   <!-- php block of code to display success, failure or error message ends -->
   
              <h5 class="card-title">New Directorate Form</h5>

              <!-- Multi Columns Form -->
              <form method="post" action="adminNewDirectorate" class="row g-3">
                <div class="col-md-3">
                  <label for="directorateCode" class="form-label">Directorate Code</label>
                  <input type="text" style="border-radius:1px;" name="directorateCode" class="form-control" id="directorateCode" placeholder="Enter Code" required>
                </div>
                <div class="col-md-3">
                  <label for="directorate" class="form-label">Directorate</label>
                  <input type="text" style="border-radius:1px;" name="directorate" class="form-control" id="directorate" placeholder="Enter Directorate" required>
                </div>
                 <div class="col-md-3">
                  <label for="branchCode" class="form-label">Branch Code</label>
                  <select id="branchCode" style="border-radius:1px;" name="branchCode" class="form-select" required>
                    <option value="">..select..</option>
                    <?php 
                        $branchSQL = "SELECT * FROM branches";
                        $brancheResult = mysqli_query($conn, $branchSQL);
                        $totalRecords = mysqli_num_rows($brancheResult);  
                    
                          while($branchFetch=mysqli_fetch_assoc($brancheResult))
                        {
                    ?>
                        <option value="<?php echo $branchFetch['BRANCH_CODE'];?>"><?php echo $branchFetch['BRANCH_CODE'];?></option>
                        <?php
            
                        }
                    ?>
                  </select>
                </div>
                <div class="col-md-3">
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
