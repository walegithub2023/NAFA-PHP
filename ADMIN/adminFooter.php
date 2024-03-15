
<?php 
// Start the session only if it's not already started
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['account']=='ADMIN') {
?>
<!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="background-color:white; color:black; border:1px solid white;">
    <div class="copyright">
      &copy; Copyright <strong><span>NAFA 2024</span></strong>. All Rights Reserved.
    </div>
    <div class="credits">
      Designed by NAF Alpha Dev.
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>
   <?php 
}else{
    header("Location: ../login");
    exit();
}
  ?>