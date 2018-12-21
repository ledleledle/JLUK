<?php
session_start();
$user =  @$_SESSION['usrname'];
include 'connect.php';
$pg = '10';
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
<script type="text/javascript" src="js/jquery.js"></script>
<div class="header">
       <div class="container">
          <div class="row">
             <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                   <h1><a href="index.html">JLUK</a></h1>
                </div>
             </div>
             
             <div class="col-md-7">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                      <ul class="nav navbar-nav">
                        <li style="margin-top: 6px; margin-right: 10px; ">
                      <?php
                      if(isset($user)){   
                          ?>
                          <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $user; ?> <b class="caret"></b></a>
                          <ul class="dropdown-menu animated fadeInUp">
                            <li><a href="#">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                          </ul>
                        </li>
                        <?php }else{
                          echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Login</button>'; } ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="ceklogin.php" method="post" class="abc">
          <label for="recipient-name" class="col-form-label">Username/NIDN:</label>
            <input type="text" class="form-control" name="usr" id="username">
            <p style="color:red;display: none;" id="errusr"><strong>Username</strong> Harus Diisi!</p>
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control" name="ps" id="password">
            <p style="color:red;display: none;" id="errpass"><strong>Password</strong> Harus Diisi!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Login!">
                </form>
      </div>
    </div>
  </div>
</div>
                        </li>
                        <li style="margin-top: 10px; color: #fff;"><div id="tempatjam"></div><script>
function tampilkanjam()
 {
 var waktu = new Date();
 var jam = waktu.getHours();
 var menit = waktu.getMinutes();
 var detik = waktu.getSeconds();
 var teksjam = new String();
 if ( menit <= 9 )
 menit = "0" + menit;
 if ( detik <= 9 )
 detik = "0" + detik;
 teksjam = jam + ":" + menit + ":" + detik;
 tempatjam.innerHTML = teksjam;
 setTimeout ("tampilkanjam()",1000);
 }
 window.onload = tampilkanjam
</script><?php echo date('D, d - M - Y'); ?></li>
                      </ul>
                    </nav>
                </div>
             </div>
          </div>
       </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.abc').submit(function() {
      var usrnm = $('#username').val().length;  
      var passwd = $('#password').val().length; 
 
      if (usrnm == '' && passwd == '') {        
        $("#errusr").css('display','block');
        $("#errpass").css('display','block');
        return false;
      }else if(passwd == ''){
        $("#errpass").css('display','block');
        $("#errusr").css('display', 'none');
        return false;
      }else if(usrnm == ''){
        $("#errusr").css('display','block');
        $("#errpass").css('display', 'none');
        return false;
      }else{
        return true;  
      }
    });
  });
</script>
<?php
if(@$_GET['login'] == "sucsess" && isset($_SESSION['time'])){ ?>
       <div class="container">
  <div class="col-md-12">
  <div class="alert alert-success">
    <strong>Sukses!</strong> Login Berhasil Dengan Username <strong><?php echo $user; ?></strong> Pada Jam <strong><?php echo $_SESSION['time']; ?></strong>
</div>
</div>
</div>
<?php }else{echo '';} ?>

    <div class="page-content">
    	<div class="row">
		  <?php include 'sidebar.php'; ?>
		  <div class="col-md-10">

	  			<div class="row">
	  				<div class="col-md-10">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><span class="glyphicon glyphicon-user"></span> Profile</div>
					        </div>
			  				<div class="panel-body">
			  						<?php
			  						$sql = mysql_query("SELECT * FROM dosen WHERE nama ='$user'");
			  						$row1 = mysql_fetch_array($sql);
			  							echo "<label>Username : ".$row1['nama'];
                      echo "</label><br><label>Nama Lengkap : ".$row1['nama_l'];
                      echo "</label><br><label>NIDN : ".$row1['nidn']."</label>";
			  						?>
			  					</tr>
			  				</div>
			  			</div>
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
<script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>
         <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 

    <script src="js/custom.js"></script>
  </body>
  </html>