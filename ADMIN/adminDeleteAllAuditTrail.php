<?php
include("../Connection.php");
include('../functions.php');

//delete all audit trail records
       $deleteSQL = "DELETE FROM audittrail";
       $deleteResult = mysqli_query($conn, $deleteSQL);
       //redirect user to adminAuditTrail page
       header("Location: adminAuditTrail");
     


?>
