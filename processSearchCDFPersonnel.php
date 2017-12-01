<?php
//MySQL Database Connect
 include 'datalogin.php';
 include 'inc_fn_userid_enc.php';

$U=$_GET['U']; 
$userID = decrypt ($U); 

$Search_Button=$_POST['Search_Button'];
//$SEARCH_CDF_PERSONNEL=$_POST['SEARCH_CDF_PERSONNEL']; 
$CE_Hostname=$_GET['CE_Hostname']; 
$optionCDF1 = $_POST['filter1'];
$Sel_Field_Value1 = $_POST['Sel_Field_Value1'];
$Sel_Field_Value2 = $_POST['Sel_Field_Value2'];
setcookie("optionCDF1", $optionCDF1, time()+7200);   
setcookie("Sel_Field_Value1", $Sel_Field_Value1, time()+7200);  
setcookie("Sel_Field_Value2", $Sel_Field_Value2, time()+7200);

echo "<h3>Search - CDF Personnel</h3>";

/*if ($Sel_Field_Value1=="") {
    echo "Validation Error, field <b>'Name'</b> is blank<br>";
    exit;
    }

if ($Sel_Field_Value2=="") {
    echo "Validation Error, field <b>'Staff ID'</b> is blank<br>";
    exit;
    }*/
//echo "Connecting ...";
$ds=ldap_connect("tmldap.intra.tm");  

if ($ds) { 
//    echo "Binding ..."; 
    $r=ldap_bind($ds);     // this is an "anonymous" bind, read-only access

if ($optionCDF1 == "NAME") {
    $sn = "sn=*".$Sel_Field_Value1."*";
    // Search surname entry
    $justthese = array("sn", "uid");
    $sr=ldap_search($ds, "o=telekom", $sn, $justthese); 

$info = ldap_get_entries($ds, $sr);
    ldap_sort($ds, $sr, 'sn');
    $info = ldap_get_entries($ds, $sr);
    echo "Select one from " . $info["count"] . " personnels that contains ".$Sel_Field_Value1.":<p>";


echo "<form action='processSearchCDFPersonnel2.php?CE_Hostname=".$CE_Hostname."&U=".$U."' method='post'> 
<table border='0'><tr><td></td><td>Name</td><td>Staff ID</td></tr>";
    for ($i=0; $i<$info["count"]; $i++) {
echo "<tr><td><input type='radio' name ='CDF_Personnel_Name' value='".$info[$i]["sn"][0]."' /></td><td>". $info[$i]["sn"][0] ."</td><td>". $info[$i]["uid"][0] ."</td></tr>";
//        echo "Name is: " . $info[$i]["sn"][0] . "<br /><hr />";
    }
}

if ($optionCDF1 == "STAFF_ID") {
    $uid = "uid=".$Sel_Field_Value2."*";
    // Search staff ID entry
    $justthese = array("sn", "uid");
    $sr=ldap_search($ds, "o=telekom", $uid, $justthese); 
    ldap_sort($ds, $sr, 'sn');
    $info = ldap_get_entries($ds, $sr);

    echo "Select one from " . $info["count"] . " personnels that contains ".$Sel_Field_Value2.":<p>";


echo "<form action='processSearchCDFPersonnel2.php?CE_Hostname=".$CE_Hostname."&U=".$U."' method='post'> 
<table border='0'><tr><td></td><td>Name</td><td>Staff ID</td></tr>";
    for ($i=0; $i<$info["count"]; $i++) {
echo "<tr><td><input type='radio' name ='CDF_Personnel_Name' value='".$info[$i]["sn"][0]."'/></td><td>".$info[$i]["sn"][0]."</td><td>".$info[$i]["uid"][0]."</td></tr>";
//        echo "Name is: " . $info[$i]["sn"][0] . "<br /><hr />";
    }
}

echo "<tr><td colspan='2' align='center'><input type='submit' name='Add_Button' value='Submit' /></td></tr>";
echo "</table>";

//    echo "Closing connection";
    ldap_close($ds);


echo "<br>Click <a href='searchCDFPersonnel.php?CE_Hostname=".$CE_Hostname."&U=".$U."'>HERE</a> to search a new name.";

} else {
    echo "<h4>Unable to connect to LDAP server</h4>";
}
?>
