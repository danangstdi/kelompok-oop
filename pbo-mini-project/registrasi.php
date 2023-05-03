<?php

session_start();

if(isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

require_once 'script/db.php';
require_once 'asset/component/icon.php';

$db = new Database();

if( isset( $_POST["btn-login"]) ) {
  if( $db->registrasi($_POST) > 0 ) {
    echo "<script>
            alert('Anda berhasil mendaftar');
            document.location.href = 'login.php';
          </script>";
  }else {
    echo mysqli_error($db->con);
  }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini Project | Registration</title>
  <link rel="stylesheet" href="style/registrasi.css">
</head>
<body>
  
  <div class="lingkaran"></div>

  <div class="container">
    <div class="left">
        <a href="index.php">
          <?php back2() ?>
        </a>
        <h1>SIGN UP</h1>
        <form action="" method="post">
          <div class="name">
            <label for="name">Nama Lengkap</label>
            <br>
            <input type="text" name="fullname" id="fullname" required autocomplete="off">
          </div>
          <br>
          <div class="username">
            <label for="username">Username</label>
            <br>
            <input type="text" name="username" id="username" required autocomplete="off">
          </div>
          <br>
          <div class="password">
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" id="password" required>
          </div>
          <br>
          <div class="password-confirm">
            <label for="password-confirm">Password Confirm</label>
            <br>
            <input type="password" name="password-confirm" id="password-confirm" required>
          </div>
          <button type="submit" class="btn-login" name="btn-login" id="btn-login">Create Account</button>
          <p><a href="login.php">Sudah punya akun?</a></p>
        </form>
    </div>
    <div class="right">
      <img src="asset/img/login.jpg" alt="">
    </div>
  </div>

</body>
</html>