<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<div class="top">
    <h2>🔐 Login Admin</h2>
</div>

<div class="card">

<form method="POST">
Username: <br>
<input type="text" name="username"><br><br>

Password: <br>
<input type="password" name="password"><br><br>

<button name="login">Login</button>
</form>

</div>

</div>

</body>
</html>

<?php
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $data = mysqli_query($conn,"SELECT * FROM admin WHERE username='$u' AND password='$p'");
    $cek = mysqli_num_rows($data);

    if($cek > 0){
        $_SESSION['login'] = true;
        header("location:index.php");
    }else{
        echo "Login gagal!";
    }
}
?>