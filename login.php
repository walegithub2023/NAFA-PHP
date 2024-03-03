<?php
session_start();
include('Connection.php');
include('functions.php');

  $errorMessage = '';

// Validate user input
if(isset($_POST['login'])) {
    $svcNo = validate($_POST['svcNo']);
    $loginPassword = validate($_POST['loginPassword']);

    // Select, query, and fetch records from the database, and compare with user's username and password
    $loginSQL = "SELECT * FROM users WHERE SVC_NO='$svcNo' && PASSWORD='$loginPassword'";
    $loginResult = mysqli_query($conn, $loginSQL);

    while($loginFetch = mysqli_fetch_array($loginResult)) {
        if($loginFetch['SVC_NO'] === $svcNo && $loginFetch['PASSWORD'] === $loginPassword) {
            // Set session variables
            $_SESSION['svcNo'] = $loginFetch['SVC_NO'];
            $_SESSION['password'] = $loginFetch['PASSWORD'];
            $_SESSION['account'] = $loginFetch['ACCOUNT'];
            $_SESSION['userRole'] = $loginFetch['USER_ROLE'];
            $_SESSION['rank'] = $loginFetch['RANK'];
            $_SESSION['initials'] = $loginFetch['INITIALS'];
            $_SESSION['surname'] = $loginFetch['SURNAME'];

              //declare or prepare variables for log_event function
              $svcNo = $_SESSION['svcNo'];
              $action = "Login";
              $description = "$svcNo"." "."Logged in";
              $account = $_SESSION['account'];

            // Redirect to the appropriate page based on user role
             if($loginFetch['USER_ROLE'] === "ADMIN") {
               //call the log_event function
              log_event($conn, $svcNo, $action, $description, $account);
              //redirect user to adminHome page  
              header("Location: ADMIN/adminHome");
                exit();
            }
            else if($loginFetch['USER_ROLE'] === "EDITOR") {
               //call the log_event function
             log_event($conn, $svcNo, $action, $description, $account);
              //redirect user to unitViewerHome page 
                header("Location: EDITOR/editorHome");
                exit();
            }
        } else {
            $error_message = 'Oops! Sorry, Your svc number or Password is Invalid. Please Try Again.';
        }
    }
}

// Function to validate input
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
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
  <link href="IMAGES/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="../otherFiles/googleFonts2.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- other CSS Files -->
      <link href="CSS/styles.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Software Developer: Fg Offr TW Ogundeji 
  * Updated: 19 Feb 24 with Bootstrap v5.2.3
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container-fluid" id="containerDiv" 
    style="
    background-image: url('IMAGES/img1.jpg'); 
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    width: 100%;
    zIndex:-1;
    ">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="login" class="logo d-flex align-items-center w-auto" style="margin-left:-27px;">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NAFA</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                   <!-- Display the error message if the login attempt fails -->
  <?php if (!empty($errorMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="unitAdminNewUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $errorMessage; ?>
    </div>
  <?php endif; ?>
   <!-- error message ends -->
   

                  <form method="post" action="login" class="row g-3 needs-validation">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Svc no</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="svcNo" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="loginPassword" class="form-control" id="yourPassword"  required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button style="border-radius:3px;" class="btn btn-primary w-100" type="submit" name="login">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="login">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="login">NAF Alpha Dev</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</body>

</html>