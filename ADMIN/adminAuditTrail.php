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
                    <td>
                      <!-- Basic Modal -->
                        <a style="color:grey; margin-left:5px; font-size:;" type="button" data-bs-toggle="modal" data-bs-target="#basicModal"><i class='bi bi-trash' id='deleteButton'></i>
                    
                        <div class="modal fade" id="basicModal" tabindex="-1" style="font-size:100%;">
                          <div class="modal-dialog">
                            <div class="modal-content" style="border-radius:1px; text-align:justify; padding-left:10px; padding-right:10px;">
                              <div class="modal-header">
                                <h5 class="modal-title">ADMIN DELETE THIS AUDIT RECORD</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Are you sure you want to delete this audit record??? Deleting this record removes it from the database.
                                Click "CANCEL" to cancel this action, and "DELETE" to delete.
                              </div>
                              <div class="modal-footer">
                                <a type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</a>
                                <a type="button" href="adminDeleteAuditTrail?auditId=<?php echo $auditFetch['AUDIT_ID'];?>" name="delete" style="border-radius:1px;" class="btn btn-primary">DELETE</a>
                              </div>
                            </div>
                          </div>
                        </div>
              <!-- End Basic Modal-->
                    </td>
                </tr>
            <?php
            }
            ?>
                </tbody>
              </table>
        </div>
            <!-- Basic Modal -->
              <a style="color:grey; margin-top:30px; margin-bottom:20px; margin-left:5px; font-size:300%;" type="button" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class='bi bi-trash' id='deleteButton'></i>
          
              <div class="modal fade" id="basicModal2" tabindex="-1" style="font-size:30%;">
                <div class="modal-dialog">
                  <div class="modal-content" style="border-radius:1px; text-align:justify; padding-left:10px; padding-right:10px;">
                    <div class="modal-header">
                      <h5 class="modal-title">ADMIN DELETE ALL AUDIT TRAIL</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       Are you sure you want to delete all audit trail records? By deleting removes all audit trail records from the database.
                       Click "CANCEL" to cancel this action, and "DELETE" to delete all records from admin's audit trail.
                    </div>
                    <div class="modal-footer">
                      <a type="button" style="border-radius:1px;" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</a>
                      <a type="button" href="adminDeleteAllAuditTrail" name="delete" style="border-radius:1px;" class="btn btn-primary">DELETE</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Basic Modal-->
        </div>

        </div>
      </div>
    </section>

  </main>
  <!-- End #main -->


<?php include 'adminFooter.php'; ?>
