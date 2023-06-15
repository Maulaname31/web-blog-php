<?php
include '../koneksi.php';
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

$data  = mysqli_query($koneksi,"select * from tb_user where username='$username' and password='$password'");
$cek = mysqli_num_rows($data);
if($cek > 0)
{
  $_SESSION["status"] = "ok";
    ?>
    <script>
        alert('Data Sesuai');
        document.location.href = 'Home.php';
    </script>
    <?php
}
else{
    ?>
    <script>
        alert('Data TIDAK Sesuai! silahkan LOGIN lagi');
        document.location.href = 'Login.php';
    </script>
    <?php
}
?>