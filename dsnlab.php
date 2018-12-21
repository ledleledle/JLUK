<?php
$pg = '5';
include 'connect.php';
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<?php include'navbar.php'; ?>

    <div class="page-content">
    	<div class="row">
		  <?php include 'sidebar.php'; ?>
		  <div class="col-md-10">

	  			<div class="row">
	  				<div class="col-md-4">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><span class="glyphicon glyphicon-tower"></span> Lab</div>
					        </div>
			  				<div class="panel-body">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addlab"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
			  					<table class='table table-bordered table-hover'>
			  						<tr><th>id</th><th>Lab</th><th>Hapus</th></tr>
			  						<?php
			  						$sql = mysql_query("SELECT * FROM lab");
			  						while($row1 = mysql_fetch_array($sql)){
			  							echo "<tr><td>".$row1['id_lab']."</td>";
			  							echo "<td>".$row1['nama_lab']."</td>";
echo '<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hpslab" data-whatever="'.$row1['nama_lab'].'"><span class="glyphicon glyphicon-trash"></span> Hapus</button></td>';
			  						}
			  						?>
			  					</tr>
			  					</table>
			  				</div>
			  			</div>
	  				</div>
	  				<div class="col-md-8 ">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><span class="glyphicon glyphicon-user"></span> Dosen</div>
					        </div>
			  				<div class="panel-body">
			  					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adddos"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
			  					<table class='table table-bordered table-hover'>
			  						<tr><th>id</th><th>NIDN</th><th>Username</th><th>Nama Lengkap</th><th>Hapus</th></tr>
			  						<?php
			  						$sql = mysql_query("SELECT * FROM dosen");
			  						while($row1 = mysql_fetch_array($sql)){
			  							echo "<tr><td>".$row1['id_dosen']."</td>";
			  							echo "<td>".$row1['nidn']."</td>";
			  							echo "<td>".$row1['nama']."</td>";
			  							echo "<td>".$row1['nama_l']."</td>";?>
<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hpsdos" data-whatever="<?php echo $row1['nama_l']; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</button></td>	
			  						<?php } ?>
			  					</tr>
			  					</table>
			  				</div>
			  			</div>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </div>
	  <div class="modal fade" id="addlab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Lab</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="addlab.php" method="post">
        	<label for="recipient-name" class="col-form-label">Nama Lab:</label>
            <input type="text" class="form-control" name="lab" required id="recipient-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Tambah!">
                </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="hpslab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="hpslab.php" method="post">
        	<label for="recipient-name" class="col-form-label">Anda Yakin Ingin Menghapus Lab Ini?</label>
            <input type="hidden" name="lab" required id="recipient-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-danger" value="Hapus">
                </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="hpsdos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="hpsdos.php" method="post">
        	<label for="recipient-name" class="col-form-label">Anda Yakin Ingin Menghapus Dosen Ini?</label>
            <input type="hidden" name="dosen" required id="recipient-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-danger" value="Hapus">
                </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="adddos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="adddosen.php" method="post">
        	<label for="recipient-name" class="col-form-label">NIDN:</label>
            <input type="number" class="form-control" name="nidn" required>
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control" name="usr" required>
            <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
            <input type="text" class="form-control" name="nama" required>
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name="ps" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Tambah!">
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
<script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>
         <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 

    <script src="js/custom.js"></script>
    <script>
    	$('#hpslab').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Hapus Lab ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
    	$('#hpsdos').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Hapus Dosen ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
    </script>
	</body>
	</html>