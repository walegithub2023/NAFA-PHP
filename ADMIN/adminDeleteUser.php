<?php
include("../Connection.php");
include('../functions.php');

    if(isset($_GET['svcNo'])){
        $svcNo = $_GET['svcNo'];
        $deleteSQL = "DELETE FROM users WHERE SVC_NO = '$svcNo'";

        
       $deleteResult = mysqli_query($conn, $deleteSQL);
       header("Location: adminUsers");
       exit();
}


?>
