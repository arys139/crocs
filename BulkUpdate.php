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
	
	table
	{
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
		font-size:12px;
	}
	
	.sampleinput
	{
		position:relative;
		text-shadow:#FF4346;
		font-size:12px;
		font-family:Tahoma, sans-serif, Cambria, Calibri, Helvetica-Light, Impact, "Segoe UI", "Times New Roman", 
		Verdana, serif, Arial;
	}
	
</style>
</head>
<body>

 <?php 
 include '../../inc/CROCSLogin.php'; 

 include 'inc_fn_userid_enc.php'; 

 //Authorization check
 if (!isset($_GET['U'])) {
    header('Location: index.php');
    } 
 else {
    $U = $_GET['U'];
    $USERNAME = decrypt($U);
    $sql = "SELECT USERNAME, ROLE FROM USERS WHERE USERID = '".$USERNAME."' AND (SYSTEM = 'CROCS' OR SYSTEM = 'ALL')";
    $stid = oci_parse($cemdb, $sql);
    $result = oci_execute($stid);
    if (!$stid) {
        echo "DB Error, could not query the database<br>";
        exit;
        }
     else {
        if ($row = oci_fetch_assoc($stid)) {
           $role = $row['ROLE']; }
        else {
           $role = 'GUEST'; }
    }
 }

 if ($role == 'GUEST') {
    echo "<p><big>You are not authorized to execute this function.</big></p>"; 
    exit;
    }

 echo "<h2>Bulk Update</h2>";
 echo '<div class="header">';
 echo "Please enter file name to be uploaded.<br><br>";
 echo '</div>';

 ?>

<form action="processBulkUpdate.php" method="post"
enctype="multipart/form-data">
<table border='1'>
<tr><td style='background-color:#FFF8C6;'><label for="file">Filename:</label></td>
<td><input type="file" name="file" id="file"></td></tr>
<tr><td colspan='2' align='center'><input type="submit" name="submit" value="Upload"></td></tr>
</table>
</form>
<b><u>Instruction</u></b><br><table>
<tr valign='top'><td>1.&nbsp&nbsp</td><td>File must be in Microsoft Excel format i.e. with extension '.xls' or '.xlsx'.</td></tr>
<tr valign='top'><td>2.</td><td>The first row must contains header (refer sample below).</td></tr>
<tr valign='top'><td>3.</td><td>The first column (column A) is for 'Order Service ID'.</td></tr>
<tr valign='top'><td>4.</td><td>Updates will be performed based on information from row 2 onwards with 'Order Service ID' as key.</td></tr>
<tr valign='top'><td>5.</td><td>Only matching headers will be processed (i.e. contains either 'Order Service ID', 'TACACS', 'KIWI', 'LAN IP', 'Loopback IP', 'Tunnel IP', 'UPE Loopback IP', 'CE Partner Management', 'CE Leasing Contract No', 'CE Invoice No.', 'CDF Sign Off Date', 'Handover Remark/ Notes', 'Latest Preventive Maintenance Date', 'Preventive Maintenance Description', 'User ID'). The headers are exactly as per downloaded file format.</td></tr>
<tr valign='top'><td>6.</td><td>Make sure that columns header and value inserted doesn't contained preceding and proceding SPACE.</td></tr>
<tr valign='top'><td>7.</td><td>Columns other than 'Order Service ID' are not mandatory. If the column header exist, its corresponding field will be updated. Otherwise, the field will be ignored.</td></tr>
<tr valign='top'><td>8.</td><td>To avoid accidental updates, it is advisable to only input columns that need to change. Putting valid column header with blank content will result in its corresponding field to be updated with blank values.</td></tr>
</table>

<div class="sampleinput">
<br>Sample input:<br>
</div>
<img src="images/Bulk_update_crocs.jpg" style="width:500px height:1000px">
<br>
</body>
</html> 
