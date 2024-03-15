<?php
session_start();

// Check if user is not logged in, redirect to login page if they are not
if(isset($_SESSION['svcNo']) && isset($_SESSION['password']) && $_SESSION['account']=='ADMIN') {
?>
<?php
include('Connection.php');
include('functions.php');

//declare or prepare variables for log_event function
$svcNo = $_SESSION['svcNo'];
$action = "Logout";
$description = "$svcNo"." "."Logged out";
$account = $_SESSION['account'];

 //call the log_event function
log_event($conn, $svcNo, $action, $description, $account);
            
//unset and destroy session variables
session_unset();
session_destroy();

//redirect user to login page 
header("Location: login");
?>
<?php 
}else{
    header("Location: login");
    exit();
}
  ?>