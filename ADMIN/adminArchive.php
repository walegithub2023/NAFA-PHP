<?php
include 'adminHeader.php'; 
include('../connection.php');
include('../functions.php');
include 'adminSideNavBar.php';

?>

<main id="main" class="main" 
    style="
    background-image: url('../IMAGES/img1.jpg'); 
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    zIndex:-1;
    ">

    <div class="pagetitle">
      <h1>ARCHIVE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Archive</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

         <?php
                    //MESSAGES FROM adminProcessSignalDocuments START HERE
                    // Check if a success message is set in the session for successful signal archive
                    if (isset($_SESSION['successMessageForSignal'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForSignal'] . '</div>';

                        // Unset the success message for signal archive to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForSignal']);
            }else

            // Check if a failure message is set in the session for  signal archive failure
            if (isset($_SESSION['failureMessageForSignal'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForSignal'] . '</div>';

                        // Unset the failure message for signal archive to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForSignal']);
            }else
            
            // Check if an error message is set in the session for signal archive error
            if (isset($_SESSION['errorMessageForSignal'])) {
                        // Display the error message
                        echo '<div>' . $_SESSION['errorMessageForSignal'] . '</div>';

                        // Unset the error message for signal archive to prevent it from being displayed again on page reload
                        unset($_SESSION['errorMessageForSignal']);
            }
            //MESSAGES FROM adminProcessSignalDocuments END HERE
    ?>

    <?php 
            //MESSAGES FROM adminProcessOtherDocuments START HERE
               // Check if a success message is set in the session for successful other documents archive
                    if (isset($_SESSION['successMessageForOtherDocuments'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForOtherDocuments'] . '</div>';

                        // Unset the success message for other documents archive to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForOtherDocuments']);
            }else

            // Check if a failure message is set in the session for  other documents archive failure
            if (isset($_SESSION['failureMessageForOtherDocuments'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForOtherDocuments'] . '</div>';

                        // Unset the failure message for other documents archive to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForOtherDocuments']);
            }else
            
            // Check if an error message is set in the session for other documents archive error
            if (isset($_SESSION['errorMessageForOtherDocuments'])) {
                        // Display the error message
                        echo '<div>' . $_SESSION['errorMessageForOtherDocuments'] . '</div>';

                        // Unset the error message for other documents archive to prevent it from being displayed again on page reload
                        unset($_SESSION['errorMessageForOtherDocuments']);
                         //MESSAGES FROM adminProcessOtherDocuments END HERE
            }
    
    ?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:40px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">DOCUMENTS</h5>
              <p>
                To archive a signal document, click the "SIGNAL DOCUMENTS" button.
                Click the "OTHER DOCUMENTS" button to archive other documents.
              </p>


            <!-- Extra Large Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px; width:30%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
               SIGNAL DOCUMENTS
              </button>

              <div class="modal fade" id="ExtralargeModal" tabindex="-1" style="border-radius:0px;">
                <div class="modal-dialog modal-xl" style="border-radius:0px;">
                  <div class="modal-content" style="border-radius:0px;">
                    <div class="modal-header" style="border-radius:0px;">
                      <h5 class="modal-title" style="border-radius:0px;">SIGNAL DOCUMENTS</h5>
                      <button type="button" style="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" 
                    style="
                      padding-bottom:50px;
                      background-image: url('../IMAGES/img1.jpg'); 
                      background-size: cover;
                      background-position: center;
                      min-height: 100vh;
                      width: 100%;
                      zIndex:-1;
                    ">
                    <!--  signal document form starts --> 
                    <!-- Multi Columns Form -->
              <form method="post" action="adminProcessSignalDocuments" enctype="multipart/form-data" class="row g-3" style="padding-left:70px; padding-right:70px; padding-top:20px; padding-bottom:20px;">
               <div class="col-md-3">
                  <label for="documentType" class="form-label">TYPE:</label>
                  <select id="documentType" name="documentType" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="Signal">Signal</option>
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
                        <option value="DIT">DIT</option>
                        <option value="DCOMMS">DCOMMS</option>
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
                <div class="col-md-12">
                  <label for="subject" class="form-label">SUBJECT</label>
                  <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter subject" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="body" class="form-label">BODY</label>
                  <input type="text" name="body" class="form-control" id="body" placeholder="Enter body" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="archive_signal" style="border-radius:1px;" class="btn btn-primary">ARCHIVE</button>
                 </div>
               </form>
              <!-- End Multi Columns Form -->

              <!-- signal document form ends -->
                    </div>
                   
                  </div>
                </div>
              </div><!-- End Extra Large Modal-->



              <!-- Large Modal -->
              <button type="button" style="border-radius:2px; margin-top:20px; padding:15px; width:30%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                OTHER DOCUMENTS
              </button>

              <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" style="border-radius:1px;">
                    <div class="modal-header">
                      <h5 class="modal-title">OTHER DOCUMENTS</h5>
                      <button type="button" style="border-radius:1px;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" 
                    style="
                    padding:70px; 
                    padding-top:20px;
                    background-image: url('../IMAGES/img1.jpg'); 
                    background-size: cover;
                    background-position: center;
                    min-height: 100vh;
                    width: 100%;
                    zIndex:-1;
                    ">
                     <!--  other documents form starts --> 
                    <!-- Multi Columns Form -->
              <form method="post" action="adminProcessOtherDocuments" enctype="multipart/form-data" class="row g-3">
                   <div class="col-md-3">
                  <label for="documentType" class="form-label">TYPE:</label>
                  <select id="documentType" name="documentType" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
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
                  <label for="directorate" class="form-label">DIR:</label>
                   <select id="directorate" name="directorate" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="DIT">DIT</option>
                        <option value="DCOMMS">DCOMMS</option>
                  </select>
                  </div>
                <div class="col-md-12">
                  <label for="dateArchived" class="form-label">DATE:</label>
                  <input type="date" name="dateArchived" class="form-control" id="dateArchived" placeholder="" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="filePath" class="form-label">UPLOAD:</label>
                   <input type="file" name="filePath" class="form-control" id="filePath" placeholder="choose" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="subject" class="form-label">SUBJECT</label>
                  <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter subject" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="body" class="form-label">BODY</label>
                  <input type="text" name="body" class="form-control" id="body" placeholder="Enter body" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="archive_others" style="border-radius:1px;" class="btn btn-primary">ARCHIVE</button>
                    </div>
               </form>
              <!-- End Multi Columns Form -->

              <!-- other documents form ends -->
                    </div>
                  </div>
                </div>
              </div><!-- End Large Modal-->


            </div>
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