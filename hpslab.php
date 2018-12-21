<?php
include 'connect.php';
$hps =  $_POST['lab'];

mysql_query("DELETE FROM lab WHERE nama_lab='$hps'");
?>
<script>window.alert('Lab <?php echo $hps; ?> Sudah Terhapus!');
            window.location.href='dsnlab.php';</script>