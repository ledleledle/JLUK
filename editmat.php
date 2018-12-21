<?php
include 'connect.php';
$id =  $_POST['id'];
$matkul = $_POST['mat'];

mysql_query("UPDATE matkul SET matkul='$matkul' WHERE id_matkul='$id'");
?>
<script>window.alert('Matakuliah Sudah Di Update!');
            window.location.href='matkul.php';</script>