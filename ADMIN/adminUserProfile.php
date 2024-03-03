<?php 
include 'adminHeader.php';
include('../Connection.php');
include 'adminSideNavBar.php';

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
                    if (isset($_SESSION['success_message'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['success_message'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['success_message']);
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
                        <input name="newpassword" type="password" style="border-radius:1px;" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" style="border-radius:1px;" class="form-control" id="renewPassword">
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
  <?php include 'adminFooter.php'; ?>
   <?php

}?>
