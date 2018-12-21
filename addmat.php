<?php
include 'connect.php';
$dosen =  $_POST['dosen'];
$matkul = $_POST['matkul'];

mysql_query("INSERT INTO matkul(id_dosen, matkul) VALUES ('$dosen','$matkul')");
?>
<script>window.alert('Mata Kuliah Sudah Ditambahkan!');
            window.location.href='matkul.php';</script>