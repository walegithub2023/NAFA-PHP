<?php
session_start();
include("../Connection.php");
include('../functions.php');

    if(isset($_GET['svcNo'])){
        $svcNo = $_GET['svcNo'];

        try{
        $deleteSQL = "DELETE FROM users WHERE SVC_NO = '$svcNo'";
        
       $deleteResult = mysqli_query($conn, $deleteSQL);

        $_SESSION["successMessageForDeleteUser"] = '<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminUsers" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                USER DELETED SUCCESSFULLY...
                </div>';

                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "delete";
                $description = "$userSvcNo"." "."deleted a user named  $svcNo";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);

       header("Location: adminUsers");
       exit();
    }catch(Exception $e){
           $_SESSION["failure_message"] = '<div class="alert alert-dismissible" style="background-color: #dc3545; color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminUsers" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                THIS USER CANNOT BE DELETED. HE/SHE IS LOGGED IN.
                </div>';

                //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed delete attempt";
                $description = "$userSvcNo"." "."tried deleting a user named  $svcNo";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
    }
}


?>
