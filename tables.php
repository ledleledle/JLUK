<?php
include 'connect.php';
$pg = '2';
$cek = mysql_query("SELECT * FROM lab");
                  $htung = mysql_num_rows($cek);
                  if(!isset($_GET['id'])){echo '';}else{
                  if($_GET['id'] > $htung){
                  	header('location:tables.php');
                  }
              }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>JLUK (Jadwal Lab UNP Kediri)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="css/forms.css" rel="stylesheet">
  </head>
  <body>
  	</body><?php
  	include('navbar.php');
  	?>
    <div class="page-content">
    	<div class="row">
		 <?php
		 include 'sidebar.php';
		 ?>
		  <div class="col-md-10">		  	
  			<?php
  			if(isset($_GET['status'])){
  				?>
<div class="row">
	<div class="col-md-12">
	<div class="alert alert-success">
		<?php
		if($_GET['status'] == "inserted"){
       echo "<strong>Sukses!</strong> Penambahan Jadwal Berhasil.";
}if($_GET['status'] == "updated"){
       echo "<strong>Sukses!</strong> Update Jadwal Berhasil.";
} ?>
</div>
</div>
</div>
<?php } ?>
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Tambah/Update Jadwal Lab <?php 
					if(!isset($_GET['id'])){
                    $labx = mysql_query("SELECT * FROM lab WHERE id_lab='1'");
					}else{
                    $labx = mysql_query("SELECT * FROM lab WHERE id_lab='".$_GET['id']."'");
                }
					$qw =  mysql_fetch_array($labx);
					echo $qw['nama_lab']; ?> <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      Pilih Lab <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    	<?php
                    	$lab = mysql_query("SELECT * FROM lab");
                    	while($qq = mysql_fetch_array($lab)){
                    		$namalab = $qq['nama_lab'];
                      echo "<li><a href='?id=".$qq['id_lab']."'>".$qq['nama_lab']."</a></li>";
                  }
                      ?>
                    </ul>
                  </div></div>
				</div>
				
  					<div class="table-responsive">
  						<form method="post" action="tmbhjdwl.php">
  							<input type="hidden" name="lab" value="<?php if(!isset($_GET['id'])){
  								echo '1';
  							}else{
  								echo $_GET['id'];
  							} ?>">
<?php
echo "<table class='table table-bordered'>";
echo "<tr><th rowspan='2'>Jam</th><th colspan='6'>Hari</th></tr>";
echo "<tr><th>Senin</th><th>Selasa</th><th>Rabu</th><th>Kamis</th><th>Jum'at</th><th>Sabtu</th></tr>";

$colors = array("red", "green", "blue", "yellow"); 

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
	$val = "r".$i."c".$j;
	$jam2 = "r".$i;
	$hari = "c".$j;
	if(!isset($_GET['id'])){
		$lol = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='1'");
	}else{
	$lol = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='".$_GET['id']."'");
}
	$lol1 = mysql_fetch_array($lol);
	$id_matkul = $lol1['matkul'];
	$sql = mysql_query("SELECT * FROM matkul"); 
echo "<td><p><div class='bfh-selectbox' data-name='$val' data-value='$id_matkul' data-filter='true'>";
while($row = mysql_fetch_array($sql)){
	$id = $row['id_matkul'];
	$dosen = $row['id_dosen'];
	$dsn = mysql_query("SELECT * FROM dosen WHERE id_dosen=$dosen");
	$shwdsn = mysql_fetch_array($dsn);
	$matkul = $row['matkul'];
	echo "<div data-value='$id'>".$shwdsn['nama']." - ".$matkul."</div>";
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
	$val = "r".$i."c".$j;
	$jam2 = "r".$i;
	$hari = "c".$j;
	if(!isset($_GET['id'])){
		$lol = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='1'");
	}else{
	$lol = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='".$_GET['id']."'");
}
	$lol1 = mysql_fetch_array($lol);
	$id_matkul = $lol1['matkul'];
	$sql = mysql_query("SELECT * FROM matkul"); 
echo "<td><p><div class='bfh-selectbox' data-name='$val' data-value='$id_matkul' data-filter='true'>";
while($row = mysql_fetch_array($sql)){
	$id = $row['id_matkul'];
	$dosen = $row['id_dosen'];
	$dsn = mysql_query("SELECT * FROM dosen WHERE id_dosen=$dosen");
	$shwdsn = mysql_fetch_array($dsn);
	$matkul = $row['matkul'];
	echo "<div data-value='$id'>".$shwdsn['nama']." - ".$matkul."</div>";
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
	$val = "r".$i."c".$j;
	$jam2 = "r".$i;
	$hari = "c".$j;
	if(!isset($_GET['id'])){
		$lol = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='1'");
	}else{
	$lol = mysql_query("SELECT * FROM jadwal WHERE hari='$hari' AND jam='$jam2' AND lab='".$_GET['id']."'");
}
	$lol1 = mysql_fetch_array($lol);
	$id_matkul = $lol1['matkul'];
	$sql = mysql_query("SELECT * FROM matkul"); 
echo "<td><p><div class='bfh-selectbox' data-name='$val' data-value='$id_matkul' data-filter='true'>";
while($row = mysql_fetch_array($sql)){
	$id = $row['id_matkul'];
	$dosen = $row['id_dosen'];
	$dsn = mysql_query("SELECT * FROM dosen WHERE id_dosen=$dosen");
	$shwdsn = mysql_fetch_array($dsn);
	$matkul = $row['matkul'];
	echo "<div data-value='$id'>".$shwdsn['nama']." - ".$matkul."</div>";
}
}

echo "</tr>";
}
echo "</table>";
?>
<input type="submit" name="" value="Tambah" class="btn btn-success btn-sm">
</form>
  					</div>
  			</div>
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>
  </body>
</html>