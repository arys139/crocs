<?php 
 // Connects to Our Database 
 $cemdb = mysql_connect("localhost", "root", "admin1") or die(mysql_error()); 
 mysql_select_db("cem",$cemdb) or die(mysql_error()); 
 ?> 