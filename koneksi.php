<?php

 $koneksi = mysqli_connect("localhost", "root","", "id20754057_db_smk");


 if (mysqli_connect_errno())
 {
 echo "Koneksi database gagal : " . mysqli_connect_error();
 }