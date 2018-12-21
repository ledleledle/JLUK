<?php
include 'connect.php';
$hps =  $_POST['dosen'];

mysql_query("DELETE FROM dosen WHERE nama_l='$hps'");
?>
<script>window.alert('Dosen Bernama <?php echo $hps; ?> Sudah Terhapus!');
            window.location.href='dsnlab.php';</script>