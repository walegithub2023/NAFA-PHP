<?php
include("../Connection.php");

    if(isset($_GET['auditId'])){
        $auditId = $_GET['auditId'];
        $deleteSQL = "DELETE FROM audittrail WHERE AUDIT_ID = '$auditId'";
       $deleteResult = mysqli_query($conn, $deleteSQL);
       header("Location: adminAuditTrail");
       exit();
}


?>
