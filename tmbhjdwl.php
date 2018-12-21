<?php 
	include 'connect.php';
$lab = $_POST['lab'];
//cols
for($i=0;$i<14;$i++){
//rows
for($j=0;$j<6;$j++){

	$val = "r".$i."c".$j;
	$jam = "r".$i;
	$hari = "c".$j;
	$value = $_POST[$val];

	$cek = mysql_query("SELECT * FROM matkul WHERE id_matkul='$value'");
	$row = mysql_fetch_array($cek);
	$dosen = $row['id_dosen'];
	$ceky = mysql_query("SELECT * FROM jadwal WHERE jam='$jam' AND hari='$hari' AND lab='$lab'");
	$ruw = mysql_num_rows($ceky);
	if($ruw >= 1){
		mysql_query("UPDATE jadwal SET matkul='$value', dosen='$dosen' WHERE hari='$hari' AND jam='$jam'");
		$lol = 'up';
	}else{
		mysql_query("INSERT INTO jadwal (lab,hari,jam,dosen,matkul,tgl) VALUES ('$lab','$hari','$jam','$dosen','$value','')");
		$lol = 'in';
}
}
}
if($lol == 'up'){
	header("location:tables.php?status=updated");
}elseif ($lol == 'in') {
	header("location:tables.php?status=inserted");
}
?>