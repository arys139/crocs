<html> 
 <head><title>Bulk Update</title> 
 
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
 
 <div class="bulkupdate">
 	<h2>Bulk Update</h2>
    
    <br><br>You may refer to 'Remarks' column on the right to see bulk update 
 	result.
 </div>

 <?php 

 //Allow program to run for up to 1000 seconds.
 set_time_limit(1000);

 include '../../inc/CROCSLogin.php'; 

 /** PHPExcel */
 include 'PHPExcel.php';

 //Get uploaded file
 //Read the file
 $filename = $_FILES["file"]["name"];
 if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    exit;
    }

 if (($_FILES["file"]["type"] == "application/vnd.ms-excel") or ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")) {
    if (substr_count($_FILES["file"]["name"], ".xlsx") >0) 
       $tempfile = "Temp_Data.xlsx";
    else 
       $tempfile = "Temp_Data.xls";
    }

 else {
    echo "<br>File type ".$_FILES["file"]["type"]." not supported";
    exit; } 

 move_uploaded_file($_FILES["file"]["tmp_name"],$tempfile);

 $filename = $tempfile;

 require_once 'PHPExcel/IOFactory.php';
 $objPHPExcel = PHPExcel_IOFactory::load($filename);

 foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

    //If worksheet not empty, process it
    if ($highestRow > 1) { 
       echo '<table border="1"><tr>';
       //Process header
       echo '<tr bgcolor="#FFF8C6">';
       $updcol = array();
       $SvcInstallDateColumn = -1;
       $PMDateColumn = -1;
       $CDFSignOffDateColumn = -1;
       for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow($col, 1);
            $val = $cell->getValue();
            echo '<td>' . $val . '<br></td>';
            //identify valid column name
            $updcol[$col] = '';
            /*if ($val == 'Service Installation Date'){
               $SvcInstallDateColumn = $col;
               $updcol[$col] = ' CROCS_SVC_INSTALL_DATE = ';}
            if ($val == 'Handover Status')
               $updcol[$col] = ' HANDOVER_STATUS = ';*/
            if ($val == 'TACACS') {
               $updcol[$col] = ' CROCS_TACACS = '; 
               }
            if ($val == 'KIWI'){
               $updcol[$col] = ' CROCS_KIWI = ';
               }
            if ($val == 'UPE Loopback IP')
               {
               $updcol[$col] = ' CROCS_UPE_LOOPBACK_IP = ';
               }
            if ($val == 'Tunnel IP')
                {
               $updcol[$col] = ' CROCS_TUNNEL_IP = ';
               }
            if ($val == 'Loopback IP')
                {
               $updcol[$col] = ' CROCS_LOOPBACK_IP = ';
               }
            if ($val == 'LAN IP')
                {
               $updcol[$col] = ' CROCS_LAN_IP = ';
               }
            if ($val == 'CE Partner Management')
                {
                $updcol[$col] = ' CROCS_CE_PARTNER_MGMT = ';
                }
            if ($val == 'CE Leasing Contract No.')
                {
               $updcol[$col] = ' CROCS_CE_LEASE_CONTRACT_NO = ';
               }
            if ($val == 'CE Invoice No')
                {
               $updcol[$col] = ' CROCS_CE_INVOCE_NO = ';
               }
            if ($val == 'CDF Sign Off Date')
                {
               $CDFSignOffDateColumn = $col;
               $updcol[$col] = ' CROCS_CDF_SIGN_OFF_DATE = ';
               }
            if ($val == 'Handover Remark/ Notes')
                {
               $updcol[$col] = ' CROCS_HO_REMARKS = ';
               }
            if ($val == 'Latest Preventive Maintenance Date')
                {
               $PMDateColumn = $col;
               $updcol[$col] = ' CROCS_LATEST_PM_DATE = ';
               }
            if ($val == 'Preventive Maintenance Description')
                {
               $updcol[$col] = ' CROCS_PM_DESC = ';
               }
            if ($val == 'Updated By')
                {
               $updcol[$col] = ' CROCS_UPDATED_BY = '; 
               }           
            }
       echo '<td>Remarks</td></tr>';
       }
    //Process detail
    for ($rowcount = 2; $rowcount <= $highestRow; ++ $rowcount) {
        echo '<tr>';
        $sqlstr = '';
        $comma = '';
        for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow($col, $rowcount);
            $val = trim($cell->getValue());
            if ($col == 0) { //Key 
               $CROCS_ORDER_SVC_ID = $val;
               echo '<td bgcolor="#FFF8C6">' . $val . '<br></td>';
               }
            else {
               //if CDF date format, convert to string
               if ($CDFSignOffDateColumn == $col) {
                  if (is_numeric($val)) {
                     if ($valDate = date('d-m-Y',PHPExcel_Shared_Date::ExcelToPHP($val)))
                        $val = $valDate;
                     }
                  }
               //if Service Installation date format, convert to string
               /*if ($SvcInstallDateColumn == $col) {
                  if (is_numeric($val)) {
                     if ($valDate = date('d-m-Y',PHPExcel_Shared_Date::ExcelToPHP($val)))
                        $val = $valDate;
                     }
                  }*/
               //if PM date format, convert to string
               if ($PMDateColumn == $col) {
                  if (is_numeric($val)) {
                     if ($valDate = date('d-m-Y',PHPExcel_Shared_Date::ExcelToPHP($val)))
                        $val = $valDate;
                     }
                  }
               echo '<td>' . $val . '<br></td>';
               if (($updcol[$col] != ' CROCS_LATEST_PM_DATE = ') || ($updcol[$col] != ' CROCS_CDF_SIGN_OFF_DATE = '))
               {
                  $sqlstr .= $comma.$updcol[$col]."'".$val."'";
                  $comma = ',';
                  }
               else {
                  $sqlstr .= $comma.$updcol[$col]."TO_DATE('".$val."','DD/MM/YYYY')";
                  $comma = ',';
                  }
               }
            }
        if ($sqlstr == '')
           echo '<td bgcolor="#FFF8C6">Record not updated. Valid column name not found.</td>';
        else {
           $sqlstr = $sqlstr.", CROCS_UPDATED_DATE = SYSDATE";
           //Check whether data mapping record exist. If exist, perform the update
           $sql = "SELECT * FROM DATA_MAPPING_CROCS WHERE CROCS_ORDER_SVC_ID = '".$CROCS_ORDER_SVC_ID."'";
           $stid = oci_parse($cemdb, $sql);
           $result = oci_execute($stid);

           if ($row = oci_fetch_assoc($stid)) {
              //Check whether data mapping record exist. If exist update else insert
              /*$sql = 'SELECT CE_Hostname FROM data_mapping_ext1 where CE_Hostname = "'.$CE_Hostname.'"';
              $result = mysql_query($sql, $cemdb);
              if ($row = mysql_fetch_assoc($result)) {
                 $RecordExist = 'Y';}
              else {
                 $RecordExist = 'N';}

              if ($RecordExist == 'N') {
                 $sql = "INSERT INTO data_mapping_ext1 VALUES ('$CE_Hostname', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NOW(), 'Batch', 'Y')";
                 $result = mysql_query($sql, $cemdb);
                 }*/ 
              //Now update the record
              $sql1 = "UPDATE DATA_MAPPING_CROCS SET ".$sqlstr." WHERE CROCS_ORDER_SVC_ID = '".$CROCS_ORDER_SVC_ID."'";
              $stid1 = oci_parse($cemdb, $sql1);
              $result1 = oci_execute($stid1);
              //Get LAN IP and Handover status and update Data Mapping record accordingly
              /*$sql1 = "SELECT LAN_IP, HANDOVER_STATUS from data_mapping_ext1 where CE_Hostname = '$CE_Hostname'";
              $result1 = mysql_query($sql1, $cemdb);
              $row = mysql_fetch_assoc($result1);
              $LAN_IP = $row['LAN_IP'];
              $HANDOVER_STATUS = $row['HANDOVER_STATUS'];
              $sql2 = "UPDATE data_mapping SET LAN_IP_Addr='$LAN_IP', Misc='$HANDOVER_STATUS' where CE_Hostname = '$CE_Hostname'";
              $result2 = mysql_query($sql2, $cemdb);*/
              echo '<td bgcolor="#FFF8C6">Record updated successfully.</td>';
              }
       else {
          echo '<td bgcolor="#FFF8C6">Record not updated. CE not found.</td>';
          }
       echo '</tr>';
       }
    }

 //'exit' statement added to prevent error 'Reset by peer' if more than one worksheet exist
 exit;

 }

 ?> 

 </body> 
 </html> 
