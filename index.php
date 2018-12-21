<?php
$pg = '1';
include 'connect.php';
$cek = mysql_query("SELECT * FROM lab");
                  $htung = mysql_num_rows($cek);
                  if(!isset($_GET['id'])){echo '';}else{
                  if($_GET['id'] > $htung){
                  	header('location:index.php');
                  }
              }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>JLUK (Jadwal Lab UNP Kediri)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<?php
include 'navbar.php';
  	?>

    <div class="page-content">
    	<div class="row">
		  <?php
		  include 'sidebar.php';
		  ?>
		  <div class="col-md-10">
		  	
		  	<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Jadwal Tetap Lab <?php 
	  					if(!isset($_GET['id'])){
	  						echo "F1";}else{
	  							$gg = mysql_query("SELECT * FROM lab WHERE id_lab='".$_GET['id']."'");
	  							$wp = mysql_fetch_array($gg);
	  							echo $wp['nama_lab'];
	  						}
	  					 ?></div>
		  			</div>
		  			<div class="content-box-large box-with-header">
		  				<div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      Pilih Lab <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    	<?php
                    	
                    	$lab = mysql_query("SELECT * FROM lab");
                    	while($qq = mysql_fetch_array($lab)){
                      echo "<li><a href='?id=".$qq['id_lab']."'>".$qq['nama_lab']."</a></li>";
                  }
                      ?>
                    </ul>
                  </div>
			<?php
echo "<table class='table table-bordered table-hover'>";
echo "<tr><th rowspan='2'>Jam</th><th colspan='6'>Hari</th></tr>";
echo "<tr><th>Senin</th><th>Selasa</th><th>Rabu</th><th>Kamis</th><th>Jum'at</th><th>Sabtu</th></tr>";
if(isset($_POST['tgl'])){
	$tgl = $_POST['tgl'];
}else{
	$tgl = date('d-m-Y');
}
$jam = array("08.00 s.d. 08.50"=>"0",
 "08.50 s.d. 09.40"=>"1",
 "09.45 s.d. 10.35"=>"2",
 "10.35 s.d. 11.25"=>"3",
 "12.30 s.d. 13.20"=>"4",
 "13.20 s.d. 14.10"=>"5",
 "14.15 s.d. 15.05"=>"6",
 "15.05 s.d. 15.55"=>"7",
 "16.00 s.d. 16.50"=>"8",
 "16.50 s.d. 17.40"=>"9",
 "18.00 s.d. 18.50"=>"10",
 "18.50 s.d. 19.40"=>"11",
 "19.45 s.d. 20.35"=>"12",
 "20.35 s.d. 21.25"=>"13");

//coll
for($i=0;$i<4;$i++){
	foreach($jam as $x => $x_value) {
      if($x_value==$i) $wew = $x;
}
echo "<tr><td>".$wew."</td>";
//row

for($j=0;$j<6;$j++){
	$hari = "c".$j;
	$jam2 = 'r'.$i;
	if(!isset($_GET['id'])){
$show = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='1'");
	}else{
	$show = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='".$_GET['id']."'");
}
	$row = mysql_fetch_array($show);
	$matcool = $row['matkul'];
	$dowzn = $row['dosen'];
	if($matcool == '1'){
		echo "<td>-</td>";
	}else{
	$lele = mysql_query("SELECT * FROM matkul WHERE id_matkul='$matcool'");
	$dzn = mysql_query("SELECT * FROM dosen WHERE id_dosen='$dowzn'");
	$dzzn = mysql_fetch_array($dzn);
	$ruw = mysql_fetch_array($lele);
	if($row['tgl'] == ''){
	echo "<td>".$dzzn['nama']." - ".$ruw['matkul']."</td>";}else{
		echo"<td>-</td>";
	}
}
}
echo "</tr>";
}
echo "<tr><th colspan='8' align='center'>Istirahat</th></tr>";
//coll
for($i=4;$i<10;$i++){
	foreach($jam as $x => $x_value) {
      if($x_value==$i) $wew = $x;
}
echo "<tr><td>".$wew."</td>";
//row

for($j=0;$j<6;$j++){
	$hari = "c".$j;
	$jam2 = 'r'.$i;
	if(!isset($_GET['id'])){
		$show = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='1'");
	}else{
	$show = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='".$_GET['id']."'");
}
	$row = mysql_fetch_array($show);
	$matcool = $row['matkul'];
	$dowzn = $row['dosen'];
	if($matcool == '1'){
		echo "<td>-</td>";
	}else{
	$lele = mysql_query("SELECT * FROM matkul WHERE id_matkul='$matcool'");
	$dzn = mysql_query("SELECT * FROM dosen WHERE id_dosen='$dowzn'");
	$dzzn = mysql_fetch_array($dzn);
	$ruw = mysql_fetch_array($lele);
	if($row['tgl'] == ''){
	echo "<td>".$dzzn['nama']." - ".$ruw['matkul']."</td>";}else{
		echo"<td>-</td>";
	}
}
}

echo "</tr>";
}
echo "<tr><th colspan='8' align='center'>Istirahat</th></tr>";
//coll
for($i=10;$i<14;$i++){
	foreach($jam as $x => $x_value) {
      if($x_value==$i) $wew = $x;
}
echo "<tr><td>".$wew."</td>";
//row

for($j=0;$j<6;$j++){
	$hari = "c".$j;
	$jam2 = 'r'.$i;
	if(!isset($_GET['id'])){
		$show = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='1'");
	}else{
	$show = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='".$_GET['id']."'");
}
	$row = mysql_fetch_array($show);
	$matcool = $row['matkul'];
	$dowzn = $row['dosen'];
	if($matcool == '1'){
		echo "<td>-</td>";
	}else{
	$lele = mysql_query("SELECT * FROM matkul WHERE id_matkul='$matcool'");
	$dzn = mysql_query("SELECT * FROM dosen WHERE id_dosen='$dowzn'");
	$dzzn = mysql_fetch_array($dzn);
	$ruw = mysql_fetch_array($lele);
	if($row['tgl'] == ''){
	echo "<td>".$dzzn['nama']." - ".$ruw['matkul']."</td>";}else{
		echo"<td>-</td>";
	}
}
}

echo "</tr>";
}
echo "</table>";
?>
					</div>
		  		</div>
		  	</div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2018 &copy; <a href='#'>Leon</a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>
         <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 

    <script src="js/custom.js"></script>
  </body>
</html>