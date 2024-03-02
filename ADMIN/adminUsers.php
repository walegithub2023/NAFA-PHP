
<?php 
include 'adminHeader.php';
include('../Connection.php');
include('../functions.php');
include 'adminSideNavBar.php';


    $userSQL = "SELECT * FROM users";
    $userResult = mysqli_query($conn, $userSQL);
    $totalRecords = mysqli_num_rows($userResult);  
    $remark = "NIL";

?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>USERS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <?php

                    // Check if a success message is set in the session
                    if (isset($_SESSION['success_message'])) {
                        // Display the success message
                        echo '<div>' . $_SESSION['success_message'] . '</div>';

                        // Unset the success message to prevent it from being displayed again on page reload
                        unset($_SESSION['success_message']);
            }
    ?>

   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-left:50px; padding-right:50px;">
            <div class="card-body">
           
              <h5 class="card-title">Users</h5>
            
              <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="text-transform:uppercase; font-size:90%;">
                <thead>
                  <tr>
                   
                    <th scope="col">Svc No</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Initials</th>
                    <th scope="col">Surname</th>
                    <th scope="col">User Role</th>
                    <th scope="col">Account</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
                    $serial = 1;
                    while($userFetch=mysqli_fetch_assoc($userResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
             
                <td><?php echo $userFetch['SVC_NO']?></td>
                <td><?php echo $userFetch['RANK']?></td>
                <td><?php echo $userFetch['INITIALS']?></td>
                <td><?php echo $userFetch['SURNAME']?></td>
                <td><?php echo $userFetch['USER_ROLE']?></td>
                <td><?php echo $userFetch['ACCOUNT']?></td>
                <td><a style="color:black" href='adminViewUser?svcNo=<?php echo $userFetch['SVC_NO'];?>' type='submit' id='viewButton'><i class='bi bi-eye' id='viewButton'></i></a></td>
                <td><a style="color:black" href='adminEditUser?svcNo=<?php echo $userFetch['SVC_NO'];?>' type='submit'><i class='bi bi-pencil' id='editButton'></i></a></td>
                <td><a style="color:black" href='adminDeleteUser?svcNo=<?php echo $userFetch['SVC_NO'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS USER??? DELETING THIS USER REMOVES THE USER FROM THE DATA BASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td></tr>
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

