
<?php 
include 'adminHeader.php';
include('../Connection.php');
include('../functions.php');
include 'adminSideNavBar.php';


    $directorateSQL = "SELECT * FROM directorates";
    $directorateResult = mysqli_query($conn, $directorateSQL);
    $totalRecords = mysqli_num_rows($directorateResult);  
    $remark = "NIL";

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

    <div class="pagetitle">
      <h1>DIRECTORATES</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Directorates</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <?php
             // Check if a successMessageForDeleteDirectorate message is set in the session for deleting of directorates
                    if (isset($_SESSION['successMessageForDeleteDirectorate'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForDeleteDirectorate'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForDeleteDirectorate']);
            }else
            // Check if a failureMessageForDeleteDirectorate is set in the session for deleting of directorates
                    if (isset($_SESSION['failureMessageForDeleteDirectorate'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['failureMessageForDeleteDirectorate'] . '</div>';

                        // Unset the failure message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForDeleteDirectorate']);
            }
           

    ?>

   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-left:50px; padding-right:50px; border-radius:1px;">
            <div class="card-body">
           
              <h5 class="card-title">Directorates</h5>
            
              <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%;">
                <thead>
                  <tr>
                   
                    <th scope="col">Directorate Code</th>
                    <th scope="col">Directorate</th>
                    <th scope="col">Branch Code</th>
                    <th scope="col">Remark</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                
                    while($directorateFetch=mysqli_fetch_assoc($directorateResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
             
                <td><?php echo $directorateFetch['DIRECTORATE_CODE']?></td>
                <td><?php echo $directorateFetch['DIRECTORATE']?></td>
                <td><?php echo $directorateFetch['BRANCH_CODE']?></td>
                <td><?php echo $directorateFetch['REMARK']?></td>
                <td><a style="color:black" href='adminViewDirectorate?directorateCode=<?php echo $directorateFetch['DIRECTORATE_CODE'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='adminEditDirectorate?directorateCode=<?php echo $directorateFetch['DIRECTORATE_CODE'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td><a style="color:black" href='adminDeleteDirectorate?directorateCode=<?php echo $directorateFetch['DIRECTORATE_CODE'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS DIRECTORATE??? DELETING THIS DIRECTORATE REMOVES THE DIRECTORATE FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td></tr>
            <?php
         
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

  </main>
  <!-- End #main -->

<?php 
include 'adminFooter.php'; 

 //declare or prepare variables for log_event function
$userSvcNo = $_SESSION['svcNo'];
$action = "visit";
$description = "$userSvcNo"." "."visited the adminUsers page";
$account = $_SESSION['account'];

 //call the log_event function
log_event($conn, $userSvcNo, $action, $description, $account);

?>

