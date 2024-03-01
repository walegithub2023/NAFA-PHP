<?php
/* function to log or insert event into the audit trail table starts here */
function log_event($conn, $svcNo, $action, $description, $account) {

    //get the current DateTime
    $dateTime = date('Y-m-d H:i:s');

    //create audit_id or event for the event
    $day = date('D');
    $month = date('F');
    $year = date('Y');
    $fmonth = substr($month, 0, 1);
    $fyear = substr($year, 2, 2);
    $fday = substr($day, 0, 1);
    $uniq = rand();
    $funiq = substr($uniq, 0, 2);
    $funiq1 = substr($uniq, 0, 1);
    $audit_id =  'ST'.$fmonth.$fday.$funiq1.$fyear.$funiq;

    // Prepare the SQL statement
    $auditTrailSql = "INSERT INTO audittrail (AUDIT_ID, SVC_NO, ACTION, DESCRIPTION, ACCOUNT, DATE_TIME) 
    VALUES ('$audit_id', '$svcNo', '$action', '$description', '$account', '$dateTime')";

     //Check whether record has been inserted successfully
    try{
            if ($conn->query($auditTrailSql) !== TRUE) {
                throw new Exception();
            }else{
                $successMessage = 'SUCCESSFUL!...';
            }
        }
    catch(Exception $ex)
            {   
               $failureMessage = 'OOPS...! FAILED.';
     
    }
}
/* function to log or insert event into the audit trail table ends */
?>