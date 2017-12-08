<html>
<head>
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
	</style>
</head>
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

<h2>Upload Attachment</h2>

<form action="ProcessUploadAttachment1.php?CE_Hostname=<?php echo $CROCS_ORDER_SVC_ID.'&U='.$U; ?> " method="post"
enctype="multipart/form-data">
<table border='1' align='center'>
<tr><td style='background-color:#E0E0E0;'><label for="file">Filename:</label></td>
<td><input type="file" name="file" id="file"></td></tr>
<tr><td colspan='2' align='center'><input type="submit" name="submit" value="Upload"></td></tr>
</table>
</form>

</body>
</html> 
