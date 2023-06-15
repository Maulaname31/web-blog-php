<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Memeriksa apakah parameter ID ada di form
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Mengambil data blog dari tabel tb_blog berdasarkan ID
        $sql = "SELECT * FROM tb_blog WHERE id = '$id'";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Memeriksa apakah file gambar diunggah
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $gambar = $_FILES['image']['name'];
                $gambar_tmp = $_FILES['image']['tmp_name'];
                $lokasi_gambar = "image/" . $gambar;

                // Memindahkan file gambar ke direktori upload
                move_uploaded_file($gambar_tmp, $lokasi_gambar);

                // Menghapus gambar lama
                $gambar_lama = $row['image'];
                if (!empty($gambar_lama) && file_exists("image/" . $gambar_lama)) {
                    unlink("image/" . $gambar_lama);
                }
            } else {
                $gambar = $row['image'];
            }

            // Mendapatkan data lainnya dari form
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];

            // Update data ke database
            $sql_update = "UPDATE tb_blog SET judul = '$judul', isi = '$isi', image = '$gambar' WHERE id = '$id'";
            if (mysqli_query($koneksi, $sql_update)) {
                header("Location: Home.php");
                exit;
            } else {
                echo "Error: " . mysqli_error($koneksi);
                exit;
            }
        } else {
            echo "ID tidak ditemukan.";
            exit;
        }
    } else {
        echo "ID tidak ditemukan.";
        exit;
    }
} else {
    echo "Metode request tidak valid.";
    exit;
}
?>
