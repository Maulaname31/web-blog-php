<?php
include "../koneksi.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    // Berikan nilai default atau lakukan tindakan lain jika nilai 'id' tidak ada
}

if (isset($_FILES['image']['name'])) {
    $image = $_FILES['image']['name'];
} else {
    // Berikan nilai default atau lakukan tindakan lain jika nilai 'image' tidak ada
}

if (isset($_POST['judul'])) {
    $judul = $_POST['judul'];
} else {
    // Berikan nilai default atau lakukan tindakan lain jika nilai 'judul' tidak ada
}

if (isset($_POST['isi'])) {
    $isi = $_POST['isi'];
} else {
    // Berikan nilai default atau lakukan tindakan lain jika nilai 'isi' tidak ada
}

// Menyimpan file gambar ke direktori server
$targetDir = "image/"; // Ganti dengan direktori penyimpanan gambar yang diinginkan
$targetFile = $targetDir . basename($_FILES['image']['name']);

if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
    $image = $_FILES['image']['name'];

    // Mendapatkan tanggal saat ini
    $tanggalUpload = date('Y-m-d'); // Format YYYY-MM-DD

    // Menyimpan data ke dalam tabel tb_blog
    $sql = "INSERT INTO tb_blog (image, judul, isi, tanggal_upload) VALUES ('$image', '$judul', '$isi', '$tanggalUpload')";
    if (mysqli_query($koneksi, $sql)) {
       header("Location: Home.php");
        exit();
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "Gagal mengunggah gambar.";
}
?>
