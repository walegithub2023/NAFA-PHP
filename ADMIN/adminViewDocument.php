<?php 

include('../Connection.php');
include('../functions.php');
include 'adminHeader.php';
include 'adminSideNavBar.php';


    //get document ID and fetch selected document's record and assign them to variables
 
    if(isset($_GET['documentId'])){
     $documentId = $_GET['documentId'];
     $documentSQL = "SELECT * FROM documents WHERE DOCUMENT_ID = '$documentId'";
     $documentResult = mysqli_query($conn, $documentSQL);

 
    while($row = mysqli_fetch_assoc($documentResult))
    {
?>

   
<main id="main" class="main">
    <div class="pagetitle">
      <h1>DOCUMENT VIEW</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminHome">Home</a></li>
          <li class="breadcrumb-item active">View Document</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


              <!-- Multi Columns Form -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding-left:50px; padding-right:50px; padding-top:50px;">
            <div class="card-body">
            
              <!-- Table with stripped rows starts -->
              <table class="table table-striped" style="text-transform:uppercase;"> 
                <thead>
             
                </thead>
                <tbody>
                 <div class="container">
                  <div class="row">
                    <div class="col-sm-1">
                     <i class="bi-file-earmark-pdf" style="font-size:520%; color:grey;"></i>
                    </div>
                    <div class="col-sm-7" style="margin-left:30px;">
                      <p style="text-align:justify; margin-top:5px;"><span style="font-weight:bold">SUBJECT: </span> <?php echo $row['SUBJECT']?></p>
                      <p style="text-align:justify; margin-top:5px;">
                      <span style="font-weight:bold">DOCUMENT DATE: </span> <?php echo $row['DOCUMENT_DATE']." "?>
                      <span style="font-weight:bold">DATE ARCHIVED: </span> <?php echo $row['DATE_ARCHIVED']?>
                    </p>
                     <p style="text-align:justify; margin-top:5px;">
                      <span style="font-weight:bold">DOCUMENT BODY: </span> <?php echo $row['BODY']." "?>
                    </p>
                    <p style="text-align:justify; margin-top:5px;">
                       <a href="adminRetrieve" type="button" name="back" class="btn btn-primary" style="border-radius:2px; width:120px; height:45px; margin-top:10px;">BACK</a>
                    </p>
                    </div>
                    <div class="col-sm-3" style="margin-left:30px;">
                    <p style="text-align:justify; margin-top:5px;"><span style="font-weight:bold">SECURITY CLASS: </span> <?php echo $row['SY_CLASS']?></p>
                    <p style="text-align:justify; margin-top:5px;"><span style="font-weight:bold">CONTROL NO: </span> <?php echo $row['CONTROL_NO']?></p>
                    <p style="text-align:justify; margin-top:5px;"><span style="font-weight:bold">REFERENCE: </span> <?php echo $row['REF']?></p>
                    <p style="text-align:justify; margin-top:5px;"><span style="font-weight:bold">DIRECTORATE: </span> <?php echo $row['DIRECTORATE_ID']?></p>
                    <p style="text-align:justify; margin-top:5px;"><span style="font-weight:bold">DTG: </span> <?php echo $row['DTG']?></p>
                    <p style="text-align:justify; margin-top:5px;"><span style="font-weight:bold">TYPE: </span> <?php echo $row['DOCUMENT_TYPE']?></p>
                    <p style="text-align:justify; margin-top:5px;">
                    <i class="bi bi-eye" style="font-size:150%; color:grey; margin-right:20px;"></i>
                    <i class="bi bi-trash" style="font-size:150%; color:grey;"></i>
                    </p>  
                  </div>
                  </div>
                </div>

    </tbody> 
    </table> 
        <!-- Table with stripped rows ends -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
<?php include 'adminFooter.php'; ?>

<?php

/*  //declare or prepare variables for log_event function
$ref = $row['REF'];
$subject = $row['SUBJECT'];
$documentDate = $row['DOCUMENT_DATE'];
$userSvcNo = $_SESSION['svcNo'];
$action = "view";
$description = "$userSvcNo"." "."viewed details of a document in the archive. REF->$ref and subject-> $subject";
$account = $_SESSION['account'];

 //call the log_event function
log_event($conn, $userSvcNo, $action, $description, $account); */

}}?>
