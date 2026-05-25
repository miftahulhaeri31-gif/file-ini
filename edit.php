<?php 
include 'session.php';
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM lagu WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Lagu</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<div class="top">
    <h2>✏️ Edit Lagu</h2>
    <div>
        <a href="index.php">Kembali</a> | 
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="card">

<form method="POST">
Judul: <br>
<input type="text" name="judul" value="<?= $d['judul'] ?>"><br><br>

Penyanyi: <br>
<input type="text" name="penyanyi" value="<?= $d['penyanyi'] ?>"><br><br>

<button name="update">Update</button>
</form>

</div>

</div>

</body>
</html>

<?php
if(isset($_POST['update'])){
    mysqli_query($conn,"UPDATE lagu SET 
        judul='$_POST[judul]',
        penyanyi='$_POST[penyanyi]'
        WHERE id='$id'
    ");

    header("location:index.php");
}
?>