<?php

 //Function to do simple encryption of user ID as html parameters
 function encrypt($UserID)
 {
    $length = strlen ( $UserID );
    $UserID = str_rot13($UserID);
    $returnUserID = '';
    $ctrLoop = 0;
    while ( $ctrLoop < $length ) {
       $char = substr($UserID, $ctrLoop, 1);
       if (($char == '0') or ($char == '1') or ($char == '2') or ($char == '3') or ($char == '4'))
          $char = $char + 5;
       else if (($char == '5') or ($char == '6') or ($char == '7') or ($char == '8') or ($char == '9'))
          $char = $char - 5;
       $returnUserID = $returnUserID.$char;
       $ctrLoop = $ctrLoop + 1;
       }
  return 'PR'.$returnUserID;
 }

 //Function to do simple encryption of user ID as html parameters
 function decrypt($UserID)
 {
    $length = strlen ( $UserID );
    $UserID = str_rot13($UserID);
    $returnUserID = '';
    $ctrLoop = 2;
    while ( $ctrLoop < $length ) {
       $char = substr($UserID, $ctrLoop, 1);
       if (($char == '0') or ($char == '1') or ($char == '2') or ($char == '3') or ($char == '4'))
          $char = $char + 5;
       else if (($char == '5') or ($char == '6') or ($char == '7') or ($char == '8') or ($char == '9'))
          $char = $char - 5;
       $returnUserID = $returnUserID.$char;
       $ctrLoop = $ctrLoop + 1;
       }
  return $returnUserID;
 }
?>