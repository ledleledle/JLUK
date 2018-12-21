
<div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li <?php if($pg=='1'){echo "class='current'";} ?>><a href="index.php"><i class="glyphicon glyphicon-home"></i> Jadwal Tetap</a></li>
                    <li <?php if($pg=='4'){echo "class='current'";} ?>><a href="jdwl.php"><i class="glyphicon glyphicon-tasks"></i> Perubahan Jadwal/Lab yang sudah Dipesan</a></li>
                    <?php if(isset($_SESSION['usrname'])){ ?>
                    <li <?php if($pg=='2'){echo "class='current'";} ?>><a href="tables.php"><i class="glyphicon glyphicon-list"></i> Tambah/Update Jadwal</a></li>
                    <li <?php if($pg=='3'){echo "class='current'";} ?>><a href="booking.php"><i class="glyphicon glyphicon-record"></i> Booking Jadwal</a></li>
                    <li <?php if($pg=='5'){echo "class='current'";} ?>><a href="dsnlab.php"><i class="glyphicon glyphicon-th"></i> Dosen dan Lab</a></li>
                    <li <?php if($pg=='6'){echo "class='current'";} ?>><a href="matkul.php"><i class="glyphicon glyphicon-book"></i> Mata Kuliah</a></li>
                <?php } ?>
                </ul>
             </div>
		  </div>