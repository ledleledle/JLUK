<?php
include 'connect.php';

$lab = $_POST['lab'];
$cek = mysql_query("SELECT * FROM lab WHERE nama_lab='$lab'");
$res = mysql_num_rows($cek);

if($res == 0){
	mysql_query("INSERT INTO lab(nama_lab) VALUES ('$lab')"); ?>
           <script>window.alert('Lab Sudah Ditambahkan!');
            window.location.href='dsnlab.php';</script>
        <?php }else{ ?>
			<script>window.alert('Lab Sudah Ada!');
            window.location.href='dsnlab.php';</script>
       <?php } ?>