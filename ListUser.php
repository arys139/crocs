<?php 
 //Allow program to run for up to 100 seconds.
 //set_time_limit(100);
 ini_set('memory_limit', '-1');
 ini_set('max_execution_time', 300);
  
 include '../../inc/CROCSLogin.php'; 

 include 'inc_fn_userid_enc.php'; 

 //Authorization check
 if (!isset($_GET['U'])) {
    header('Location: index.php');
    } 
 else {
    $U = $_GET['U'];
    $userID = decrypt($U);
      
   $sql = "SELECT USERNAME, ROLE FROM USERS WHERE USERID = '".$userID."' AND (SYSTEM = 'CROCS' OR SYSTEM = 'ALL')";      
   $stid = oci_parse($cemdb, $sql);
   
   if(!$stid) {
    echo "An error occurred in parsing the sql string.\n";
    exit;} 
   else{
    oci_define_by_name($stid, 'USERNAME', $name);
    oci_define_by_name($stid, 'ROLE', $role);
    oci_execute($stid);}
    
   if ($row = !oci_fetch($stid)){
        $name = "GUEST";
        $role = "GUEST";
   }
}
 ?>    
 <form name="frmMain" action="deleteUser.php" method="post" OnSubmit="return onDelete();">
 <?php
 $sql1 = "SELECT USERID, USERNAME, ROLE, SYSTEM, USER_ACCESS FROM USERS WHERE (SYSTEM = 'CROCS' OR SYSTEM = 'ALL') GROUP BY USERID, USERNAME, ROLE, USER_ACCESS, SYSTEM";   
 $stid1 = oci_parse($cemdb, $sql1);
 if(!$stid1) {
    echo "An error occurred in parsing the sql string.\n";
    exit;} 

 else {
	oci_define_by_name($stid1, 'USERID', $USERID); 	
 	oci_define_by_name($stid1, 'USERNAME', $USERNAME);
	oci_define_by_name($stid1, 'ROLE', $ROLE);
	oci_define_by_name($stid1, 'SYSTEM', $SYSTEM);
	oci_define_by_name($stid1, 'USER_ACCESS', $USER_ACCESS);

	oci_execute($stid1);
 }

 //Page header & remarks
 echo '<h2>Users List</h2>'; 
 //echo '*Only Administrator with SUPER access can add new user to Administrator role <p>';
 //Prepare table
 echo "<table border='1' align='center'><tr>";
 echo "<td style='background-color:#FFA500;' align='center'>USER ID</td>";
 echo "<td style='background-color:#FFA500;' align='center'>USER NAME</td>";
 echo "<td style='background-color:#FFA500;' align='center'>USER ROLE</td>"; 
 echo "<td style='background-color:#FFA500;' align='center'>USER ACCESS</td>";
 echo "<td style='background-color:#FFA500;' align='center'>DELETE?</th>"; 
 echo "</tr>";
 
//while (($row = oci_fetch_array($stid1, OCI_BOTH)) != false) {
while (($row = oci_fetch_array($stid1)) != false) {
    
    $USERID = $row['USERID'];    
    $USERNAME = $row['USERNAME'];
	$ROLE = $row['ROLE'];    
	$SYSTEM = $row['SYSTEM'];
	$USER_ACCESS = $row['USER_ACCESS'];

    $stringData = "<tr><td>".$USERID."</td><td>".$USERNAME."</td><td align='center'>".$ROLE;
    $stringData = $stringData."</td><td align='center'>".$USER_ACCESS."</td>";
    if ($SYSTEM == "ALL"){
        $stringData = $stringData."<td align='center'></td>";
    }
    else{
        $stringData = $stringData."<td align='center'><input type='checkbox' name='chkDel[]' value='".$USERID."'></td>";
    }
    $stringData = $stringData."</tr>";
    echo $stringData; 
    }  
echo "<tr><td align='center' colspan='5'><input type='submit' name='btnDelete' value='Delete'></td></tr>"; 
 echo "<tr><td align='center' colspan='5'><a href='addUser.php?U='.$U.''>Add New Administrator</a></td></tr>"; 
 echo "</table><br>";
 ?> 
 </form>
 
 <html> 
 <head><title>List CE</title> 
   <style type="text/css">
   
   h2
	{
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
		font-size:15px;
		text-align:center;
		
		width:100%;
		height:20px;
		background: #FFFFFF;
		margin:20px auto;
		box-shadow: 0 10px 6px -6px #777;
	}
	
	table
	{
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
		font-size:12px;
	}
   </style>
 </head>
 </html>
