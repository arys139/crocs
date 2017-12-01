<?php

//MySQL Database Connect
 include 'datalogin.php';
 include 'inc_fn_userid_enc.php';

$U=$_GET['U']; 
$userID = decrypt ($U); 

/*if (isset($_POST['CDF_Personnel_Name'])) // if ANY of the options was checked
  echo $_POST['CDF_Personnel_Name']; // echo the choice
else
  echo "nothing was selected.";*/


$Add_Button=$_POST['Add_Button'];
$CDF_Personnel_Name = $_POST['CDF_Personnel_Name'];
$CE_Hostname=$_GET['CE_Hostname']; 

echo "<h3>Search - CDF Personnel</h3>";

//Check whether record exist. If exist update else insert
 $sqlCheck = 'SELECT CE_Hostname FROM data_mapping_ext1 where CE_Hostname = "'.$CE_Hostname.'"';
 $resultCheck = mysql_query($sqlCheck, $cemdb);
 if (!$resultCheck) {
    echo "DB Error, could not query the database<br>";
    echo 'MySQL Error: ' . mysql_error();
    exit;
    }
 if ($rowCheck = mysql_fetch_assoc($resultCheck)) {
    $RecordExist = 'Y';}
 else {
    $RecordExist = 'N';}

//Perform the update
if ($RecordExist == 'Y') {
 $sql = 'UPDATE data_mapping_ext1 SET CDF_Personnel="'.$CDF_Personnel_Name.'" where CE_Hostname="'.$CE_Hostname.'"';
}
else {
 $sql = "INSERT INTO data_mapping_ext1 VALUES ('$CE_Hostname', '', '', NOW(), '$CDF_Personnel_Name', '', '', '', '', '', '', '', '', '', '', NOW(), NOW(), '$userID','')";
}

 $result = mysql_query($sql, $cemdb);

 if (!$result) {
    echo "DB Error, could not update CE to database<br>";
    echo "MySQL Error: " . mysql_error();
    exit;
    }

 echo "Your CDF Personnel has been successfully inserted."; 

 echo "Click <a href='UpdCE.php?CE_Hostname=".$CE_Hostname."&R=U&U=".$U."'>here</a> to continue.";
?>
