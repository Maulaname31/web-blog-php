<?php
include "koneksi.php";

// Cek apakah parameter 'id' telah diberikan melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // Jika tidak ada parameter 'id', arahkan pengguna kembali ke halaman index
    header("Location: index.php");
    exit();
}

// Query untuk mengambil data artikel berdasarkan id
$sql = "SELECT * FROM tb_blog WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql);

// Cek apakah data artikel ditemukan
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $judul = $row['judul'];
    $isi = $row['isi'];
    $tanggalUpload = $row['tanggal_upload'];
    $image = $row['image'];
} else {
    // Jika artikel tidak ditemukan, arahkan pengguna kembali ke halaman index
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Artikel</title>
    <link rel="stylesheet" href="post.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h2><?php echo $judul; ?></h2>
        <img src="admin/image/<?php echo $image; ?>" alt="Gambar Artikel">
        <p><?php echo $isi; ?></p>
        <a href="index.php" style="font-size: 35px;">Kembali</a>
    </div>
</body>
</html>
