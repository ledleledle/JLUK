<?php
session_start();
include 'connect.php';
$usr = $_POST['usr'];
$pass = $_POST['ps'];

$qcek = mysql_query("SELECT * FROM dosen WHERE nama LIKE '$usr' AND password LIKE '$pass' OR nidn LIKE '$usr' AND password LIKE '$pass'");
$cek = mysql_fetch_array($qcek);
$ada = mysql_num_rows($qcek);

if($ada == '0'){ ?>
	<script>window.alert('Akun Anda Tidak Ditemukan. Mohon cek kembali username dan password anda!');
window.location.href='index.php';</script>
<?php  
}else{
	$_SESSION['id_log'] = $cek['id_dosen'];
	$_SESSION['usrname'] = $cek['nama'];
	$_SESSION['time'] = date("h:i:sa");
	header("location:index.php?login=sucsess");
}
?>