<?php
include("../Connection.php");
include('../functions.php');

    if(isset($_GET['documentId'])){
        $documentId = $_GET['documentId'];
        $deleteSQL = "DELETE FROM documents WHERE DOCUMENT_ID = '$documentId'";

        
       $deleteResult = mysqli_query($conn, $deleteSQL);
       header("Location: adminRetrieve");
       exit();
}


?>
