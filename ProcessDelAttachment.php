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
 
 <title>Update CE</title> 
 </head> 

 <body> 

 <h2>Delete Attachment</h2><p> 

 <!--Query database and fill in values into html form-->
 <?php 
 include '../../inc/CROCSLogin.php'; 
 //Get CE_Hostname and other parameters 
 $CE_HOSTNAME=$_GET['CE_Hostname']; 
 $filename=$_GET['F']; 
 $version=$_GET['V']; 
 $U=$_GET['U']; 

 //Search database
 $sql = "DELETE FROM DATA_MAPPING_CROCS_ATTACHMENT WHERE CROCS_ATTACHMENT_TYPE = 'CA' AND CROCS_FILE_NAME = '".$filename."' AND CROCS_LV_NUMBER = '".$CE_HOSTNAME."'";
 $stid = oci_parse($cemdb, $sql);
 oci_execute($stid);
 if (!$stid) {
    echo "DB Error, could not query the database<br>";
    exit;
    }
 else {
 echo "Attachment successfuly removed. Click <a href='UpdCE.php?CE_Hostname=".$CE_HOSTNAME."&R=U&U=".$U."'>here</a> to continue.";
}
 ?> 

 </body> 
 </html> 
