<?php 
session_start();
include('../Connection.php');

 $successMessage = '';

    if(isset($_POST['update'])){
          $userRole = $_POST['userRole'];
          $svcNo = $_POST['svcNo'];
          $rank = $_POST['rank'];
          $initials = $_POST['initials'];
          $surname = $_POST['surname'];
          $password = $_POST['password'];
          $confirmPassword = $_POST['confirmPassword'];
    
        //create a function to validate pers input
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
 //validate pers input

   $svcNo = validate($svcNo);
    $initials = validate($initials);
    $surname = validate($surname);
    $password = validate($password);
    $confirmPassword = validate($confirmPassword);
    
    
   
try{

     $updateSQL = "UPDATE users SET USER_ROLE = '$userRole', PASSWORD = '$password', 
    RANK = '$rank', INITIALS = '$initials', SURNAME = '$surname' WHERE SVC_NO = '$svcNo'";
     
    
    //Check whether record has been inserted successfully

    if ($conn->query($updateSQL) !== TRUE) {
        throw new Exception();

    } else {
        $_SESSION["success_message"] = '<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminUsers" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                USER UPDATED SUCCESSFULLY...
                </div>';
         header("Location: adminUsers");
         exit();

    }
    }catch(Exception $ex){
        echo "Error: " . $updateSQL . "<br>" . $conn->error;
    }

}




    

    //get user ID and fetch selected user's record and assign them to variables
 
    if(isset($_GET['svcNo'])){
     $svcNo = $_GET['svcNo'];
     $userSQL = "SELECT * FROM users WHERE SVC_NO = '$svcNo'";
     $userResult = mysqli_query($conn, $userSQL);

 
    while($row = mysqli_fetch_assoc($userResult)){
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>NAF_SMS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../IMAGES/logo.png" rel="icon">
  <link href="../IMAGES/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="../otherFiles/googleFonts2.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">


    <!-- other CSS Files -->
      <link rel="stylesheet" href="../CSS/styles.css">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Software Developer: Fg Offr TW Ogundeji 
  * Updated: 19 Feb 24 with Bootstrap v5.2.3
  ======================================================== -->

  <style type="text/css">
  @media (max-width: 576px) {
  .table td,
  .table th {
    font-size: 75%; /* Adjust font size for small screens */
  }
}
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="u" class="logo d-flex align-items-center">
        <img src="../IMAGES/logo.png" id="nafLogo" alt="">
        <span class="d-none d-lg-block">NAF_SMS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form method="post" action="adminNewUser" class="search-form d-flex align-items-center">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4></h4>
                <p></p>
                <p></p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4></h4>
                <p></p>
                <p></p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4></h4>
                <p></p>
                <p></p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4></h4>
                <p></p>
                <p></p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../IMAGES/logo.png" alt="" class="rounded-circle">
                <div>
                  <h4></h4>
                  <p></p>
                  <p></p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../IMAGES/logo.png" alt="" class="rounded-circle">
                <div>
                  <h4></h4>
                  <p></p>
                  <p></p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="../IMAGES/logo.png" alt="" class="rounded-circle">
                <div>
                   <h4></h4>
                  <p></p>
                  <p></p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo ($_SESSION['account']);?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo ($_SESSION['svcNo']);?></h6>
              <span><?php echo ($_SESSION['userRole']);?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="adminUserProfile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

<?php include 'adminSideNavBar.php';?>

   
<main id="main" class="main">
    <div class="pagetitle">
      <h1>EDIT USER</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Edit User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section" id="newUserSection">
      <div class="row" style="width:99%;">
           <div class="card"  style="padding:30px;">
            <div class="card-body">

               <!-- php block of code to display success, failure or error message starts here -->
                <?php if (!empty($successMessage)): ?>
              <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
              font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
                <a href="newUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                <?php echo $successMessage; ?>
              </div>
            <?php endif; ?>
              <h5 class="card-title">Edit User Form</h5>

              <!-- Multi Columns Form -->
              <form method="post" action="adminEditUser" class="row g-3">
                 <div class="col-md-6">
                  <label for="userRole" class="form-label">User Role</label>
                  <select id="userRole" name="userRole" class="form-select">
                    <option value="<?php echo $row['USER_ROLE']; ?>"><?php echo $row['USER_ROLE']; ?></option>
                    <option value="UNIT_ADMIN">UNIT_ADMIN</option>
                    <option value="UNIT_EDITOR">UNIT_EDITOR</option>
                    <option value="UNIT_VIEWER">UNIT_VIEWER</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="svcNo" class="form-label">Svc No</label>
                  <input type="text" value="<?php echo $row['SVC_NO']; ?>" name="svcNo" class="form-control" id="svcNo" placeholder="Enter svc no" readonly style="background-color:#f5f8f9;">
                </div>
                <div class="col-md-6">
                  <label for="rank" class="form-label">Rank</label>
                  <select id="rank" name="rank" class="form-select">
                     <option value="<?php echo $row['RANK']; ?>"><?php echo $row['RANK']; ?></option>
                     <option value="AVM">AVM</option>
                     <option value="AIR CDRE">AIR CDRE</option>
                     <option value="GP CAPT">GP CAPT</option>
                     <option value="WG CDR">WG CDR</option>
                     <option value="SQN LDR">SQN LDR</option>
                     <option value="FLT LT">FLT LT</option>
                     <option value="FG OFFR">FG OFFR</option>
                     <option value="PLT OFFR">PLT OFFR</option>
                     <option value="AWO">AWO</option>
                     <option value="MWO">MWO</option>
                     <option value="WO">WO</option>
                     <option value="FS">FS</option>
                     <option value="SGT">SGT</option>
                     <option value="CPL">CPL</option>
                     <option value="LCPL">LCPL</option>
                     <option value="ACM">ACM</option>
                     <option value="ACW">ACW</option>
                  </select>
                </div>
                  <div class="col-md-6">
                  <label for="initials" class="form-label">Initials</label>
                  <input type="text" value="<?php echo $row['INITIALS']; ?>" name="initials" class="form-control" id="initials" placeholder="Enter initials">
                </div>
                  <div class="col-md-6">
                  <label for="surname" class="form-label">Surname</label>
                  <input type="text" value="<?php echo $row['SURNAME']; ?>" name="surname" class="form-control" id="surname" placeholder="Enter surname">
                </div>
                <div class="col-md-6">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" value="<?php echo $row['PASSWORD']; ?>" name="password" class="form-control" id="password" placeholder="Enter password">
                </div>
                  <div class="col-md-12">
                  <label for="confirmPassword" class="form-label">Confirm Password</label>
                  <input type="password" value="<?php echo $row['PASSWORD']; ?>" name="confirmPassword" class="form-control" id="confirmPassword">
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Check me out
                    </label>
                  </div>
                </div>
                <div class="">
                  <button type="submit" name="update" class="btn btn-primary" style="border-radius:2px; width:120px; height:50px">UPDATE</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->
</body>

 <?php include 'adminFooter.php'; ?>
 <?php

}}?>