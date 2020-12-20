<?php
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
if ($_GET['rev'] == 1) {
    
    date_default_timezone_set("Asia/Bangkok");
    // echo date_default_timezone_get() . "<br /> <hr />";
    echo"<hr/>";
    echo " วันที่ " . date("d/m/Y");
    echo " เวลา " . date("h:i:sa ");
   
}
?>