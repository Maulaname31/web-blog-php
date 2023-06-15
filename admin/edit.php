<?php
include "../koneksi.php";

// Memeriksa apakah parameter ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data blog dari tabel tb_blog berdasarkan ID
    $sql = "SELECT * FROM tb_blog WHERE id = '$id'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "ID tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link rel="stylesheet" type="text/css" href="css/update.css">

</head>
<body>
    <h1>Edit Artikel</h1>

  <form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="image">Gambar:</label>
    <input type="file" id="image" name="image" accept="image/*"><br>
    <br><br>

<!-- Menampilkan gambar yang sudah ada -->
<?php
// Mengambil data gambar saat ini dari database
$gambarLama = $row['image'];

if (!empty($gambarLama)) {
    echo 'Gambar saat ini: <br>';
    echo '<img src="image/' . $gambarLama . '" alt="Gambar saat ini" width="200">';
}
?>
  
    <span>Gambar saat ini: <?php echo $row['image']; ?></span><br><br>
    
    <label for="judul">Judul:</label><br>
    <input type="text" name="judul" value="<?php echo $row['judul']; ?>"><br><br>
    <label for="isi">Isi:</label><br>
    <textarea name="isi" rows="5"><?php echo $row['isi']; ?></textarea><br><br>
    <input type="submit" value="Simpan">
    <a href="Home.php" onclick="document.getElementById('myForm').reset();">Kembali ke Home</a>

</form>


</body>
</html>
