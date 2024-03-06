<?php 
include 'adminHeader.php';
include('../Connection.php');
include 'adminSideNavBar.php';
include('../functions.php');


$svcNo = $_SESSION['svcNo'];

  $userSQL = "SELECT * FROM users WHERE SVC_NO = '$svcNo'";
  $userResult = mysqli_query($conn, $userSQL);

 
    while($row = mysqli_fetch_assoc($userResult)){
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


       <?php

                    // Check if a success message is set in the session
                    if (isset($_SESSION['successMessageForPasswordChange'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForPasswordChange'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForPasswordChange']);
            }
           
    ?>


    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card" style="border-radius:1px;">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../IMAGES/passportIcon.png" alt="Profile" class="rounded-circle" style="padding:10px; border:1px solid #6c757d;">
             <h2><?php echo ($_SESSION['svcNo']);?></h2>
              <h3><?php echo ($_SESSION['initials']);?><?php echo" ";?><?php echo ($_SESSION['surname']);?></h3>
               <h3><?php echo ($_SESSION['userRole']);?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card" style="border-radius:1px;">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Surname:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["SURNAME"];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Initials:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["INITIALS"];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Rank:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["RANK"];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Account:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["ACCOUNT"];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">User Role:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row["USER_ROLE"];?></div>
                  </div>
                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password" style="padding-bottom:30px;">
                  <!-- Change Password Form -->
                  <form method="post" action="adminUserProfile">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" style="border-radius:1px;" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" style="border-radius:1px;" class="form-control" id="newpassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirm New</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" style="border-radius:1px;" class="form-control" id="renewpassword">
                      </div>
                    </div>

                    <input name="hiddenPassword" type="hidden"  value="<?php echo $row["PASSWORD"];?>" style="border-radius:1px;" class="form-control" id="hiddenPassword">

                    <div class="">
                      <button type="submit" name="change_password" class="btn btn-primary" style="border-radius:1px; margin-top:20px;">Change Password</button>
                    </div>
                  </form>
                  <!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

   <?php
if(isset($_POST["change_password"])){
$password = $_POST["password"];
$newpassword = $_POST["newpassword"];
$renewpassword = $_POST["renewpassword"];


    //create a function to validate pers input
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
 //validate user's password input
   $newpassword = validate($newpassword);

if($row["PASSWORD"] == $password){

 if($newpassword == $renewpassword){
  

   try{

     $updateSQL = "UPDATE users SET PASSWORD = '$newpassword' WHERE SVC_NO = '$svcNo'";
     
    
    //Check whether record has been updated successfully

    if ($conn->query($updateSQL) !== TRUE) {
        throw new Exception();

    } else {
        echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminUserProfile" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                USER PASSWORD CHANGED SUCCESSFULLY...
                </div>';
         //declare or prepare variables for log_event function
        $userSvcNo = $_SESSION['svcNo'];
        $action = "password change";
        $description = "$userSvcNo"." "."changed his/her password";
        $account = $_SESSION['account'];

        //call the log_event function
        log_event($conn, $userSvcNo, $action, $description, $account);
         exit();

    }
    }catch(Exception $ex){
        echo "Error: " . $updateSQL . "<br>" . $conn->error;
    }
  }else{
    echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminUserProfile" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                PASSWORD MISMATCH. YOUR NEW PASSWORD IS NOT THE SAME WITH YOUR CONFIRM PASSWORD.
                </div>';
  }
}else{
   echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminUserProfile" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                THE USER PASSWORD YOU ENTERED IS NOT CORRECT.
                </div>';
}
}
}
?>
  <?php include 'adminFooter.php'; ?>
