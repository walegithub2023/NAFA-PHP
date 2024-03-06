<?php
include 'adminHeader.php'; 
include('../connection.php');
include('../functions.php');
include 'adminSideNavBar.php';

  $offrsNominalSQL = "SELECT * FROM nominal WHERE PERS_TYPE = 'OFFR'";
    $offrsNominalResult = mysqli_query($conn, $offrsNominalSQL);
    $totalRecords1 = mysqli_num_rows($offrsNominalResult);  
    $remark1 = "NIL";


    $airmenNominalSQL = "SELECT * FROM nominal WHERE PERS_TYPE = 'AIRMAN'";
    $airmenNominalResult = mysqli_query($conn, $airmenNominalSQL);
    $totalRecords2 = mysqli_num_rows($airmenNominalResult);  
    $remark2 = "NIL";

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
      <h1>PERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">Nominals</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

         <?php
                    //MESSAGES FROM adminProcessOffrsNominal START HERE
                    // Check if a successMessageForOffrsNominal is set in the session
                    if (isset($_SESSION['successMessageForOffrsNominal'])) {
                        // Display the successMessageForOffrsNominal
                        echo '<div>' . $_SESSION['successMessageForOffrsNominal'] . '</div>';

                        // Unset the successMessageForOffrsNominal
                        unset($_SESSION['successMessageForOffrsNominal']);
            }else

            // Check if a failureMessageForOffrsNominal is set in the session
            if (isset($_SESSION['failureMessageForOffrsNominal'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForOffrsNominal'] . '</div>';

                        // Unset the failureMessageForOffrsNominal
                        unset($_SESSION['failureMessageForOffrsNominal']);
            }else
            
            // Check if an error message errorMessageForOffrsNominal 
            if (isset($_SESSION['errorMessageForOffrsNominal'])) {
                        // Display the error message
                        echo '<div>' . $_SESSION['errorMessageForOffrsNominal'] . '</div>';

                        // Unset the error message for signal archive to prevent it from being displayed again on page reload
                        unset($_SESSION['errorMessageForOffrsNominal']);
            }
            //MESSAGES FROM adminProcessOffrsNominal END HERE
    ?>

    <?php 
            //MESSAGES FROM adminProcessAirmenNominal START HERE
               // Check if a success message is set in the session
                    if (isset($_SESSION['successMessageForAirmenNominal'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForAirmenNominal'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForAirmenNominal']);
            }else

            // Check if a failure message is set in the session 
            if (isset($_SESSION['failureMessageForAirmenNominal'])) {
                        // Display the failure message
                        echo '<div>' . $_SESSION['failureMessageForAirmenNominal'] . '</div>';

                        // Unset the failure message
                        unset($_SESSION['failureMessageForAirmenNominal']);
            }else
            
            // Check if an error message is set in the session 
            if (isset($_SESSION['errorMessageForAirmenNominal'])) {
                        // Display the error message
                        echo '<div>' . $_SESSION['errorMessageForAirmenNominal'] . '</div>';

                        // Unset the error message 
                        unset($_SESSION['errorMessageForAirmenNominal']);
                         //MESSAGES FROM adminProcessAirmenNominal END HERE
            }
    
    ?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:20px; padding-bottom:40px; border-radius:0px;">
            <div class="card-body">
              <h5 class="card-title">NOMINALS</h5>
              <p>
                To see offrs' nominal roll, click the "OFFRS' NOMINAL ROLL" button.
                Click the "AIRMEN'S NOMINAL ROLL" button to see the nominal roll for Airmen.
              </p>


             <!-- Full Screen Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px; width:30%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal1">
                OFFRS' NOMINAL ROLL
              </button>

              <div class="modal fade" id="fullscreenModal1" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">OFFRS' NOMINAL ROLL</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                       style="
                background-image: url('../IMAGES/img1.jpg'); 
                background-size: cover;
                background-position: center;
                min-height: 100vh;
                zIndex:-1;
                "   
                >
                     <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%;">
                <thead>
                  <tr>
                   
                    <th scope="col">Pers Type</th>
                    <th scope="col">Svc No</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Intials</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Specialty/Trade</th>
                    <th scope="col">Present Unit</th>
                    <th scope="col">DTOS</th>
                    <th scope="col">Last Unit</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Remark</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($offrsNominalFetch=mysqli_fetch_assoc($offrsNominalResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $offrsNominalFetch['PERS_TYPE']?></td>
                <td><?php echo $offrsNominalFetch['SVC_NO']?></td>
                <td><?php echo $offrsNominalFetch['RANK']?></td>
                <td><?php echo $offrsNominalFetch['INITIALS']?></td>
                <td><?php echo $offrsNominalFetch['SURNAME']?></td>
                <td><?php echo $offrsNominalFetch['SPECIALTY_TRADE']?></td>
                <td><?php echo $offrsNominalFetch['PRESENT_UNIT']?></td>
                <td><?php echo $offrsNominalFetch['DTOS']?></td>
                <td><?php echo $offrsNominalFetch['LAST_UNIT']?></td>
                <td><?php echo $offrsNominalFetch['EMAIL']?></td>
                <td><?php echo $offrsNominalFetch['PHONE']?></td>
                <td><?php echo $offrsNominalFetch['DOB']?></td>
                <td><?php echo $offrsNominalFetch['REMARK']?></td>
                <td><a style="color:black" href='adminViewNominal?svcNo=<?php echo $offrsNominalFetch['SVC_NO'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='adminEditNominal?svcNo=<?php echo $offrsNominalFetch['SVC_NO'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td><a style="color:black" href='adminDeleteNominal?svcNo=<?php echo $offrsNominalFetch['SVC_NO'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS PERS??? DELETING THIS PERS REMOVES THE PERS FROM THE DATAdASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td></tr>
            <?php
         
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" style="border-radius:1px;" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Full Screen Modal-->



              <!-- Full Screen Modal -->
              <button type="button" style="border-radius:1px; margin-top:20px; margin-right:5px; padding:15px; width:30%;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal2">
                AIRMEN'S NOMINAL ROLL
              </button>

              <div class="modal fade" id="fullscreenModal2" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">AIRMEN'S NOMINAL ROLL</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"
                    style="
                    background-image: url('../IMAGES/img1.jpg'); 
                    background-size: cover;
                    background-position: center;
                    min-height: 100vh;
                    zIndex:-1;
                    " 
                    >
                      <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%;">
                <thead>
                  <tr>
                   
                    <th scope="col">Pers Type</th>
                    <th scope="col">Svc No</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Intials</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Specialty/Trade</th>
                    <th scope="col">Present Unit</th>
                    <th scope="col">DTOS</th>
                    <th scope="col">Last Unit</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Remark</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($airmenNominalFetch=mysqli_fetch_assoc($airmenNominalResult))
            {
            ?>
                <tr id='userRow' style='font-size:90%;'>
                <td><?php echo $airmenNominalFetch['PERS_TYPE']?></td>
                <td><?php echo $airmenNominalFetch['SVC_NO']?></td>
                <td><?php echo $airmenNominalFetch['RANK']?></td>
                <td><?php echo $airmenNominalFetch['INITIALS']?></td>
                <td><?php echo $airmenNominalFetch['SURNAME']?></td>
                <td><?php echo $airmenNominalFetch['SPECIALTY_TRADE']?></td>
                <td><?php echo $airmenNominalFetch['PRESENT_UNIT']?></td>
                <td><?php echo $airmenNominalFetch['DTOS']?></td>
                <td><?php echo $airmenNominalFetch['LAST_UNIT']?></td>
                <td><?php echo $airmenNominalFetch['EMAIL']?></td>
                <td><?php echo $airmenNominalFetch['PHONE']?></td>
                <td><?php echo $airmenNominalFetch['DOB']?></td>
                <td><?php echo $airmenNominalFetch['REMARK']?></td>
                <td><a style="color:black" href='adminViewNominal?svcNo=<?php echo $airmenNominalFetch['SVC_NO'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='adminEditNominal?svcNo=<?php echo $airmenNominalFetch['SVC_NO'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td><a style="color:black" href='adminDeleteNominal?svcNo=<?php echo $airmenNominalFetch['SVC_NO'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS PERS??? DELETING THIS PERS REMOVES THE PERS FROM THE DATAdASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td></tr>
            <?php
         
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->
                    </div>
                    <div class="modal-footer">
                          <button type="button" style="border-radius:1px;" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Full Screen Modal-->


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