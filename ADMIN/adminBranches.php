
<?php 
include 'adminHeader.php';
include('../Connection.php');
include('../functions.php');
include 'adminSideNavBar.php';


    $branchSQL = "SELECT * FROM branches";
    $branchResult = mysqli_query($conn, $branchSQL);
    $totalRecords = mysqli_num_rows($branchResult);  

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
      <h1>BRANCHES</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Branches</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <?php
             // Check if a successMessageForDeleteBranch message is set in the session for deleting of branchs
                    if (isset($_SESSION['successMessageForDeleteBranch'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['successMessageForDeleteBranch'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['successMessageForDeleteBranch']);
            }else
            // Check if a failureMessageForDeleteBranch is set in the session for deleting of branches
                    if (isset($_SESSION['failureMessageForDeleteBranch'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['failureMessageForDeleteBranch'] . '</div>';

                        // Unset the failure message to prevent it from being displayed again on page reload
                        unset($_SESSION['failureMessageForDeleteBranch']);
            }
           

    ?>

   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-left:50px; padding-right:50px; border-radius:1px;">
            <div class="card-body">
           
              <h5 class="card-title">Branches</h5>
            
              <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%;">
                <thead>
                  <tr>
                   
                    <th scope="col">BRANCH CODE</th>
                    <th scope="col">BRANCH</th>
                    <th scope="col">Remark</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                
                    while($branchFetch=mysqli_fetch_assoc($branchResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                <td><?php echo $branchFetch['BRANCH_CODE']?></td>
                <td><?php echo $branchFetch['BRANCH']?></td>
                <td><?php echo $branchFetch['REMARK']?></td>
                <td><a style="color:black" href='adminViewBranch?branchCode=<?php echo $branchFetch['BRANCH_CODE'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='adminEditBranch?branchCode=<?php echo $branchFetch['BRANCH_CODE'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td><a style="color:black" href='adminDeleteBranch?branchCode=<?php echo $branchFetch['BRANCH_CODE'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS branch??? DELETING THIS branch REMOVES THE branch FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td></tr>
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

