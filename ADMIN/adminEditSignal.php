<?php 
session_start();
include('../connection.php');
include('../functions.php');

$successMessage = '';


//collect inputs from user if the user clicks the update button
if(isset($_POST['update'])){
$documentId = $_POST['documentId'];
$documentType = $_POST['documentType'];
$preRef = $_POST['preRef'];
$refNo = $_POST['refNo'];
$postRef = $_POST['postRef'];
$ref = $_POST['ref'];
$directorate = $_POST['directorate'];
$securityClass = $_POST['securityClass'];
$documentDate = $_POST['documentDate'];
$dateArchived = $_POST['dateArchived'];
$dtg = $_POST['dtg'];
$controlNo = $_POST['controlNo'];
$subject = $_POST['subject'];
$body = $_POST['body'];
$filePath = $_POST['filePath'];

//initialize documentResult variable to avoid php's warning message if something goes wrong with the variable
$documentResult = null;

// Get the current time in HH:MM:SS format
$current_time = date('H:i:s');
                
    
          //create a function to validate user input
          function validate($data){
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }

          
          //validate user input
          $preRef = validate($preRef);
          $ref = validate($ref);
          $postRef = validate($postRef);
          $controlNo = validate($controlNo);
          $dtg = validate($dtg);
          $subject = validate($subject);
          $body = validate($body);


    // Check if a file was uploaded
    if (isset($_FILES['filePath']) && $_FILES['filePath']['error'] == UPLOAD_ERR_OK) {
        $tmpName = $_FILES['filePath']['tmp_name'];
        $fileName = basename($_FILES['filePath']['name']);
        $fileType = $_FILES['filePath']['type'];
        $fileSize = $_FILES['filePath']['size'];
        $fileContent = file_get_contents($tmpName);

       
        $fileName = $documentId . '_' . $fileName;

        // Store the file in a specific directory
        $uploadDir = '../uploads/';
        $uploadPath = $uploadDir . $fileName;


try{

     $updateSQL = "UPDATE documents SET DOCUMENT_TYPE = '$documentType', SUBJECT = '$subject', PRE_REF = '$preRef', 
    REF_NO = '$refNo', POST_REF = '$postRef', REF = '$ref', BODY = '$body', DIRECTORATE_ID = '$directorate', SY_CLASS = '$securityClass', DOCUMENT_DATE = '$documentDate', 
    DATE_ARCHIVED = '$dateArchived', TIME = '$current_time', DTG = '$dtg', CONTROL_NO = '$controlNo', FILE_PATH = '$uploadPath' WHERE DOCUMENT_ID = '$documentId'";
     
       // Move the uploaded file to the final location
        move_uploaded_file($tmpName, $uploadPath);
    
    //Check whether record has been inserted successfully

    if ($conn->query($updateSQL) !== TRUE) {
        throw new Exception();

    } else {

         header("Location: adminSignalSuccessMessage");

    }
    }catch(Exception $ex){
        echo "Error: " . $updateSQL . "<br>" . $conn->error;
    }

}
}
   

   //get document ID and fetch selected document's record and assign them to variables
 
    if(isset($_GET['documentId'])){
     $documentId = $_GET['documentId'];
     $documentSQL = "SELECT * FROM documents WHERE DOCUMENT_ID = '$documentId'";
     $documentResult = mysqli_query($conn, $documentSQL);


    while($row = mysqli_fetch_assoc($documentResult)){
 
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
      <h1>EDIT SIGNAL</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Edit Signal Dc</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->


             

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-top:40px; padding-bottom:20px;">
            <div class="card-body">
             <h4 class="card-title" style="padding-left:70px;">EDIT SIGNAL FORM</h4>

             <!--  signal document form starts --> 
                    <!-- Multi Columns Form -->
              <form method="post" action="adminEditSignal" enctype="multipart/form-data" class="row g-3" style="padding-left:70px; padding-right:70px; padding-top:20px; padding-bottom:20px;">
               <div class="col-md-2">
                  <label for="documentType" class="form-label">TYPE:</label>
                  <select id="documentType" name="documentType" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $row['DOCUMENT_TYPE'];?>"><?php echo $row['DOCUMENT_TYPE'];?></option>
                  </select>
                </div>
                  <div class="col-md-2">
                  <label for="preRef" class="form-label">PRE-REF:</label>
                  <input type="text" value="<?php echo $row['PRE_REF'];?>" name="preRef" class="form-control" id="preRef" placeholder="pre-ref" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-2">
                  <label for="refNo" class="form-label">REF NO:</label>
                   <select id="refNo" name="refNo" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $row['PRE_REF'];?>"><?php echo $row['PRE_REF'];?></option>
                        <option value="321">321</option>
                        <option value="530">530</option>
                        <option value="531">531</option>
                  </select>
                </div>
                 <div class="col-md-2">
                  <label for="postRef" class="form-label">POST-REF:</label>
                  <input type="text" value="<?php echo $row['POST_REF'];?>" name="postRef" class="form-control" id="postRef" placeholder="post-ref" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-2">
                  <label for="ref" class="form-label">REF:</label>
                  <input type="text" value="<?php echo $row['REF'];?>" name="ref" class="form-control" id="ref" placeholder="ref" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-2">
                  <label for="documentDate" class="form-label">DOC  DATE:</label>
                  <input type="date" value="<?php echo $row['DOCUMENT_DATE'];?>" name="documentDate" class="form-control" id="documentDate" placeholder="" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-2">
                  <label for="securityClass" class="form-label">SY CLASS:</label>
                   <select id="securityClass" name="securityClass" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $row['SY_CLASS'];?>"><?php echo $row['SY_CLASS'];?></option>
                        <option value="TOP SECRET">Top Secret</option>
                         <option value="SECRET">Secret</option>
                          <option value="CONFIDENTIAL">Confidential</option>
                           <option value="RESTRICTED">Restricted</option>
                  </select>
                  </div>
                  <div class="col-md-2">
                  <label for="dtg" class="form-label">DTG:</label>
                  <input type="text" value="<?php echo $row['DTG'];?>" name="dtg" class="form-control" id="dtg" placeholder="Enter dtg" style="border-radius:2px;" required>
                </div>
                <div class="col-md-2">
                  <label for="directorate" class="form-label">DIR:</label>
                   <select id="directorate" name="directorate" class="form-select" style="border-radius:2px;" required>
                        <option value="<?php echo $row['DIRECTORATE_ID'];?>"><?php echo $row['DIRECTORATE_ID'];?></option>
                        <option value="DIT">DIT</option>
                  </select>
                  </div>
                <div class="col-md-2">
                  <label for="controlNo" class="form-label">CONTROL:</label>
                  <input type="text" value="<?php echo $row['CONTROL_NO'];?>" name="controlNo" class="form-control" id="controlNo" placeholder="control no" style="border-radius:2px;" required>
                </div>
                <div class="col-md-2">
                  <label for="dateArchived" class="form-label">DATE:</label>
                  <input type="date" value="<?php echo $row['DATE_ARCHIVED'];?>" name="dateArchived" class="form-control" id="dateArchived" placeholder="" style="border-radius:2px;" required>
                </div>
                <div class="col-md-2">
                  <label for="filePath" class="form-label">UPLOAD:</label>
                   <input type="file" name="filePath" class="form-control" id="filePath" placeholder="choose" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="subject" class="form-label">SUBJECT</label>
                  <input type="text" value="<?php echo $row['SUBJECT'];?>" name="subject" class="form-control" id="subject" placeholder="Enter subject" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="body" class="form-label">BODY</label>
                  <input type="text" value="<?php echo $row['BODY'];?>" name="body" class="form-control" id="body" placeholder="Enter body" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="documentId" class="form-label"></label>
                  <input type="hidden" value="<?php echo $row['DOCUMENT_ID'];?>" name="documentId" class="form-control" id="documentId" placeholder="" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12">
                      <button type="submit" name="update" style="border-radius:1px;" class="btn btn-primary">UPDATE</button>
                 </div>
               </form>
              <!-- End Multi Columns Form -->

              <!-- signal document form ends -->
             
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
</body>

 <?php include 'adminFooter.php'; ?>
 <?php
}}
?>