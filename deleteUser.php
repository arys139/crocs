<?php
 include '../../inc/CROCSLogin.php';
 
if($_POST["chkDel"] != "")  
{ 
    for($i=0;$i<count($_POST["chkDel"]);$i++)  
    {   
        $sql1 = "DELETE FROM USERS WHERE USERID = '".$_POST["chkDel"][$i]."' ";  
        $stid1 = oci_parse($cemdb, $sql1);  
        $objExecute = oci_execute($stid1, OCI_DEFAULT);
         
    }  
    echo "Your selected record(s) has been deleted.";    
}  
else
{
    echo "You have not checked a single box. Please select a box to delete.";  
}
  
oci_commit($cemdb); //*** Commit Transaction ***//   
?> 