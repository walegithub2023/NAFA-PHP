<?php
session_start();
include('../connection.php');
include('../functions.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['archive_others'])) {
    // Process document form
    // Retrieve form data using $_POST
    // Perform necessary actions
    // Redirect to appropriate page



$documentType = $_POST['documentType'];
$preRef = $_POST['preRef'];
$refNo = $_POST['refNo'];
$postRef = $_POST['postRef'];
$ref = $_POST['ref'];
$directorate = $_POST['directorate'];
$securityClass = $_POST['securityClass'];
$documentDate = $_POST['documentDate'];
$dateArchived = $_POST['dateArchived'];
$dtg = "NIL";
$controlNo = "NIL";
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
          $subject = validate($subject);
          $body = validate($body);



//Create Unique document ID 
$documentId =  uniqid();




    // Check if a file was uploaded
    if (isset($_FILES['filePath']) && $_FILES['filePath']['error'] == UPLOAD_ERR_OK) {
        $tmpName = $_FILES['filePath']['tmp_name'];
        $fileName = basename($_FILES['filePath']['name']);
        $fileType = $_FILES['filePath']['type'];
        $fileSize = $_FILES['filePath']['size'];
        $fileContent = file_get_contents($tmpName);

        // Generate a unique identifier for the filename in order to avoid document override by documents with the same name
        $uniqueId = uniqid();
        $fileName = $uniqueId . '_' . $fileName;

        // Store the file in a specific directory
        $uploadDir = '../uploads/';
        $uploadPath = $uploadDir . $fileName;



     //Insert document Data Into the Database. 
     $documentSQL = "INSERT INTO documents (DOCUMENT_ID, DOCUMENT_TYPE, SUBJECT, PRE_REF, REF_NO, POST_REF, REF, BODY, DIRECTORATE_ID, SY_CLASS, DOCUMENT_DATE, DATE_ARCHIVED, DTG, CONTROL_NO, TIME, FILE_PATH)
     VALUES ('$documentId', '$documentType', '$subject', '$preRef', '$refNo', '$postRef', '$ref', '$body', '$directorate', '$securityClass', '$documentDate', '$dateArchived', '$dtg', '$controlNo', '$current_time', '$uploadPath')";
     
     
       // Move the uploaded file to the final location
        move_uploaded_file($tmpName, $uploadPath);


     //Check whether record has been inserted successfully
    try{
            if ($conn->query($documentSQL) == TRUE) {

                $_SESSION["successMessageForOtherDocuments"] = '<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminArchive" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                DOCUMENT ARCHIVED SUCCESSFULLY......
                </div>';
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "archive";
                $description = "$userSvcNo"." "."archived a $documentType document with ref->$ref, document date->$documentDate and subject->$subject";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: adminArchive");
                exit();
            }else{

                $_SESSION["failureMessageForOtherDocuments"] = '<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminArchive" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                OOPS...! DOCUMENT ARCHIVE NOT SUCCESSFUL. TRY AGAIN
                </div>';
               //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried to archive a $documentType document with ref->$ref, document date->$documentDate and subject->$subject";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: adminArchive");
                exit();
            }
        }
    catch(Exception $e)
            {   
         echo "Caught exception: " . $e->getMessage();
     
            }
}else{

                $_SESSION["errorMessageForOtherDocuments"] = '<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminArchive" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                OOPS...! Error: No file uploaded or an error occurred.
                </div>';
               //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried to archive a $documentType document with ref->$ref, document date->$documentDate and subject->$subject";
                $account = $_SESSION['account'];
                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
                header("Location: adminArchive");
                exit();
}
}
?>
<main id="main" class="main"
 style="
    margin-top:-10px;
    background-image: url('../IMAGES/img1.jpg'); 
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    zIndex:-1;
    "
>
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
    <section class="section" id="newUserSection" style="margin-top:70px;">
      <div class="row" style="padding-right:10px;">
           <div class="card"  style="padding-bottom:50px; padding-top:50px; border-radius:1px;">
            <div class="card-body">

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->
  </body>
<?php 

?>