<html>



<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/update.css">
</head>
<body>
<h1 style="text-align: center;">Buat artikel</h1>
<form action="save.php" method="POST" enctype="multipart/form-data">
<table>
<tr>

 <label for="image">Gambar:</label>
<input type="file" id="image" name="image" accept="image/*">

  <label for="judul">Judul:</label>
  <input type="text" id="judul" name="judul" required><br><br>
  
  <label for="isi">Isi:</label>
  <textarea id="isi" name="isi" rows="4" required></textarea><br><br>
<td>
<input type="submit" value="simpan">
<button onclick="window.location.href = 'home.php';" class="btn btn-primary">Kembali ke Home</button>

</td>
</tr>
</table>
</form>
</body>
</html>