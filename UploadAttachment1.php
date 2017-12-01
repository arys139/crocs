<html>
<body>
 <!--Query database and fill in values into html form-->
 <?php 
 include '../../inc/CROCSLogin.php'; 
 //Get CE_Hostname  
 $CROCS_ORDER_SVC_ID=$_GET['CE_Hostname']; 

 //Get User and Role. If Role is Guest protect all field except Contact Information  
 $U=$_GET['U']; 
 $Role=$_GET['R']; 

 ?> 

<form action="ProcessUploadAttachment1.php?CE_Hostname=<?php echo $CROCS_ORDER_SVC_ID.'&U='.$U; ?> " method="post"
enctype="multipart/form-data">
<table border='1'>
<tr><td style='background-color:#E0E0E0;'><label for="file">Filename:</label></td>
<td><input type="file" name="file" id="file"></td></tr>
<tr><td colspan='2' align='center'><input type="submit" name="submit" value="Upload"></td></tr>
</table>
</form>

</body>
</html> 
