<?php 
include 'session.php';
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Lagu</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<div class="top">
    <h2>➕ Tambah Lagu</h2>
    <div>
        <a href="index.php">Kembali</a> | 
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="card">

<form method="POST" enctype="multipart/form-data">
Judul: <br>
<input type="text" name="judul"><br><br>

Penyanyi: <br>
<input type="text" name="penyanyi"><br><br>

File Lagu: <br>
<input type="file" name="file"><br><br>

Foto Album: <br>
<input type="file" name="cover"><br><br>

<button name="simpan">Simpan</button>
</form>

</div>

</div>

</body>
</html>

<?php
if(isset($_POST['simpan'])){
    $judul = $_POST['judul'];
    $penyanyi = $_POST['penyanyi'];

    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];

    $cover = $_FILES['cover']['name'];
    $tmp_cover = $_FILES['cover']['tmp_name'];

    move_uploaded_file($tmp_cover, "cover/".$cover);

    move_uploaded_file($tmp, "upload/".$file);

    mysqli_query($conn,"INSERT INTO lagu VALUES(NULL,'$judul','$penyanyi','$file','$cover')");

    header("location:index.php");
}
?>