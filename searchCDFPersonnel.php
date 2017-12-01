<html> 
 <head><title>Update CE</title> 

<script type="text/javascript">
   function upd_selection()
   {
   document.filter.contains.checked=true;
   }
   </script>

</head> 

 <body> 

 <h2>Search CDF Personnel By Name/Staff ID</h2><p>
<?php

//MySQL Database Connect
 include 'datalogin.php'; 
 include 'inc_fn_userid_enc.php';

$U=$_GET['U']; 
$userID = decrypt ($U); 
$CE_Hostname=$_GET['CE_Hostname']; 
$filterNAME_contains_Val="";
$filterSTAFFID_contains_Val="";

if (isset($_COOKIE["optionCDF1"])) {
  if ($_COOKIE["optionCDF1"]=="NAME") {
     $filterNAME_contains_Val = "checked";
     $filterSTAFFID_contains_Val = "";}
  if ($_COOKIE["optionCDF1"]=="STAFF_ID") {
     $filterNAME_contains_Val = "";
     $filterSTAFFID_contains_Val = "checked";}
  }
else {
     $filterNAME_contains_Val = "checked";
     $filterSTAFFID_contains_Val = "";}
 
if (isset($_COOKIE["Sel_Field_Value1"])) {
   $Sel_Field_Value1 = "value=".$_COOKIE["Sel_Field_Value1"];}
else {
   $Sel_Field_Value1 = "";}

if (isset($_COOKIE["Sel_Field_Value2"])) {
   $Sel_Field_Value2 = "value=".$_COOKIE["Sel_Field_Value2"];}
else {
   $Sel_Field_Value2 = "";}

echo '<form name="filter" action="processSearchCDFPersonnel.php?CE_Hostname='.$CE_Hostname.'&U='.$U.'" method="post"> 
<table border="1"> 
<tr><td>Search By:</td>
<td><table border="0"><tr><td><input type="radio" name = "filter1" id="NAME" value="NAME" '?> <?php echo $filterNAME_contains_Val; ?> <?php echo '> Name contains </td><td><input type="text" name="Sel_Field_Value1" '?> <?php echo $Sel_Field_Value1; ?> <?php echo 'onFocus="upd_selection()" /></td></tr></table></td>
<tr><td></td><td><table border="0"><tr><td><input type="radio" name = "filter1" id="STAFF_ID" value="STAFF_ID" '?> <?php echo $filterSTAFFID_contains_Val; ?> <?php echo '> Staff ID starts with </td><td><input type="text" name="Sel_Field_Value2" '?> <?php echo $Sel_Field_Value2; ?> <?php echo 'onFocus="upd_selection()" /></td></tr></table></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="Search_Button" value="Search" /></td></tr>
</table>';

?>

 </body> 
 </html> 
