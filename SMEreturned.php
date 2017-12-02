<?php 
include '../../inc/CROCSLogin.php';

 $sqlSME2 = "SELECT CROCS_PRODUCT_NAME, CROCS_COUNT FROM CROCS_HO_ACTIVITY_STATUS WHERE (UPPER(CROCS_LOB) = 'SME' AND UPPER(CROCS_HO_REMARKS) = 'RETURNED') GROUP BY CROCS_PRODUCT_NAME, CROCS_COUNT";
 
 $stidSME2 = oci_parse($cemdb, $sqlSME2);
 $resultSME2 = oci_execute($stidSME2);
 if (!$stidSME2) {
    echo 'DB Error, could not query the database<br>';
    exit;
    }
 else { 	
    oci_define_by_name($stidSME2, 'CROCS_COUNT', $TOTALSME2);
    oci_define_by_name($stidSME2, 'CROCS_PRODUCT_NAME', $CROCS_PRODUCT_NAMESME2);
}
$Prod_data10 = array();
    while (($rowSME2 = oci_fetch_array($stidSME2)) != false) { 
        $CROCS_PRODUCT_NAMESME2 = $rowSME2['CROCS_PRODUCT_NAME'];
        $TOTALSME2 = $rowSME2['CROCS_COUNT'];
        $Prod_data10[] = array($rowSME2['CROCS_PRODUCT_NAME'], (int)$rowSME2['CROCS_COUNT']);
      }
      $counter = count($Prod_data10);
      $TOTALIPGL = 0;
      $TOTALIPVPN = 0;
      $TOTALTMD = 0;
      $GRANDTOTAL = 0;
      $IPVPN_GLOBAL_SME1 = 0;
      $IPVPN_LITE_SME1 = 0;
      $IPVPN_PREMIER_SME1 = 0;
      $IPVPN_VALUE_SME1 = 0;
      $TMDIRECT_SME1 = 0;
      for($x = 0; $x < 22; $x++) {
        $dummy = 0;
        if ($x == 0){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'GLOBAL IPVPN DOMESTIC LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>"; 
                    $IPVPN_GLOBAL_SME1 = $IPVPN_GLOBAL_SME1 + $Prod_data10[$y][1];
                    $dummy = 1; 
                    $TOTALIPGL = $TOTALIPGL + $Prod_data10[$y][1];
                    $TOTAL1 = $TOTAL1 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>";
                $IPVPN_GLOBAL_SME1 = $IPVPN_GLOBAL_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 1){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'GLOBAL IPVPN LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";
                    $IPVPN_GLOBAL_SME1 = $IPVPN_GLOBAL_SME1 + $Prod_data10[$y][1];
                    $dummy = 1; 
                    $TOTALIPGL = $TOTALIPGL + $Prod_data10[$y][1];
                    $TOTAL2 = $TOTAL2 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $IPVPN_GLOBAL_SME1 = $IPVPN_GLOBAL_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 2){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'GLOBAL IPVPN LEG WITH PROXY'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";
                    $IPVPN_GLOBAL_SME1 = $IPVPN_GLOBAL_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;  
                    $TOTALIPGL = $TOTALIPGL + $Prod_data10[$y][1];
                    $TOTAL3 = $TOTAL3 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>";  
                $IPVPN_GLOBAL_SME1 = $IPVPN_GLOBAL_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
      else if ($x == 3){
            echo "<td align='center'>".$TOTALIPGL."</td>"; 
            $GRANDTOTAL = $GRANDTOTAL + $TOTALIPGL;
            $GRANDTOTAL1 = $GRANDTOTAL1 + $TOTALIPGL;
        } 
        
        else if ($x == 4){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'IPVPN LITE CUSTOMIZED LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>"; 
                    $IPVPN_LITE_SME1 = $IPVPN_LITE_SME1 + $Prod_data10[$y][1];
                    $dummy = 1; 
                    $TOTALIPVPN = $TOTALIPVPN + $Prod_data10[$y][1];
                    $TOTAL4 = $TOTAL4 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $IPVPN_LITE_SME1 = $IPVPN_LITE_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 5){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'IPVPN LITE LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";
                    $IPVPN_LITE_SME1 = $IPVPN_LITE_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;  
                    $TOTALIPVPN = $TOTALIPVPN + $Prod_data10[$y][1];
                    $TOTAL5 = $TOTAL5 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $IPVPN_LITE_SME1 = $IPVPN_LITE_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
                else if ($x == 6){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'IPVPN LITE STANDARD PLUS LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>"; 
                    $IPVPN_LITE_SME1 = $IPVPN_LITE_SME1 + $Prod_data10[$y][1]; 
                    $dummy = 1;
                    $TOTALIPVPN = $TOTALIPVPN + $Prod_data10[$y][1];
                    $TOTAL6 = $TOTAL6 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $IPVPN_LITE_SME1 = $IPVPN_LITE_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 7){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'IPVPN PREMIER CUSTOMIZED LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";  
                    $IPVPN_PREMIER_SME1 = $IPVPN_PREMIER_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;
                    $TOTALIPVPN = $TOTALIPVPN + $Prod_data10[$y][1];
                    $TOTAL7 = $TOTAL7 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $IPVPN_PREMIER_SME1 = $IPVPN_PREMIER_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        
        else if ($x == 8){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'IPVPN PREMIER LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>"; 
                    $IPVPN_PREMIER_SME1 = $IPVPN_PREMIER_SME1 + $Prod_data10[$y][1];
                    $dummy = 1; 
                    $TOTALIPVPN = $TOTALIPVPN + $Prod_data10[$y][1];
                    $TOTAL8 = $TOTAL8 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $IPVPN_PREMIER_SME1 = $IPVPN_PREMIER_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 9){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'IPVPN PREMIER STANDARD PLUS LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>"; 
                    $IPVPN_PREMIER_SME1 = $IPVPN_PREMIER_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;
                    $TOTALIPVPN = $TOTALIPVPN + $Prod_data10[$y][1];
                    $TOTAL9 = $TOTAL9 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0 )
            {
                echo "<td align='center'>0</td>"; 
                $IPVPN_PREMIER_SME1 = $IPVPN_PREMIER_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }     
        else if ($x == 10){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'IPVPN VALUE CUSTOMIZED LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>"; 
                    $IPVPN_VALUE_SME1 = $IPVPN_VALUE_SME1 + $Prod_data10[$y][1]; 
                    $dummy = 1;
                    $TOTALIPVPN = $TOTALIPVPN + $Prod_data10[$y][1];
                    $TOTAL10 = $TOTAL11 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $IPVPN_VALUE_SME1 = $IPVPN_VALUE_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 11){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'IPVPN VALUE LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";  
                    $IPVPN_VALUE_SME1 = $IPVPN_VALUE_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;
                    $TOTALIPVPN = $TOTALIPVPN + $Prod_data10[$y][1];
                    $TOTAL11 = $TOTAL11 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $IPVPN_VALUE_SME1 = $IPVPN_VALUE_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 12){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'IPVPN VALUE STANDARD PLUS LEG'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";
                    $IPVPN_VALUE_SME1 = $IPVPN_VALUE_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;  
                    $TOTALIPVPN = $TOTALIPVPN + $Prod_data10[$y][1];
                    $TOTAL12 = $TOTAL12 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $IPVPN_VALUE_SME1 = $IPVPN_VALUE_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 13){
            echo "<td align='center'>".$TOTALIPVPN."</td>";
            $GRANDTOTAL = $GRANDTOTAL + $TOTALIPVPN;
            $GRANDTOTAL2 = $GRANDTOTAL2 + $TOTALIPVPN; 
        }
        else if ($x == 14){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'CUSTOMIZED DIRECT PACKAGE'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";  
                    $TMDIRECT_SME1 = $TMDIRECT_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;
                    $TOTALTMD = $TOTALTMD + $Prod_data10[$y][1];
                    $TOTAL13 = $TOTAL13 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $TMDIRECT_SME1 = $TMDIRECT_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 15){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'DIRECT LEASED LINE BASIC PACKAGE - DOLL'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";  
                    $TMDIRECT_SME1 = $TMDIRECT_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;
                    $TOTALTMD = $TOTALTMD + $Prod_data10[$y][1];
                    $TOTAL14 = $TOTAL14 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $TMDIRECT_SME1 = $TMDIRECT_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 16){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'DIRECT STANDARD PLUS PACKAGE'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";  
                    $TMDIRECT_SME1 = $TMDIRECT_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;
                    $TOTALTMD = $TOTALTMD + $Prod_data10[$y][1];
                    $TOTAL15 = $TOTAL15 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $TMDIRECT_SME1 = $TMDIRECT_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 17){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'GOLD DIRECT PACKAGE - DOME'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";  
                    $TMDIRECT_SME1 = $TMDIRECT_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;
                    $TOTALTMD = $TOTALTMD + $Prod_data10[$y][1];
                    $TOTAL16 = $TOTAL16 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $TMDIRECT_SME1 = $TMDIRECT_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 18){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'SILVER DIRECT PACKAGE - DOME'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>";  
                    $TMDIRECT_SME1 = $TMDIRECT_SME1 + $Prod_data10[$y][1];
                    $dummy = 1;
                    $TOTALTMD = $TOTALTMD + $Prod_data10[$y][1];
                    $TOTAL17 = $TOTAL17 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $TMDIRECT_SME1 = $TMDIRECT_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 19){
            for($y = 0; $y < $counter; $y++) {
                if ($Prod_data10[$y][0] == 'STANDARD DIRECT PACKAGE - DOME'){
                    echo "<td align='center'>".$Prod_data10[$y][1]."</td>"; 
                    $TMDIRECT_SME1 = $TMDIRECT_SME1 + $Prod_data10[$y][1]; 
                    $dummy = 1;
                    $TOTALTMD = $TOTALTMD + $Prod_data10[$y][1];
                    $TOTAL18 = $TOTAL18 + $Prod_data10[$y][1];
                }
                else{
                    //Do Nothing
                }
            }
            if ($dummy == 0)
            {
                echo "<td align='center'>0</td>"; 
                $TMDIRECT_SME1 = $TMDIRECT_SME1 + 0;
            }
            else{
                //Do Nothing
            }
        }
        else if ($x == 20){
            echo "<td align='center'>".$TOTALTMD."</td>"; 
            $GRANDTOTAL = $GRANDTOTAL + $TOTALTMD;
            $GRANDTOTAL3 = $GRANDTOTAL3 + $TOTALTMD;
        }
        else if ($x == 21){
            echo "<td align='center'>".$GRANDTOTAL."</td>"; 
            $GRANDTOTAL4 = $GRANDTOTAL4 + $GRANDTOTAL;
        }
      }
 unset ($Prod_data10);
?>