<?php
include('../Connection.php');
include 'adminHeader.php';
include 'adminSideNavBar.php';

    $account = $_SESSION['account'];
    $auditSQL = "SELECT * FROM audittrail";
    $auditResult = mysqli_query($conn, $auditSQL);
    $totalRecords = mysqli_num_rows($auditResult);  
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
      <h1>AUDIT</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Audit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


   <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card" style="padding-left:50px; padding-right:50px; border-radius:1px;">
            <div class="card-body">
              <h5 class="card-title">Audit Trail</h5>
            
              <!-- Table with stripped rows -->
            <div class="table-responsive" style="boder">
              <table class="table datatable table-striped second table-hover" style="font-size:90%;">
                <thead>
                  <tr>
                    <th scope="col">USER</th>
                    <th scope="col">ACTION</th>
                    <th scope="col">DESCRIPTION</th>
                   <th scope="col">ACCOUNT</th>
                    <th scope="col">DATE & TIME</th>
                    <th scope="col">DELETE</th>
                  </tr>
                </thead>
                <tbody>
                       <?php 
               
                    while($auditFetch=mysqli_fetch_assoc($auditResult))
            {
            ?>
                <tr id='userRow' style='text-transform: uppercase; font-size:90%;'>
                 <td><?php echo $auditFetch['SVC_NO']?></td>
                <td><?php echo $auditFetch['ACTION']?></td>
                <td><?php echo $auditFetch['DESCRIPTION']?></td>
                <td><?php echo $auditFetch['ACCOUNT']?></td>
                <td><?php echo $auditFetch['DATE_TIME']?></td>
                <td><a style="color:black;" href='adminDeleteAuditTrail?auditId=<?php echo $auditFetch['AUDIT_ID'];?>' type='submit' onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE THIS AUDIT RECORD??? DELETING THIS RECORD REMOVES IT FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i></a></td></tr>
            <?php
            }
            ?>
                </tbody>
              </table>
        </div>
              <!-- End Table with stripped rows -->
                <a style="color:grey; margin-top:30px; margin-bottom:20px; margin-left:5px; font-size:300%;" href='adminDeleteAllAuditTrail' type="submit" onClick='javascript:return confirm("\nARE YOU SURE YOU WANT TO DELETE ALL AUDIT RECORDS??? DELETING THESE RECORDS REMOVES ALL AUDIT RECORDS FROM THE DATABASE. CLICK OK TO DELETE AND CANCEL TO CANCEL .....\n");'><i class='bi bi-trash' id='deleteButton'></i>
            
        </div>

        </div>
      </div>
    </section>

  </main>
  <!-- End #main -->


<?php include 'adminFooter.php'; ?>
