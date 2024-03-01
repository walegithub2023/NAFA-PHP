<?php
include('../connection.php');
include('../functions.php');
include 'adminHeader.php';
include 'adminSideNavBar.php';

$successMessage = '';
$failureMessage = '';
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['archive_signal'])) {
    // Process signal document form
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
                $dtg = $_POST['dtg'];
                $controlNo = $_POST['controlNo'];
                $subject = $_POST['subject'];
                $body = $_POST['body'];
                $filePath = $_POST['filePath'];


                $documentResult = null;
                
    
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



    //Create Unique document ID 
$day = date('D');
$month = date('F');
$year = date('Y');
$fmonth = substr($month, 0, 1);
$fyear = substr($year, 2, 2);
$fday = substr($day, 0, 1);
$uniq = rand();
$funiq = substr($uniq, 0, 2);
$funiq1 = substr($uniq, 0, 1);
$documentId =  'DOC'.$fmonth.$fday.$funiq1.$fyear.$funiq;




     //Insert document Data Into the Database. 
     $documentSQL = "INSERT INTO documents (DOCUMENT_ID, DOCUMENT_TYPE, SUBJECT, PRE_REF, REF_NO, POST_REF, REF, BODY, DIRECTORATE_ID, SY_CLASS, DOCUMENT_DATE, DATE_ARCHIVED, DTG, CONTROL_NO, FILE_PATH)
     VALUES ('$documentId', '$documentType', '$subject', '$preRef', '$refNo', '$postRef', '$ref', '$body', '$directorate', '$securityClass', '$documentDate', '$dateArchived', '$dtg', '$controlNo', '$filePath')";
     
     
     
     //Check whether record has been inserted successfully
    try{
            if ($conn->query($documentSQL) == TRUE) {

                $successMessage = 'DOCUMENT ARCHIVED SUCCESSFULLY...';
                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "archive";
                $description = "$userSvcNo"." "."archived a signal document with ref->$ref, document date->$documentDate and subject->$subject";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
            }else{

                   $failureMessage = 'OOPS...! DOCUMENT ARCHIVE NOT SUCCESSFUL. TRY AGAIN';
               //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed attempt";
                $description = "$userSvcNo"." "."tried to archive a signal document with ref->$ref, document date->$documentDate and subject->$subject";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
            }
        }
    catch(Exception $e)
            {   
         echo "Caught exception: " . $e->getMessage();
     
            }
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
           <div class="card"  style="padding:50px; padding-bottom:50px; padding-top:50px;">
            <div class="card-body">

        

      <!-- php block of code to display success, failure or error message starts here -->
      <?php if (!empty($successMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:10px; border-radius:2px;">
      <a href="adminArchive" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $successMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($failureMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:10px; border-radius:2px;">
      <a href="adminArchive" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $failureMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($errorMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:10px; border-radius:2px;">
      <a href="adminArchive" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $errorMessage; ?>
    </div>
  <?php endif; ?>
   <!-- php block of code to display success, failure or error message ends -->

<!-- <div  class="col-md-12">
<a href="adminArchive" type="button" style="border-radius:1px; width:100%; background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;" class="btn btn-primary">CLICK TO GO BACK...</a>
</div> -->
              
         

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