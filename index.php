<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <!-- navigasi -->
    <nav>
        <div class="logo">
            <h4>Blog</h4>
        </div>

        <ul>
            <li> <a href="index.php">Home</a></li>
            <li> <a href="about.php">About</a></li>
            <li> <a href="admin/Home.php">Administrator</a></li>
        </ul>
        <div class="menu-toogle">
            <input type="checkbox"/>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <!-- image -->
    
    <div class="image-container full-width-pics">
    <img src="https://www.indonesia.travel/content/dam/indtravelrevamp/jejakin/2-mobile-ind.jpg" alt="Gambar di Bawah Navigasi" class="mobile-image">
    <img src="https://www.indonesia.travel/content/dam/indtravelrevamp/jejakin/2-banner-ind.jpg" alt="Gambar di Bawah Navigasi" class="desktop-image">

</div>
<p style="text-align:center; margin-top:20px; font-size:20px;" class="animated-text">Menyediakan rekomendasi destinasi wisata bagi anda yang ingin berlibur di dalam negeri</p>


<span class="custom-line"></span>

<h4 class="judul">Destinasi Pilihan</h4>


<?php
include "koneksi.php";

// Mengambil data dari tabel tb_blog
$sql = "SELECT * FROM tb_blog";
$result = mysqli_query($koneksi, $sql);

// Looping untuk menampilkan data
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="card-wrapper">';
    echo '<div class="card">';
    echo '<div class="gambar-container">';
    echo '<img src="admin/image/' . $row['image'] . '" alt="Gambar Artikel">';
    echo '</div>';
    echo '<div class="content-container">';
    echo '<h2>' . $row['judul'] . '</h2>';
    
    // Batasi teks dalam isi
    $words = explode(' ', $row['isi']);
    if (count($words) > 10) {
        $words = array_slice($words, 0, 10);
        $limitedContent = implode(' ', $words) . " ...";
        echo '<p>' . $limitedContent . '</p>';
    } else {
        echo '<p>' . $row['isi'] . '</p>';
    }
    
    echo '<a href="post.php?id=' . $row['id'] . '">Baca selengkapnya</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>


 

<div style="margin: 20px; min-height: 100vh;"></div>
    <!-- footer -->

    <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; <a href="https://instagram.com/maulanaa_me?igshid=ZDc4ODBmNjlmNQ==">Maulana</a> 2023</p></div>
        </footer>
<script src="main.js"></script>
</body>
</html>