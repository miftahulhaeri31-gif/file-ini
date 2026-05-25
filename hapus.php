<?php
include 'session.php';
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM lagu WHERE id='$id'");

header("location:index.php");
?>