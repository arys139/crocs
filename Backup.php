<?php
 
backup_appl();

//Get and format date/time
$timezone = "Asia/Kuala_Lumpur";
if(function_exists('date_default_timezone_set')) date_default_timezone_set( $timezone);
$date = date('jS F, Y H:i:s');

Echo "Backup successful on ".$date.". \n";

function backup_appl() {
    // FTP parameters
    $host = '10.14.61.73';
    $usr = 'nasbackup';
    $pwd = 'admin1';
    $ftp_path = './crocs Appl/';

    // connect to FTP server (port 21)
    $conn_id = ftp_connect($host, 21) or die ("Cannot connect to host");
    // send access parameters
    ftp_login($conn_id, $usr, $pwd) or die("Cannot login");

    //Get file list
    $dir    = './';
    $files = scandir($dir);

    //Ftp the files except
    $i=2;//to skip . and ..
    while($i < count($files)) {
        $local_file = $files[$i];
        $target_file = $ftp_path.$files[$i];
        if (ftp_put($conn_id, $target_file, $local_file, FTP_ASCII))
        {}
        else { echo "There was a problem while uploading $local_file\n";
        }
        $i++;
    }

    // close the FTP stream 
    ftp_close($conn_id); 
}

?>
