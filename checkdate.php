<?php
$startdate = "1-Agt-2018";
$expire = strtotime($startdate. ' + 2 days');
$today = strtotime("today midnight");

if($today >= $expire){
    echo "expired";
} else {
    echo "active";
}
?>