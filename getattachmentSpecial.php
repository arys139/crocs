<html> 
 <head><title>Download Attachments</title> 
 </head> 

 <body> 

 <h2>Get Attachment</h2><p> 

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
 F =  GetParam('F');
 V =  GetParam('V');

 </SCRIPT>

 <!--Query database and fill in values into html form-->
 <?php 
 include '../../inc/CROCSLogin.php';
 //Get CE_Hostname and other parameters 
 $CE_HOSTNAME=$_GET['CE_Hostname']; 
 $filename=$_GET['F']; 
 $version=$_GET['V']; 

$cleanfilename = str_replace('&', ' and ', $filename);
$cleanfilename = str_replace('#', '', $cleanfilename);
$cleanfilename = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $cleanfilename);

 //Search database
 $sql = "SELECT ATTACHMENT, FILENAME, dbms_lob.getlength(ATTACHMENT) AS COLUMNSIZE ";
 $sql = $sql."FROM CROCS_ATTACH_UNKNOWN WHERE FILENAME = '".$cleanfilename."' AND CE_HOSTNAME = '".$CE_HOSTNAME."'";
 $stid = oci_parse($cemdb, $sql);  
 $result = oci_execute($stid, OCI_DEFAULT);
 $Blob = oci_new_descriptor($cemdb, OCI_D_LOB);
 //oci_bind_by_name($stid, 'CROCS_FILE_UPLOADED', $Blob, -1, OCI_B_BLOB);
 
  if (!$stid) {
    echo "DB Error, could not query the database<br>";
    exit;
    }
 while ($row = oci_fetch_assoc($stid) ) {
    // Call the load() method to get the contents of the LOB
    $CROCS_FILE_UPLOADED = $row['ATTACHMENT']->load();
    file_put_contents('attachment/'.$cleanfilename, $CROCS_FILE_UPLOADED);
    $file = 'attachment/'.$cleanfilename;
}
 $tmp = explode(".",$cleanfilename); 
 switch ($tmp[count($tmp)-1]) 
{ 
  case "pdf": $ctype="application/pdf"; break; 
  case "exe": $ctype="application/octet-stream"; break; 
  case "zip": $ctype="application/zip"; break; 
  case "docx": 
  case "doc": $ctype="application/msword"; break; 
  case "csv": 
  case "xls": 
  case "xlsx": $ctype="application/vnd.ms-excel"; break; 
  case "ppt": $ctype="application/vnd.ms-powerpoint"; break; 
  case "gif": $ctype="image/gif";break; 
  case "png": $ctype="image/png";break; 
  case "jpeg": 
  case "jpg": $ctype="image/jpg";break; 
  case "tif": 
  case "tiff": $ctype="image/tiff"; break; 
  case "psd": $ctype="image/psd";break; 
  case "bmp": $ctype="image/bmp";break; 
  case "ico": $ctype="image/vnd.microsoft.icon"; break; 
  default: $ctype="application/octet-stream"; 
} 
     
    header('Content-Description: File Transfer');
    header("Pragma: public"); // required&nbsp;
    header("Expires: 0"); 
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
    header("Cache-Control: private",false); //&nbsp;required for certain browsers 
    header("Content-Type: ".$ctype); 
    header("Content-Disposition: attachment; filename=".basename($file)); 
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".filesize($file)); 
    ob_clean(); 
    flush(); 
    readfile($file);
    exit;
 ?> 

 </body> 
 </html> 
