<?php
include 'connect.php';
$matkul =  $_POST['mat'];

mysql_query("DELETE FROM matkul WHERE matkul='$matkul'");
?>
<script>window.alert('Mata Kuliah <?php echo $matkul; ?> Sudah Terhapus!');
            window.location.href='matkul.php';</script>