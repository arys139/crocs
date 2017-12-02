<!DOCTYPE html> 
 <head><title>Download Attachments</title> 
 </head> 

 <body> 

 <h2>Download Unknown LV Attachments</h2><p> 
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

 <!--Query database and fill in values into html form-->
 <?php 
 include '../../inc/CROCSLogin.php'; 

 //Get User and Role. If Role is Guest protect all field except Contact Information  
 $U=$_GET['U']; 

 //Get Configuration Attachment
 $sqlAttach = "SELECT CE_HOSTNAME, VERSION, FILENAME, TRANSACTION_DATE, USERID, TYPE, dbms_lob.getlength(ATTACHMENT) AS COLUMNSIZE ";
 $sqlAttach = $sqlAttach."FROM CROCS_ATTACH_UNKNOWN";
 $stidAttach = oci_parse($cemdb, $sqlAttach);
 oci_execute($stidAttach);
 if (!$stidAttach) {
    echo 'DB Error, could not query the database<br>';
    exit;
    }
 else {
	oci_define_by_name($stidAttach, 'CE_HOSTNAME', $CROCS_LV_NUMBER);
	oci_define_by_name($stidAttach, 'VERSION', $CROCS_FILE_VERSION);
	oci_define_by_name($stidAttach, 'FILENAME', $CROCS_FILE_NAME);
	oci_define_by_name($stidAttach, 'TRANSACTION_DATE', $CROCS_UPLOAD_DATE);
	oci_define_by_name($stidAttach, 'USERID', $CROCS_UPLOADER_ID);
	oci_define_by_name($stidAttach, 'ATTACHMENT', $CROCS_FILE_UPLOADED);
	oci_define_by_name($stidAttach, 'TYPE', $CROCS_ATTACHMENT_TYPE);
    oci_define_by_name($stidAttach, 'COLUMNSIZE', $COLUMNSIZE);
 }
 //$attachment = '<table border="1">';
 $attachment = '';
 $attachmentcnt = 0;
 $testAttachment = 'N';
while (($rowAttach = oci_fetch_array($stidAttach)) != false) {
    $attachmentcnt = $attachmentcnt + 1;
    $testAttachment = 'Y';
    $oracle_timestamp = (string) $rowAttach["TRANSACTION_DATE"];
    //$formatDate = DateTime::createFromFormat('d-M-y h.i.s.u A', $oracle_timestamp);
    //$formatDate = $formatDate->format('d/m/Y H:i:s A');
    $attachment = $attachment.'<tr><td>'.$attachmentcnt.'</td>';
    $attachment = $attachment.'<td><a href="getattachmentSpecial.php?CE_Hostname='.$rowAttach["CE_HOSTNAME"].'&F='.$rowAttach["FILENAME"].'&V='.$rowAttach["VERSION"].'&U='.$U.'">'.$rowAttach["FILENAME"].'</a></td>';
//    $attachment = $attachment.'<td>'.date("d-M-Y H:i:s", strtotime($rowAttach["CROCS_UPLOAD_DATE"])).'&nbsp</td><td>&nbsp'.$rowAttach["COLUMNSIZE"].'B&nbsp</td>';
    $attachment = $attachment.'<td>'.$rowAttach["TYPE"].'&nbsp</td>';
    $attachment = $attachment.'<td>'.$rowAttach["TRANSACTION_DATE"].'&nbsp</td><td>&nbsp'.$rowAttach["COLUMNSIZE"].'B&nbsp</td>';
    $attachment = $attachment.'<td>'.$rowAttach["USERID"].'&nbsp</td>';
    $attachment = $attachment.'<td>'.$rowAttach["CE_HOSTNAME"].'&nbsp</td>';
    $attachment = $attachment.'</tr>';
    }

 //Get Handover Attachment

    
 echo '
 Note: CA = Configuration Attachment, HA = Handover Attachment 
 <table>
 <tr style="background-color:#ADD8E6;"><td><table border="1"><tr><td>No.</td><td align="center">Attachments Name</td><td>Attachment Type</td><td align="center">Timestamp</td><td align="center">Size</td><td align="center">By</td><td>Hostname</td></tr>'.$attachment.'</table></td></tr>
</table> <br>';
 ?> 
 </body> 
 </html> 
