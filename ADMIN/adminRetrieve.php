<?php 
include('../Connection.php');
include('../functions.php');
include 'adminHeader.php';
include 'adminSideNavBar.php';      
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
   <!--  <div class="pagetitle">
      <h1>RETRIEVE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Retrieve</li>
        </ol>
      </nav>
    </div>
     End Page Title --> 




    <!-- retrieve document form section starts -->
    <section class="section" id="retrieveFormSection" style="font-size:90%;">
      <div class="row">
           <div class="card"  style="padding:40px; border-radius:1px;">
            <div class="card-body">

            <?php
// Check if a success message is set in the session for successful document update 
                    if (isset($_SESSION['successMessageForEditDocument'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForEditDocument'] . '</div>';

                        // Unset the success message for document update to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForEditDocument']);
            }
?>

             <h4 class="">RETRIEVE FORM</h4>

              <!-- Multi Columns Form -->
              <form method="post" action="adminRetrieve" class="row g-3" style="padding-top:20px;">
               <div class="col-md-2">
                  <label for="documentType" class="form-label">TYPE:</label>
                  <select id="documentType" name="documentType" class="form-select" style="border-radius:2px;">
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
                  <div class="col-md-2">
                  <label for="preRef" class="form-label">PRE-REF:</label>
                  <input type="text" name="preRef" class="form-control" id="preRef" placeholder="pre-ref" style="border-radius:2px;">
                </div>
                 <div class="col-md-2">
                  <label for="refNo" class="form-label">REF NO:</label>
                   <select id="refNo" name="refNo" class="form-select" style="border-radius:2px;">
                        <option value="">..select..</option>
                        <option value="321">321</option>
                        <option value="530">530</option>
                        <option value="531">531</option>
                  </select>
                </div>
                 <div class="col-md-2">
                  <label for="postRef" class="form-label">POST-REF:</label>
                  <input type="text" name="postRef" class="form-control" id="postRef" placeholder="post-ref" style="border-radius:2px;">
                </div>
                 <div class="col-md-2">
                  <label for="ref" class="form-label">REF:</label>
                  <input type="text" name="ref" class="form-control" id="ref" placeholder="ref" style="border-radius:2px;">
                </div>
                 <div class="col-md-2">
                  <label for="documentDate" class="form-label">DOC  DATE:</label>
                  <input type="date" name="documentDate" class="form-control" id="documentDate" placeholder="" style="border-radius:2px;">
                </div>
                  <div class="col-md-2">
                  <label for="securityClass" class="form-label">SY CLASS:</label>
                   <select id="securityClass" name="securityClass" class="form-select" style="border-radius:2px;">
                        <option value="">..select..</option>
                        <option value="TOP SECRET">Top Secret</option>
                         <option value="SECRET">Secret</option>
                          <option value="CONFIDENTIAL">Confidential</option>
                           <option value="RESTRICTED">Restricted</option>
                  </select>
                  </div>
                  <div class="col-md-2">
                  <label for="dtg" class="form-label">DTG:</label>
                  <input type="text" name="dtg" class="form-control" id="dtg" placeholder="Enter dtg" style="border-radius:2px;">
                </div>
                <div class="col-md-2">
                  <label for="directorate" class="form-label">DIR:</label>
                   <select id="directorate" name="directorate" class="form-select" style="border-radius:2px;">
                        <option value="">..select..</option>
                        <option value="">DIT</option>
                  </select>
                  </div>
                <div class="col-md-2">
                  <label for="controlNo" class="form-label">CONTROL:</label>
                  <input type="text" name="controlNo" class="form-control" id="controlNo" placeholder="control no" style="border-radius:2px;">
                </div>
                <div class="col-md-2">
                  <label for="dateArchived" class="form-label">DATE:</label>
                  <input type="date" name="dateArchived" class="form-control" id="dateArchived" placeholder="" style="border-radius:2px;">
                </div>
                <div class="col-md-2">
                  <label for="duration" class="form-label">DURATION:</label>
                   <select id="duration" name="duration" class="form-select" style="border-radius:2px;">
                        <option value="">..select..</option>
                        <option value="1">1 month ago</option>
                        <option value="2">2 months ago</option>
                        <option value="3">3 months ago</option>
                        <option value="4">4 months ago</option>
                        <option value="5">5 months ago</option>
                        <option value="6">6 months ago</option>
                  </select>
                </div>
                <div class="col-md-5">
                  <label for="subject" class="form-label">SUBJECT</label>
                  <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter subject" style="border-radius:2px;">
                </div>
                <div class="col-md-6">
                  <label for="body" class="form-label">BODY</label>
                  <input type="text" name="body" class="form-control" id="body" placeholder="Enter body" style="border-radius:2px;">
                </div>
                <div class="col-md-1" style="margin-top:45px;">
                 <button type="submit" name="retrieve" class="btn btn-primary" style="border-radius:2px; width:88px; height:40px; font-size:80%;">RETRIEVE</button>
                </div>
              </form>
              <!-- End Multi Columns Form -->

            </div>
          </div>
      </div>
    </section>
    <!-- retrieve document form section ends -->


   <!--  retrieve document section -->
    <section class="section" id="retrieveFormSection" style="font-size:90%">
      <div class="row">

          <div class="card" style="padding:40px; border-radius:1px;">
            <div class="card-body">
             <!--  <h5 class="card-title">RETRIEVED</h5> -->
            
              <!-- Table with stripped rows -->
            <div class="table-responsive" style="">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%; text-align:justify;">
                <thead>
                  <tr>
                   
                    <th scope="col">TYPE</th>
                    <th scope="col">REF</th>
                    <th scope="col">SUBJECT</th>
                    <th scope="col">BODY</th>
                    <th scope="col">DOC.DATE</th>
                    <th scope="col">DATE.ACHVD</th>
                    <th scope="col">TIME</th>
                    <th scope="col">VIEW</th>
                     <th scope="col">OPEN</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
                  </tr>
                </thead>
                <tbody>
  <?php


                  //Collect Pers Data From Signup Form Inputs

            if(isset($_POST['retrieve'])){

              try{
            
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
                  $duration = $_POST['duration'];


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
                                    

          //fetch records with conditions

          //SINGLE FIELD STARTS (1 FIELD FIELD SELECTED AT A TIME)

          //if the user is searching with document type field                          
         if($documentType != "" && ($preRef == "" && $refNo == "" && $postRef == "" && $ref == "" && $directorate == "" && 
          $securityClass == "" && $documentDate == "" && $dateArchived == "" && $dtg == "" && $controlNo == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {                                             
          $documentSQL = "SELECT * FROM documents WHERE DOCUMENT_TYPE = '$documentType'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords $documentType document(s) from the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          $successMsg='<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else
          
          
          //if the user is searching with preRef field 
          if($preRef !="" && ($documentType == "" && $refNo == "" && $postRef == "" && $ref == "" && $directorate == "" && 
          $securityClass == "" && $documentDate == "" && $dateArchived == "" && $dtg == "" && $controlNo == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE PRE_REF = '$preRef'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with preRef $preRef from the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else

          //if the user is searching with RefNo field 
          if($refNo !="" && ($documentType == "" && $preRef == "" && $postRef == "" && $ref == "" && $directorate == "" && 
          $securityClass == "" && $documentDate == "" && $dateArchived == "" && $dtg == "" && $controlNo == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE REF_NO = '$refNo'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with RefNo $refNo from the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else


          //if the user is searching with postRef field 
          if($postRef !="" && ($documentType == "" && $preRef == "" && $refNo =="" && $ref == "" && $directorate == "" && 
          $securityClass == "" && $documentDate == "" && $dateArchived == "" && $dtg == "" && $controlNo == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE POST_REF = '$postRef'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with postRef $postRef from the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else


           //if the user is searching with ref field 
          if($ref !="" && ($documentType == "" && $preRef == "" && $refNo =="" && $postRef == "" && $directorate == "" && 
          $securityClass == "" && $documentDate == "" && $dateArchived == "" && $dtg == "" && $controlNo == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE REF = '$ref'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with ref $ref from the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else



              //if the user is searching with document date field 
          if($documentDate !="" && ($documentType == "" && $preRef == "" && $refNo =="" && $postRef == "" && $directorate == "" && 
          $securityClass == "" && $ref == "" && $dateArchived == "" && $dtg == "" && $controlNo == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE DOCUMENT_DATE = '$documentDate'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with document date $documentDate from the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else



          //if the user is searching with sy class field 
          if($securityClass !="" && ($documentType == "" && $preRef == "" && $refNo =="" && $postRef == "" && $directorate == "" && 
          $documentDate == "" && $ref == "" && $dateArchived == "" && $dtg == "" && $controlNo == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE SY_CLASS = '$securityClass'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with security classification->$securityClass from the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else



                //if the user is searching with dtg field 
          if($dtg !="" && ($documentType == "" && $preRef == "" && $refNo =="" && $postRef == "" && $directorate == "" && 
          $documentDate == "" && $ref == "" && $dateArchived == "" && $securityClass == "" && $controlNo == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE DTG = '$dtg'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with DTG->$dtg from the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else


          //if the user is searching with directorate field 
          if($directorate !="" && ($documentType == "" && $preRef == "" && $refNo =="" && $postRef == "" && $dtg == "" && 
          $documentDate == "" && $ref == "" && $dateArchived == "" && $securityClass == "" && $controlNo == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE DIRECTORATE_ID = '$directorate'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) from $directorate in the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else



            //if the user is searching with control no field 
          if($controlNo !="" && ($documentType == "" && $preRef == "" && $refNo =="" && $postRef == "" && $dtg == "" && 
          $documentDate == "" && $ref == "" && $dateArchived == "" && $securityClass == "" && $directorate == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE CONTROL_NO = '$controlNo'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with control no.->$controlNo in the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else



          
            //if the user is searching with the date archived field 
          if($dateArchived !="" && ($documentType == "" && $preRef == "" && $refNo =="" && $postRef == "" && $dtg == "" && 
          $documentDate == "" && $ref == "" && $controlNo == "" && $securityClass == "" && $directorate == "" && 
          $subject == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE DATE_ARCHIVED = '$dateArchived'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with the date archived as.->$dateArchived in the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else



          //if the user is searching with duration field 
          if($duration !="" && ($documentType == "" && $preRef == "" && $refNo == "" && $postRef == "" && $ref == "" && $directorate == "" && 
          $securityClass == "" && $documentDate == "" && $dateArchived == "" && $dtg == "" && $controlNo == "" && 
          $subject == "" && $body == ""))
          {
          // Calculate the start date based on the selected duration
          $startDate = date('Y-m-d', strtotime('-' . $duration . ' months'));
          //fetch the documents
          $documentSQL = "SELECT * FROM documents WHERE DOCUMENT_DATE >= '$startDate'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) from $duration month(s) ago.";
            $account = $_SESSION['account'];
            //call the log_event function
            log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else



          //if the user is searching with the subject field 
          if($subject !="" && ($documentType == "" && $preRef == "" && $refNo =="" && $postRef == "" && $dtg == "" && 
          $documentDate == "" && $ref == "" && $controlNo == "" && $securityClass == "" && $directorate == "" && 
          $dateArchived == "" && $body == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE SUBJECT = '$subject'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with the subject as.->$subject in the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else


          //if the user is searching with the body field 
          if($body !="" && ($documentType == "" && $preRef == "" && $refNo =="" && $postRef == "" && $dtg == "" && 
          $documentDate == "" && $ref == "" && $controlNo == "" && $securityClass == "" && $directorate == "" && 
          $dateArchived == "" && $subject == "" && $duration == ""))
          {
          $documentSQL = "SELECT * FROM documents WHERE BODY = '$body'";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
          //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved $totalRecords document(s) with the body as.->$body in the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }else

          
          //SINGLE FIELD ENDS

          //NO FIELD STARTS (NO FIELD SELECTED)
          //if the user doesn't search with any of the fields, but, clicks the retrieve button
          if($preRef =="" && $documentType == "" && $refNo == "" && $postRef == "" && $ref == "" && $directorate == "" && 
          $securityClass == "" && $documentDate == "" && $dateArchived == "" && $dtg == "" && $controlNo == "" && 
          $subject == "" && $body == "")
          {                                             
          $documentSQL = "SELECT * FROM documents";
          $documentResult = mysqli_query($conn, $documentSQL);
          $totalRecords = mysqli_num_rows($documentResult);
           //check if records are retrieved
          if($totalRecords > 0){
          //log the event
           //declare or prepare variables for log_event function
            $userSvcNo = $_SESSION['svcNo'];
            $action = "Retrieve";
            $description = "$userSvcNo"." "."retrieved all the documents ($totalRecords) from the archive";
            $account = $_SESSION['account'];
            //call the log_event function
          log_event($conn, $userSvcNo, $action, $description, $account);
          //display the retrieved documents.
          echo'<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          DOCUMENTS RETRIEVED SUCCESSFULLY...
          </div>';
          }
          }
          //NO FIELD ENDS

       
          while ($documentFetch = mysqli_fetch_assoc($documentResult)) {
    echo "<tr id='userRow' style='text-transform: uppercase; font-size:70%;'>
            <td>".$documentFetch['DOCUMENT_TYPE']."</td>
            <td>".$documentFetch['REF']."</td>
            <td>".$documentFetch['SUBJECT']."</td>
            <td>".$documentFetch['BODY']."</td>
            <td>".$documentFetch['DOCUMENT_DATE']."</td>
            <td>".$documentFetch['DATE_ARCHIVED']."</td>
             <td>".$documentFetch['TIME']."</td>
            <td><a style='color:black' href='adminViewDocument?documentId=".$documentFetch['DOCUMENT_ID']."' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
             <td><a style='color:black' href='".$documentFetch['FILE_PATH']."' target='_blank' type='submit' id='openButton'><i class='bi bi-file-earmark-pdf' id='openButton'></i></a></td>
            <td><a style='color:black' href='adminEditDocument?documentId=".$documentFetch['DOCUMENT_ID']."' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
            <td> 
            <!-- Basic Modal -->
                        <a style='color:black; margin-left:5px; font-size:;' type='button' data-bs-toggle='modal' data-bs-target='#basicModal'><i class='bi bi-trash' id='deleteButton'></i>
                    
                        <div class='modal fade' id='basicModal' tabindex='-1' style='font-size:100%;'>
                          <div class='modal-dialog'>
                            <div class='modal-content' style='border-radius:1px; text-align:justify; padding-left:10px; padding-right:10px;'>
                              <div class='modal-header'>
                                <h5 class='modal-title'>ADMIN DELETE THIS DOCUMENT</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                              </div>
                              <div class='modal-body'>
                                Are you sure you want to delete this document??? Deleting this document removes it from the database.
                                Click 'CANCEL' to cancel this action, and 'DELETE' to delete.
                              </div>
                              <div class='modal-footer'>
                                <a type='button' style='border-radius:1px;' class='btn btn-secondary' data-bs-dismiss='modal'>CANCEL</a>
                                <a type='button' href='adminDeleteDocument?documentId=".$documentFetch['DOCUMENT_ID']."' name='delete' style='border-radius:1px;' class='btn btn-primary'>DELETE</a>
                              </div>
                            </div>
                          </div>
                        </div>
              <!-- End Basic Modal-->
            
            
            </td>
        </tr>";
}

} catch (Throwable $e) {
    // Code to handle other types of errors
  /*   echo '<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:100%; text-align:center;
          font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:9px; border-radius:2px;">
          <a href="adminRetrieve" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
          font-family:Arial; text-decoration:none; padding:0px">&times;</a>
          THE SELECTED FIELD(S) HAS NOT BEEN ACTIVATED. TRY AGAIN LATER..
          </div>'; */
}
}     
                                
?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
   <!-- end of retrieve document section -->

  </main><!-- End #main -->

  <?php include 'adminFooter.php'; ?>

 <?php  ?>