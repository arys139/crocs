
<?php

 // disable the time limit for this script.
ini_set('memory_limit', '-1');
set_time_limit(0); 
  
 include '../../inc/CROCSLogin.php';

 /** Error reporting */
 error_reporting(E_ALL);

 /** Include path **/
 ini_set('include_path', ini_get('include_path').';../Classes/');

 /** PHPExcel */
 include 'PHPExcel.php';

 /** PHPExcel_Writer_Excel2007 */
 include 'PHPExcel/Writer/Excel2007.php';

 // Create new PHPExcel object
 $objPHPExcel = new PHPExcel();

 // Set properties
 $objPHPExcel->getProperties()->setCreator("CROCS Team");
 $objPHPExcel->getProperties()->setLastModifiedBy("CROCS Team");
 $objPHPExcel->getProperties()->setTitle("Customer Routing Configuration System");
 $objPHPExcel->getProperties()->setSubject("CROCS Information Download");
 $objPHPExcel->getProperties()->setDescription("Download Information From CRoCS System In Excel Format.");

 //Ready system to display progress bar 
 echo '<div id="information" style="width"></div>';
 ob_end_flush();

 //Show progress bar. Start with 0
 // Javascript for updating the progress bar and information
 echo '<script language="javascript">
    document.getElementById("information").innerHTML="Please wait. Performing data extraction... 0% completed.";
    </script>';
 // This is for the buffer achieve the minimum size in order to flush data
 echo str_repeat(' ',1024*64);
 // Send output to browser immediately
 flush();

 // Add data from DB
 $objPHPExcel->setActiveSheetIndex(0);
 include 'inc_fn_load_header.php';
 include 'inc_fn_load_detail.php';

 // Rename sheet
 $objPHPExcel->getActiveSheet()->setTitle('CROCS DATA');

 //Show progress bar.
 // Javascript for updating the progress bar and information
 echo '<script language="javascript">    document.getElementById("information").innerHTML="Please wait for another 15-25 minutes as the system is currently generating the excel file.";
    </script>';
 // This is for the buffer achieve the minimum size in order to flush data
 echo str_repeat(' ',1024*64);
 // Send output to browser immediately
 flush();

 // Save Excel 2007 file
 $path = "download/";
 $filename = $path."CROCS_DATA_" . date('Ymd') . ".xlsx"; 
 $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
 $objWriter->save($filename);

  //Clear progress bar
  // Javascript for updating the progress bar and information
  echo '<script language="javascript">
  document.getElementById("information").innerHTML="";
  </script>';
  // This is for the buffer achieve the minimum size in order to flush data
  echo str_repeat(' ',1024*64);
  // Send output to browser immediately
  flush();

 //Now download to User's PC
 echo 'Report generation completed. To download the file, please click  <a href="'.$filename.'">here.</a>';
 exit;
 if (file_exists($filename)) {
     header('Content-Description: File Transfer');
     header('Content-Type: application/octet-stream');
     header('Content-Disposition: attachment; filename='.$filename);
     header('Content-Transfer-Encoding: binary');
     header('Expires: 0');
     header('Cache-Control: must-revalidate');
     header('Pragma: public');
     header('Content-Length: ' . filesize($filename));
     ob_clean();
     flush();
     readfile($filename);
     exit;
     }


 exit;

 function cleanData(&$str)
 { 
 $str = preg_replace("/\t/", "\\t", $str); 
 $str = preg_replace("/\r?\n/", "\\n", $str); 
 if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
 }

 ?>
