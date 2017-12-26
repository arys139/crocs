<!DOCTYPE html>
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
	
	/* Back Button */
	.backbutton {
		background-color: #e7e7e7; /* grey */
		border: none;
		color: black;
		text-align: center;
		text-decoration: none;
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman",
		Verdana, serif, Arial;	
		font-size:13px;		
		float: left;	
		padding: 5px 15px;

		border-radius: 5px;
		
		position: relative;
		bottom: 10px;
		
		-webkit-transition-duration: 0.2s; /* Safari */
		transition: all 0.5s;	
		
		display: inline-block;
		cursor: pointer;
	}

	.backbutton span{
		cursor: pointer;
		display: inline-block;
		position: relative;
		transition: 0.5s;
	}

	.backbutton span:after{
		content: '\00ab'; /*glyphs*/
		position: absolute;
		opacity: 0;
		top: 0;
		left: 20px; /* original: right: 50px; */
		transition: 0.5s;
	}

	.backbutton:hover span{
		padding-left: 25px; /*original: padding-right: 25px; */
	}

	.backbutton:hover span:after{
		opacity: 1;
		left: 0; /* original: right: 0; */
	}
	/* End Back Button */

</style>
 <title>Upload Attachment</title> 
 </head> 

 <body> 

 <h2>Upload Attachment</h2>

 <!--Query database and fill in values into html form-->
 <?php 
 include '../../inc/CROCSLogin.php'; 
 //Get CE_Hostname  
 $CROCS_ORDER_SVC_ID=$_GET['CE_Hostname']; 
 //Get User
 include 'inc_fn_userid_enc.php'; 
 $U=$_GET['U']; 
 $userID = decrypt ($U);

 //echo "<a class='backbutton' href='UpdCE.php?CE_Hostname=".$CROCS_ORDER_SVC_ID."&R=U&U=".$U."'><span>Back</span></a>";
 //echo "<button class='backbutton' style='vertical-align:middle'><a href='UpdCE.php?CE_Hostname=".$CROCS_ORDER_SVC_ID."&R=U&U=".$U."'>Back</a></button>";
 //echo "<h2>Upload Attachment</h2>";

//Get the highest version
$sql = "SELECT MAX(CROCS_FILE_VERSION) AS MAX_VERSION FROM DATA_MAPPING_CROCS_ATTACHMENT WHERE CROCS_LV_NUMBER = '".$CROCS_ORDER_SVC_ID."'";
$stid = oci_parse($cemdb, $sql);
$result = oci_execute($stid);
 if (!$stid) {
    echo "DB Error, could not query the database<br>";
    exit;
    }

 if ($row = oci_fetch($stid)){
        $MAX_VERSION = $row["MAX_VERSION"] + 1;}
    else{
        $MAX_VERSION = 1;}

$filename = $_FILES["file"]["name"];

//Convert blanks and reserved characters within filename 
$cleanfilename = str_replace('&', ' and ', $filename);
$cleanfilename = str_replace('#', '', $cleanfilename);
$cleanfilename = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $cleanfilename);
//$cleanfilename = str_replace(' ', '_', $cleanfilename);
//if ($_FILES["file"]["size"] < 32769)
if ($_FILES["file"]["size"] < 3000000) //1000000B = 1M
{
	switch($_FILES["file"]["error"])
	{
		case UPLOAD_ERR_OK:
			move_uploaded_file($_FILES["file"]["tmp_name"],"attachment/" . $filename);
			$tmpName = "attachment/" . $filename;
			$fp      = fopen($tmpName, 'rb');
			$content = fread($fp, filesize($tmpName));
			$sql = "INSERT INTO DATA_MAPPING_CROCS_ATTACHMENT(CROCS_LV_NUMBER, CROCS_FILE_VERSION, CROCS_FILE_NAME, CROCS_UPLOAD_DATE, CROCS_UPLOADER_ID, CROCS_FILE_UPLOADED, CROCS_ATTACHMENT_TYPE) VALUES ('".$CROCS_ORDER_SVC_ID."', '$MAX_VERSION', '".$cleanfilename."', CURRENT_TIMESTAMP, '$userID', EMPTY_BLOB(), 'HA') RETURNING CROCS_FILE_UPLOADED INTO :CROCS_FILE_UPLOADED";
			$stid = oci_parse($cemdb, $sql);
			$Blob = oci_new_descriptor($cemdb, OCI_D_LOB);
			oci_bind_by_name($stid, ':CROCS_FILE_UPLOADED', $Blob, -1, OCI_B_BLOB);

			$result = oci_execute($stid, OCI_DEFAULT);
			 if ($Blob->savefile($tmpName))
			 {
				oci_commit($cemdb);
				
				echo '<div class="header">';
				echo "<br><big>Upload '".$filename."' as attachment for <b>".$CROCS_ORDER_SVC_ID."</b> succcessful</big>.";
				echo '</div>';
				}
			 else{
				 echo '<div class="header">';
				 echo "<br><big>Upload '".$filename."' as attachment for <b>".$CROCS_ORDER_SVC_ID."</b> fail</big>.";
				 echo '</div>';
				}
			 oci_free_descriptor($Blob);
			 fclose($fp);	
		break;
		
		case UPLOAD_ERR_INI_SIZE: 
			echo "Return Code " . $_FILES["file"]["error"] . ": The uploaded file exceeds the upload max filesize" . "<br>";			
        break; 
		case UPLOAD_ERR_FORM_SIZE: 
			echo "Return Code " . $_FILES["file"]["error"] . ": The uploaded file exceeds max file size specified" . "<br>";			
        break;
		case UPLOAD_ERR_NO_FILE: 
			echo "Return Code " . $_FILES["file"]["error"] . ": No file was uploaded" . "<br>";			
        break;
		case UPLOAD_ERR_CANT_WRITE: 
			echo "Return Code " . $_FILES["file"]["error"] . ": Failed to write file to disk" . "<br>";			
        break;
		default: 
			echo "Return Code " . $_FILES["file"]["error"] . ": Unknown upload error" . "<br>";			
        break;	
	}
}
else
{
	echo '<div class="header">';
    echo "Please limit your file size up to 3MB only. Current size of ".$filename." is ".$_FILES["file"]["size"]." bytes.";
	echo '</div>';
}
	echo "<br>";
	echo "<a class='backbutton' href='UpdCE.php?CE_Hostname=".$CROCS_ORDER_SVC_ID."&R=U&U=".$U."'><span>Back</span></a>";
  

 ?> 

 </body> 
 </html> 
