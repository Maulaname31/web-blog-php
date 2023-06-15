<?php
include "../koneksi.php";

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
    <link rel="stylesheet" href="css/post.css">
</head>
<body>
    <div class="container">
        <h2><?php echo $judul; ?></h2>
        <img src="image/<?php echo $image; ?>" alt="Gambar Artikel">
        <p>Tanggal Upload: <?php echo $tanggalUpload; ?></p>
        <p><?php echo $isi; ?></p>
        <a href="Home.php">Kembali</a>
    </div>
</body>
</html>
