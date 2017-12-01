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
	
	.header
	{
		position:relative;
		text-shadow:#FF4346;
		font-size:12px;
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
	}

</style>
 
 <title>Upload Attachment</title> 
 </head> 

 <body> 

 <h2>Upload Attachment</h2><p> 

 <!--Query database and fill in values into html form-->
 <?php 
 include '../../inc/CROCSLogin.php'; 
 //Get CE_Hostname  
 $CROCS_ORDER_SVC_ID=$_GET['CE_Hostname']; 
 //Get User
 include 'inc_fn_userid_enc.php'; 
 $U=$_GET['U']; 
 $userID = decrypt ($U);
 
 date_default_timezone_set('Asia/Kuala_Lumpur'); 

//Get the highest version
$sql = "SELECT MAX(CROCS_FILE_VERSION) AS MAX_VERSION FROM DATA_MAPPING_CROCS_ATTACHMENT WHERE CROCS_ATTACHMENT_TYPE = 'CA' AND CROCS_LV_NUMBER = '".$CROCS_ORDER_SVC_ID."'";
$stid = oci_parse($cemdb, $sql);
$result = oci_execute($stid);
 if (!$stid) {
    echo "DB Error, could not query the database<br>";
    exit;
    }
 else {
    if ($row = oci_fetch($stid))
    {
        $MAX_VERSION = $row['MAX_VERSION'];
    }
 }

 if ($MAX_VERSION > 1){
        $MAX_VERSION = $MAX_VERSION + 1;}
 else{
        $MAX_VERSION = 1;}
 

$filename = $_FILES["file"]["name"];

//Convert blanks and reserved characters within filename 
$cleanfilename = str_replace('&', ' and ', $filename);
$cleanfilename = str_replace('#', '', $cleanfilename);
$cleanfilename = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $cleanfilename);
//$cleanfilename = str_replace(' ', '_', $cleanfilename);

if ($_FILES["file"]["size"] < 262144) //kB
  {
	if ($_FILES["file"]["error"] > 0)
    {
		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
	else
    {
		move_uploaded_file($_FILES["file"]["tmp_name"],"attachment/" . $filename);
		$tmpName = "attachment/" . $filename;
		$fp      = fopen($tmpName, 'rb');
		$content = fread($fp, filesize($tmpName));
		$sql = "INSERT INTO DATA_MAPPING_CROCS_ATTACHMENT(CROCS_LV_NUMBER, CROCS_FILE_VERSION, CROCS_FILE_NAME, CROCS_UPLOAD_DATE, CROCS_UPLOADER_ID, CROCS_FILE_UPLOADED, CROCS_ATTACHMENT_TYPE) VALUES ('".$CROCS_ORDER_SVC_ID."', '".$MAX_VERSION."', '".$cleanfilename."', CURRENT_TIMESTAMP, '".$userID."', EMPTY_BLOB(), 'CA') RETURNING CROCS_FILE_UPLOADED INTO :CROCS_FILE_UPLOADED";
		$stid = oci_parse($cemdb, $sql);
		$Blob = oci_new_descriptor($cemdb, OCI_D_LOB);
		oci_bind_by_name($stid, ':CROCS_FILE_UPLOADED', $Blob, -1, OCI_B_BLOB);

		$result = oci_execute($stid, OCI_DEFAULT);
		 if ($Blob->savefile($tmpName)){
			oci_commit($cemdb);
			echo '<div class="header">';
			echo "<br><big>Upload '".$filename."' as attachment for <b>".$CROCS_ORDER_SVC_ID."</b> succcessful</big>.";
			echo '</div>';
		 }else{
			 echo '<div class="header">';
			 echo "<br><big>Upload '".$filename."' as attachment for <b>".$CROCS_ORDER_SVC_ID."</b> fail</big>.";
			 echo '</div>';
		 }
		oci_free_descriptor($Blob);
		fclose($fp);
    /*if (!$stid) {
    echo "DB Error, could not query the database<br>";
    exit;
    }
    echo "<br><big>Upload '".$filename."' as attachment for <b>".$CE_HOSTNAME."</b> succcessful</big>.";
    */
    }
  }
else
  {
	  echo '<div class="header">';
	  echo "Please limit your file size up to 256kB only. Current size of ".$filename." is ".$_FILES["file"]["size"]." bytes.";
	  echo '</div>';
  }

 ?> 

 </body> 
 </html> 
