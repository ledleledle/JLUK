<?php
session_start();
@$user = $_SESSION['usrname'];
?>
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