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
      <h1>NEW PERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">New Pers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

         <?php
                    //MESSAGES FROM adminProcessNewPers STARTS HERE
                    // Check if a success message is set in the session 
                    if (isset($_SESSION['successMessageForNewPers'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForNewPers'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForNewPers']);
            }else

            // Check if a failure message is set in the session 
            if (isset($_SESSION['failureMessageForNewPers'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForNewPers'] . '</div>';

                        // Unset the failure message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForNewPers']);
            }else
            
            // Check if an error message is set in the session 
            if (isset($_SESSION['errorMessageForNewPers'])) {
                        // Display the error message
                        echo '<div>' . $_SESSION['errorMessageForNewPers'] . '</div>';

                        // Unset the error message to prevent it from being displayed again on page reload
                        unset($_SESSION['errorMessageForNewPers']);
            }
            //MESSAGES FROM adminProcessNewPers ENDS HERE
    ?>

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:40px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">NEW PERSONNEL</h5>
              <p>
                To create add an offr to the system, click the button below. Fill the form completely and submit.
              </p>


            <!-- Extra Large Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
                CLICK TO ADD NEW PERSONNEL TO THE DATABASE
              </button>

              <div class="modal fade" id="ExtralargeModal" tabindex="-1" style="border-radius:0px;">
                <div class="modal-dialog modal-xl" style="border-radius:0px;">
                  <div class="modal-content" style="border-radius:0px;">
                    <div class="modal-header" style="border-radius:0px;">
                      <h5 class="modal-title" style="border-radius:0px;">NEW PERSONNEL FORM</h5>
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
              <form method="post" action="adminProcessNewPers" class="row g-3" style="padding-left:70px; padding-right:70px; padding-top:20px; padding-bottom:20px;">
               <div class="col-md-3">
                  <label for="persType" class="form-label">PERS_TYPE:</label>
                  <select id="persType" name="persType" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="OFFR">Offr</option>
                        <option value="AIRMAN">Airman</option>

                  </select>
                </div>
                  <div class="col-md-3">
                  <label for="svcNo" class="form-label">SVC NO:</label>
                  <input type="text" name="svcNo" class="form-control" id="svcNo" placeholder="svcNo" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="rank" class="form-label">RANK:</label>
                   <select id="rank" name="rank" class="form-select" style="border-radius:2px;" required>
                            <option value="">Choose Rank...</option>
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
                 <div class="col-md-3">
                  <label for="initials" class="form-label">INITIALS:</label>
                  <input type="text" name="initials" class="form-control" id="initials" placeholder="initials" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="surname" class="form-label">SURNAME:</label>
                  <input type="text" name="surname" class="form-control" id="surname" placeholder="surname" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-3">
                  <label for="specialty_trade" class="form-label">SPECIALTY/TRADE:</label>
                  <select id="specialty_trade" name="specialty_trade" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="COMMS">COMMS</option>
                        <option value="IT">IT</option>
                         <option value="SPACE">SPACE</option>
                         <option value="RADAR">RADAR</option>
                  </select>
                </div>
                  <div class="col-md-3">
                  <label for="presentUnit" class="form-label">PRESENT UNIT:</label>
                   <select id="presentUnit" name="presentUnit" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="ARCHIVING CENTRE(HQ NAF)">ARCHIVING CENTRE(HQ NAF)</option>
                  </select>
                  </div>
                  <div class="col-md-3">
                  <label for="dtos" class="form-label">DTOS:</label>
                  <input type="date" name="dtos" class="form-control" id="dtos" style="border-radius:2px;" required>
                </div>
                  <div class="col-md-6">
                  <label for="dob" class="form-label">DOB:</label>
                  <input type="date" name="dob" class="form-control" id="dob" style="border-radius:2px;" required>
                </div>
                <div class="col-md-6">
                  <label for="lastUnit" class="form-label">LAST UNIT:</label>
                   <select id="lastUnit" name="lastUnit" class="form-select" style="border-radius:2px;" required>
                        <option value="">..select..</option>
                        <option value="341 COMMS GP">341 COMMS GP</option>
                  </select>
                  </div>
                <div class="col-md-12">
                  <label for="email" class="form-label">EMAIL:</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Email" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="phone" class="form-label">PHONE:</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" style="border-radius:2px;" required>
                </div>
                <div class="col-md-12">
                  <label for="remark" class="form-label">REMARK:</label>
                   <input type="text" name="remark" class="form-control" id="remark" placeholder="remark" style="border-radius:2px;" required>
                </div>
                 <div class="col-md-12">
                      <button type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                      <button type="submit" name="addNewPers" style="border-radius:1px;" class="btn btn-primary">CREATE</button>
                 </div>
               </form>
              <!-- End Multi Columns Form -->

              <!-- signal document form ends -->
                    </div>
                   
                  </div>
                </div>
              </div><!-- End Extra Large Modal-->


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