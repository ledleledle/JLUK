<?php
$pg = '6';
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
	  					<div class="panel-title ">Mata Kuliah UNP Kediri</div>
		  			</div>
		  			<div class="content-box-large box-with-header">
		  				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addmat"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
		  				<table class='table table-bordered table-hover'>
		  					<tr><th>Dosen</th><th>Matkul</th><th>Update</th><th>Hapus</th></tr>
		  				<?php
		  				$shw = mysql_query("SELECT * FROM matkul");
		  				while($row = mysql_fetch_array($shw)){
		  					$dzn = mysql_query("SELECT * FROM dosen WHERE id_dosen='".$row['id_dosen']."'");
		  					$shwdz = mysql_fetch_array($dzn);
		  					if($row['id_matkul'] == '1'){
		  						echo "<tr>";
		  					}else{
		  					echo "<tr>";
		  					echo "<td>".$shwdz['nama_l']."</td>";
		  					echo "<td>".$row['matkul']."</td>"; ?>
<td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editmat" data-whatever="<?php echo $row['matkul']; ?>" data-watde="<?php echo $row['id_matkul']; ?>"><span class="glyphicon glyphicon-pencil"></span> Update</button></td>

<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hpsmat" data-whatever="<?php echo $row['matkul']; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</button></td>
		  			<?php } } ?>
		  			</tr>
		  			</table>
					</div>
		  		</div>
		  	</div>
		</div>
    </div>
<div class="modal fade" id="addmat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Matkul</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="addmat.php" method="post">
        	<label for="recipient-name" class="col-form-label">Nama Dosen:</label>
        	<?php $sql = mysql_query("SELECT * FROM dosen"); 
echo "<div class='bfh-selectbox' data-name='dosen' data-value='1' data-filter='true'>";
while($row = mysql_fetch_array($sql)){
	$id = $row['id_dosen'];
	echo "<div data-value='$id'>".$row['nama_l']."</div>";
} ?>
</div>
			<label for="recipient-name" class="col-form-label">Nama Matkul:</label>
            <input type="text" class="form-control" name="matkul" required id="recipient-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Tambah!">
                </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="hpsmat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="hpsmat.php" method="post">
        	<label for="recipient-name" class="col-form-label">Anda Yakin Ingin Menghapus Mata Kuliah Ini?</label>
            <input type="hidden" name="mat" required id="recipient-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-danger" value="Hapus">
                </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editmat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="editmat.php" method="post">
        	<label class="col-form-label">id Matkul:</label>
        	<input type="text" class="form-control" name="id" required id="rerex" readonly>
        	<label for="recipient-name" class="col-form-label">Nama Matkul:</label>
            <input type="text" class="form-control" name="mat" required id="rerere">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" value="Update!">
                </form>
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
    <script src="js/custom.js"></script>
    <script>
    	$('#hpsmat').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Hapus Mata Kuliah ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
    	$('#editmat').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever')
  var recipient2 = button.data('watde') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Update Mata Kuliah ' + recipient)
  modal.find('#rerere').val(recipient)
  modal.find('#rerex').val(recipient2)
})
    </script>
  </body>
</html>