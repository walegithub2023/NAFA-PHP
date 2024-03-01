<?php 
include('../Connection.php');
include('../functions.php');
include 'adminHeader.php';
include 'adminSideNavBar.php';


 $successMessage = '';
  $failureMessage = '';
  $errorMessage = '';

     //Collect User Data from inputs

     if(isset($_POST['retrieve'])){
      
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
    catch(Exception $ex)
            {   
         echo "Caught exception: " . $e->getMessage();
     
            }
  }
?>

<main id="main" class="main">
    <div class="pagetitle">
      <h1>ARCHIVE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Archive</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    <section class="section" id="newUserSection">
      <div class="row" style="padding-right:10px;">
           <div class="card"  style="padding:50px; padding-top:20px;">
            <div class="card-body">

      <!-- php block of code to display success, failure or error message starts here -->
      <?php if (!empty($successMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $successMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($failureMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $failureMessage; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($errorMessage)): ?>
    <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
    font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
      <a href="adminNewUser" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
      font-family:Arial; text-decoration:none; padding:0px">&times;</a>
      <?php echo $errorMessage; ?>
    </div>
  <?php endif; ?>
   <!-- php block of code to display success, failure or error message ends -->
   
              <h5 class="card-title">Signal Form</h5>

              <!-- Multi Columns Form -->
              <form method="post" action="adminArchiveSignal" class="row g-3">
               <div class="col-md-3">
                  <label for="documentType" class="form-label">TYPE:</label>
                  <select id="documentType" name="documentType" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="Signal">Signal</option>
                        <option value="Loose Minute">Loose Minute</option>
                        <option value="Letter">Letter</option>
                        <option value="Memo">Memo</option>
                        <option value="Minutes of Meeting">Minutes of Meeting</option>
                        <option value="Electronic Short Msg">Electronic Short Msg</option>
                        <option value="Admin Orders">Admin Orders</option>
                        <option value="Instr for Tac Ex">Instr for Tac Ex</option>
                        <option value="Confirmatory Notes">Confirmatory Notes</option>
                        <option value="Extimate Process">Extimate Process</option>
                        <option value="Annexs & Appendices">Annexs & Appendices</option>
                        <option value="Float">Float</option>
                  </select>
                </div>
                  <div class="col-md-3">
                  <label for="preRef" class="form-label">PRE-REF:</label>
                  <input type="text" name="preRef" class="form-control" id="preRef" placeholder="pre-ref" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="refNo" class="form-label">REF NO:</label>
                   <select id="refNo" name="refNo" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="321">321</option>
                        <option value="530">530</option>
                        <option value="531">531</option>
                  </select>
                </div>
                 <div class="col-md-3">
                  <label for="postRef" class="form-label">POST-REF:</label>
                  <input type="text" name="postRef" class="form-control" id="postRef" placeholder="post-ref" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="ref" class="form-label">REF:</label>
                  <input type="text" name="ref" class="form-control" id="ref" placeholder="ref" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="documentDate" class="form-label">DOC  DATE:</label>
                  <input type="date" name="documentDate" class="form-control" id="documentDate" placeholder="" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-3">
                  <label for="securityClass" class="form-label">SY CLASS:</label>
                   <select id="securityClass" name="securityClass" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="TOP SECRET">Top Secret</option>
                         <option value="SECRET">Secret</option>
                          <option value="CONFIDENTIAL">Confidential</option>
                           <option value="RESTRICTED">Restricted</option>
                  </select>
                  </div>
                  <div class="col-md-3">
                  <label for="dtg" class="form-label">DTG:</label>
                  <input type="text" name="dtg" class="form-control" id="dtg" placeholder="Enter dtg" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="directorate" class="form-label">DIR:</label>
                   <select id="directorate" name="directorate" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="">DIT</option>
                  </select>
                  </div>
                <div class="col-md-3">
                  <label for="controlNo" class="form-label">CONTROL:</label>
                  <input type="text" name="controlNo" class="form-control" id="controlNo" placeholder="control no" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="dateArchived" class="form-label">DATE:</label>
                  <input type="date" name="dateArchived" class="form-control" id="dateArchived" placeholder="" style="border-radius:2px;" required>
                </div>
                <div class="col-md-3">
                  <label for="filePath" class="form-label">UPLOAD:</label>
                   <input type="file" name="filePath" class="form-control" id="filePath" placeholder="choose" style="border-radius:2px;" required>
                </div>
                <div class="col-md-5">
                  <label for="subject" class="form-label">SUBJECT</label>
                  <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter subject" style="border-radius:2px;" required>
                </div>
                <div class="col-md-6">
                  <label for="body" class="form-label">BODY</label>
                  <input type="text" name="body" class="form-control" id="body" placeholder="Enter body" style="border-radius:2px;" required>
                </div>
                <div class="col-md-1" style="margin-top:45px;">
                 <button type="submit" style="border-radius:1px; height:44px;" class="btn btn-primary" name="archive">ARCHIVE</button>
                </div>
               </form>
               <!-- End Multi Columns Form -->

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'adminFooter.php'; ?>
