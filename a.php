<?php
session_start();
include 'connect.php';
$dosen = @$_SESSION['id_log'];
$tgl = @$_POST['tgl'];
$hari = @$_POST['hary'];
$lab = @$_POST['lab'];

        for($i=0;$i<14;$i++){
  $jam2 = 'r'.$i;
  $cek = 'ckck'.$jam2;
    $val = @$_POST[$jam2];
    $val2 = @$_POST[$cek];
    if($val2 ==""){
                $aw = 'Kan Sudah Saya Bilang Centang Dulu Mz!!!';
    }else{
        if($val == ''){ ?>
           <script>window.alert('Kalo udh dicentang jgn dikosongi mz!');
            window.location.href='booking.php?id=<?php echo $lab ?>';</script>
        <?php }else{
    mysql_query("INSERT INTO jadwal (lab,hari,jam,dosen,matkul,tgl) VALUES ('$lab','$hari','$jam2','$dosen','$val','$tgl')");
    header('location:booking.php?book=succ&id='.$lab);
            }
    }
    }
    echo $aw;
    echo "<br><a href='booking.php?id=".$lab."'>Kembali</a>"
 ?>