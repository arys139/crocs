<?php 
 //MySQL Database Connect
 include 'datalogin.php'; 

 //Check whether record exist. If exist update else insert
// $sql = 'SELECT CE_Hostname, filename, version FROM data_mapping_ext3 where filename like "%#%"';
 $sql = 'SELECT CE_Hostname, filename, version FROM data_mapping_ext2';
 $result = mysql_query($sql, $cemdb);
 if (!$result) {
    echo "DB Error, could not query the database<br>";
    echo 'MySQL Error: ' . mysql_error();
    exit;
    }
 while ($row = mysql_fetch_assoc($result)) {
    $CE_Hostname = $row['CE_Hostname'];
    $filename = $row['filename'];
    $version = $row['version'];
    $cleanfilename = str_replace('#', '', $filename);
    $sql1 = "UPDATE data_mapping_ext3 SET filename = '$cleanfilename' where CE_Hostname = '$CE_Hostname' and version = $version";
//    $result1 = mysql_query($sql1, $cemdb);
//    echo "<br>".$filename." change to ".$sql1;
    echo "<br>".$CE_Hostname."version ".$version."filename : ".$filename." change to ".$cleanfilename;
    }

 Print "Your information has been successfully updated."; 

 ?> 
