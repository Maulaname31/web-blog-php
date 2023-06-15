<?php
include "../koneksi.php";

session_start();

if (!isset($_SESSION['status'])) {
    header("Location: Login.php");
    exit;
}

if (isset($_GET['delete_id'])) {

    $delete_id = $_GET['delete_id'];

    $delete_query = "DELETE FROM tb_blog WHERE id = '$delete_id'";
    $delete_result = mysqli_query($koneksi, $delete_query);

    if ($delete_result) {
        echo "<script>alert('Data berhasil dihapus.');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<html>
    <head>
        <title>Daftar List</title>
        <link rel="stylesheet" href="css/home.css">
    </head>
<body>
    
<hr>
<h2>Hello,Admin</h2>


<legend><h2>List Artikel</h2></legend>
<table border="1">
<thead>
<th>No</th>
<th>Judul</th>
<th>Isi konten</th>
<th>Aksi</th>
</thead>
<tbody>
<?php
include '../koneksi.php';
$no = 1;
$data = mysqli_query($koneksi,"select * from tb_blog");
while($d = mysqli_fetch_array($data))
{
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $d['judul']; ?></td>
<td>
    <?php
    $words = explode(' ', $d['isi']);
    if (count($words) > 10) {
        $words = array_slice($words, 0, 10);
        $limitedContent = implode(' ', $words) . " ...";
        echo $limitedContent;
    } else {
        echo $d['isi'];
    }
    ?>
</td>
<td>
    <a href="detail.php?id=<?php echo $d['id']; ?>" class="link-detail">DETAIL</a>
    <a href="edit.php?id=<?php echo $d['id']; ?>" class="link-edit">EDIT</a>
    <a href="?delete_id=<?php echo $d['id']; ?>" onclick="return confirm('Yakin Dihapus !?')" class="link-delete">HAPUS</a>
</td>

</tr>
<?php
}?>

</tbody>

</table>
<a href="tambah.php" class="tambah">Tambahkan artikel</a>
<a href="Logout.php" class="logout">Log out</a>
</body>
</html>
