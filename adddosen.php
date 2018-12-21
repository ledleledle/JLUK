<?php
include 'connect.php';

$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$user = $_POST['usr'];
$pass = $_POST['ps'];
$cek = mysql_query("SELECT * FROM dosen WHERE nama='$user' OR nidn='$nidn'");
$res = mysql_num_rows($cek);

if($res == 0){
	mysql_query("INSERT INTO dosen(nama, password, nidn, nama_l) VALUES ('$user','$pass','$nidn','$nama')"); ?>
           <script>window.alert('Dosen Sudah Ditambahkan!');
            window.location.href='dsnlab.php';</script>
        <?php }else{ ?>
			<script>window.alert('Nama/NIDN Dosen Sudah Ada!');
            window.location.href='dsnlab.php';</script>
       <?php } ?>
?>