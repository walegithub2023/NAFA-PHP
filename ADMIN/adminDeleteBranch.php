<?php
session_start();
include("../Connection.php");
include('../functions.php');

    if(isset($_GET['branchCode'])){
        $branchCode = $_GET['branchCode'];

        try{
        $deleteSQL = "DELETE FROM branches WHERE BRANCH_CODE = '$branchCode'";
        
       $deleteResult = mysqli_query($conn, $deleteSQL);

        $_SESSION["successMessageForDeleteBranch"] = '<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminBranches" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                BRANCH DELETED SUCCESSFULLY...
                </div>';

                 //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "delete";
                $description = "$userSvcNo"." "."deleted a Branch named  $branchCode";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);

       header("Location: adminBranches");
       exit();
    }catch(Exception $e){
           $_SESSION["failureMessageForDeleteBranch"] = '<div class="alert alert-dismissible" style="background-color: rgb(7, 102, 219); color:white; font-size:120%; text-align:center;
                font-family:Arial; margin-bottom:10px; z-index:5; border-radius:1px solid rgb(7, 102, 219); padding:5px; border-radius:2px;">
                <a href="adminBranches" class="close" data-dismiss="alert" aria-label="close" style="color:white; font-size:120%; text-align:left;
                font-family:Arial; text-decoration:none; padding:0px">&times;</a>
                BRANCH DELETION IS NOT SUCCESSFUL...
                </div>';

                  //declare or prepare variables for log_event function
                $userSvcNo = $_SESSION['svcNo'];
                $action = "failed delete attempt";
                $description = "$userSvcNo"." "." tried deleting a Branch named  $branchCode";
                $account = $_SESSION['account'];

                //call the log_event function
                log_event($conn, $userSvcNo, $action, $description, $account);
    }
}


?>
