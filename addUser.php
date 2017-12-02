<?php include '../../inc/CROCSLogin.php';  ?>

<html> 
 <head><title>Add New Administrator</title> 
   <script type="text/javascript">

   function upd_USER_ACCESS(x)
   {
   document.getElementById("USER_ACCESS").setAttribute("value",x);
   }
  </script>
  <script>
   <script language="javascript" type="text/javascript" src="datetimepicker.js"></script>

 </head> 

 <body> 

 <h2>Add New Administrator Information</h2><p> 

 <SCRIPT LANGUAGE="Javascript">

 //Function to get passing parameters
 function GetParam(name)
 {
 var start=location.search.indexOf("?"+name+"=");
 if (start<0) start=location.search.indexOf("&"+name+"=");
 if (start<0) return '';
 start += name.length+2;
 var end=location.search.indexOf("&",start)-1;
 if (end<0) end=location.search.length;
 var result=location.search.substring(start,end);
 var result='';
 for(var i=start;i<=end;i++) {
 var c=location.search.charAt(i);
 result=result+(c=='+'?' ':c);
 }
 return unescape(result);
 }

 CE_Hostname = GetParam('CE_Hostname');
 ROLE =  GetParam('R');

 </SCRIPT>
 
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

 <!--Query database and fill in values into html form-->
 <?php 
include '/../../inc/CROCSLogin.php'; 
 //Get CE_Hostname  
 //$CE_Hostname=$_GET['CE_Hostname']; 

 //Get User and Role. If Role is Guest protect all field except Contact Information  
 $U=$_GET['U']; 
 //$Role=$_GET['R']; 
 /*if ($Role == 'U') {
    $disable = '';
    $readonly = '';}
 else {
    $disable = ' disabled ';
    $readonly = ' style="background-color:#FFF8C6;" readonly="true" ';}*/

 $disable = ' disabled ';
 $readonly = ' style="background-color:#FFF8C6;" readonly="true" ';

 $sql4 = "SELECT DISTINCT USER_ACCESS FROM USERS ORDER BY USER_ACCESS ASC";
 $stid4 = oci_parse($cemdb, $sql4);
 oci_execute($stid4);
 if (!$stid4) {
   echo "DB Error, could not query the database<br>";
   exit;
    }
 $list1 = '';
 while (($row4 = oci_fetch_array($stid4)) != false) {
          $list1 = $list1.'<option value="'.$row4["USER_ACCESS"].'">'.$row4["USER_ACCESS"].'</option>';
          };

 //Create Form
 echo '
 <form action="processAddUser.php?U='.$U.'" method="post"> 
 <table border="1" align="center"> 
<tr><td style="background-color:#FFF8C6;">STAFF ID:</td><td colspan="2"><input size="20" type="text" id="USERID" name="USERID" value=""></td></tr>
<tr><td style="background-color:#FFF8C6;">STAFF NAME:</td><td colspan="2"><input size="60" type="text" id="USERNAME" name="USERNAME" value=""></td></tr>
<tr><td style="background-color:#FFF8C6;">USER ROLE:</td><td colspan="2"><input size="20" style="background-color:#FFF8C6;" readonly="true" type="text" id="ROLE" name="ROLE" value="Administrator"></td></tr>
<tr><td style="background-color:#FFF8C6;">USER SYSTEM:</td><td colspan="2"><input size="20" style="background-color:#FFF8C6;" readonly="true" type="text" id="SYSTEM" name="SYSTEM" value="CROCS"></td></tr>

 <!--Protect input field and create drop down list-->
 <tr><td style="background-color:#FFF8C6;">USER ACCESS :</td><td><input size="20" style="background-color:#FFF8C6;" readonly="true" type="text" id="USER_ACCESS" name="USER_ACCESS" value=""></td>
     <td><select onchange="upd_USER_ACCESS(value)">
       <option value="">Please select User Access</option>
       <option value="SUPER">SUPER</option>
       <option value="NORMAL">NORMAL</option>
       </select></td> 
</tr>

 ';  ?> 

 <?php echo '
 <tr><td colspan="3" align="center"><input type="submit" name="Upd_Button" value="Add" /></td></tr> 
 </table> 
 </form><br>

 ';

 ?> 


 </body> 
 </html> 
