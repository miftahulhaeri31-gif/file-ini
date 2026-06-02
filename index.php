<?php 
include 'session.php';
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html>
<head>
<title>Musik App</title>

<style>
body{
    background:#121212;
    color:white;
    font-family:Arial;
}

h2{
    text-align:center;
}

a{
    color:#1db954;
    text-decoration:none;
}

.container{
    width:80%;
    margin:auto;
}

.card{
    background:#1e1e1e;
    padding:15px;
    margin:10px 0;
    border-radius:10px;
}

audio{
    width:100%;
    margin-top:10px;
}

.top{
    display:flex;
    justify-content:space-between;
}
</style>
</head>

<body>

<div class="container">

<div class="top">
<h2>🎧 Musik Streaming</h2>
<div>
<a href="tambah.php">+ Tambah</a> | 
<a href="logout.php">Logout</a>
</div>
</div>

<?php
$data = mysqli_query($conn,"SELECT * FROM lagu");

while($d = mysqli_fetch_array($data)){
?>
<div class="card">

    <img src="cover/<?= $d['cover'] ?>" width="120">

    <h3><?= $d['judul'] ?></h3>
    <p><?= $d['penyanyi'] ?></p>

    <audio controls>
        <source src="upload/<?= $d['file_lagu'] ?>" type="audio/mpeg">
    </audio>

    <br><br>
    <a href="edit.php?id=<?= $d['id'] ?>">Edit</a> |
    <a href="hapus.php?id=<?= $d['id'] ?>">Hapus</a>
</div>
<?php } ?>

</div>

</body>
</html>