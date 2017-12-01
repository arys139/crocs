<?php 
 include '../../inc/CROCSLogin.php';

 //Get User
 include 'inc_fn_userid_enc.php'; 
 $U=$_GET['U']; 
 $userID = decrypt ($U);

 //Set variables 
 $USERID = $_POST['USERID'];
 $USERNAME = $_POST['USERNAME'];
 $ROLE = $_POST['ROLE'];
 $SYSTEM = $_POST['SYSTEM']; 
 $USER_ACCESS = $_POST['USER_ACCESS'];
 $DATE = date('d/m/Y');

 //Check whether record exist. If exist update else insert
 $sql = "SELECT USERID FROM USERS WHERE USERID = '".$USERID."'";
 $stid = oci_parse($cemdb, $sql);
 $result = oci_execute($stid);
 if (!$result) {
    echo "DB Error, could not query the database<br>";
    exit;
    }
 else {
     if ($row = oci_fetch_assoc($stid)) {
         echo "The user STAFF ID is already existed in the database. Please insert a new user information.";
     }
    else {
        $sql1 = "INSERT INTO USERS (USERID, USERNAME, ROLE, SYSTEM, USER_ACCESS) VALUES ('".$USERID."', '".$USERNAME."', '".$ROLE."', '".$SYSTEM."', '".$USER_ACCESS."')";
            
        $stid1 = oci_parse($cemdb, $sql1);
        $result1 = oci_execute($stid1);
        if (!$result1) {
           echo "DB Error, could not insert user to database<br>";
           }
        else{
           echo "The user information has been successfully added."; 
        }
    }
 } 

 ?> 
