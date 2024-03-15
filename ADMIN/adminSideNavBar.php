<?php 
// Start the session only if it's not already started
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['account']=='ADMIN') {
?>
<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="adminHome">
          <i class="bi bi-house"></i>
          <span>Home</span>
        </a>
      </li><!-- End Login Page Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#dashboard-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid"></i><span>Dashboard</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="dashboard-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="adminArchiveDashboard">
              <i class="bi bi-circle"></i><span>NAFA</span>
            </a>
          </li>
          <li>
            <a href="adminOpmsDashboard">
              <i class="bi bi-circle"></i><span>OPMS</span>
            </a>
          </li>
        </ul>
      </li><!-- End Dashboard Nav -->



      
         <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#archive-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Archive</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="archive-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="adminArchive">
              <i class="bi bi-circle"></i><span>Archive</span>
            </a>
          </li>
          <li>
            <a href="adminRetrieve">
              <i class="bi bi-circle"></i><span>Retrieve</span>
            </a>
          </li>
        </ul>
      </li><!-- End Archive Nav -->



      
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#personnel-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Nominal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="personnel-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="adminNominal">
              <i class="bi bi-people"></i><span>Nominal</span>
            </a>
          </li>
           <li>
            <a href="adminPdeState">
              <i class="bi bi-circle"></i><span>Pde State</span>
            </a>
          </li>
           <li>
          </li>
          <li>
            <a href="adminNewPers">
              <i class="bi bi-circle"></i><span>New Pers</span>
            </a>
          </li>
        </ul>
      </li><!-- End Personnel Nav -->





           <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="adminChart1">
              <i class="bi bi-circle"></i><span>chart1</span>
            </a>
          </li>
          <li>
            <a href="adminChart2">
              <i class="bi bi-circle"></i><span>chart2</span>
            </a>
          </li>
          <li>
            <a href="adminChart3">
              <i class="bi bi-circle"></i><span>chart3</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->


         <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#branches-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Bchs&Dirs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="branches-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="adminBranches">
              <i class="bi bi-circle"></i><span>Branches</span>
            </a>
          </li>
           <li>
            <a href="adminNewBranch">
              <i class="bi bi-circle"></i><span>New Branch</span>
            </a>
          </li>
          <li>
            <a href="adminDirectorates">
              <i class="bi bi-circle"></i><span>Directorates</span>
            </a>
          </li>
           <li>
            <a href="adminNewDirectorate">
              <i class="bi bi-circle"></i><span>New Directorate</span>
            </a>
          </li>
        </ul>
      </li><!-- End Branches Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="adminUsers">
              <i class="bi bi-circle"></i><span>Users</span>
            </a>
          </li>
          <li>
            <a href="adminNewUser">
              <i class="bi bi-circle"></i><span>New user</span>
            </a>
          </li>
        </ul>
      </li><!-- End Users Nav -->


       <li class="nav-item">
        <a class="nav-link collapsed" href="adminAuditTrail">
          <i class="bi bi-journal-bookmark"></i>
          <span>Audit</span>
        </a>
      </li><!-- End AuditTrail Page Nav -->




      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="adminUserProfile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="help">
          <i class="bi bi-question-circle"></i>
          <span>Help</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="adminContact">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->
     <?php 
}else{
    header("Location: ../login");
    exit();
}
  ?>