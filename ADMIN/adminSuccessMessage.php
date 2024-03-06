<?php
include('../connection.php');
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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" style="padding:30px; padding-top:40px; padding-bottom:20px; margin-top:70px;">
            <div class="card-body">
              <div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:10px; border-radius:2px;">
                <a href="adminArchive" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                DOCUMENT UPDATED SUCCESSFULLY...
            </div>
             
            </d>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php
include 'adminFooter.php';
?>