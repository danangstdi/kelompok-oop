<?php

session_start();

require_once 'script/db.php';
require_once 'asset/component/icon.php';

$db = new Database();

if( isset($_POST["btn-login"]) ) {
  
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($db->con, "SELECT * FROM user_tb WHERE user_username = '$username'");
  
  if( mysqli_num_rows($result) === 1 ) {
    $row = mysqli_fetch_assoc($result);
    
    //cek kesamaan password pada inputan dan database yang telah ter-hash menggunakan built-in function password_verify()
    if( password_verify($password, $row["user_password"]) ) {
      $_SESSION["login"] = true;
      $name = $row['user_name'];
      $id = $row['id'];
      echo "<script>
              alert('Selamat Datang $name');
              document.location.href = 'index.php?id=$id';
            </script>";
      exit;
    }
  }
 $error = false ;
}

if( isset($error) ) {
  echo "<script>
          alert('Username atau Password yang anda masukkan salah');
        </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini Project | Login</title>
  <link rel="stylesheet" href="style/login.css">
</head>
<body>
  
  <div class="lingkaran"></div>

  <div class="container">
    <div class="left">
        <a href="index.php">
          <?php back2() ?>
        </a>
        <h1>SIGN IN</h1>
        <form action="" method="post">
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
          <button type="submit" class="btn-login" name="btn-login" id="btn-login">Login</button>
          <p><a href="registrasi.php">Belum punya akun?</a></p>
        </form>
      </div>
    <div class="right">
      <img src="asset/img/login.jpg" alt="">
    </div>
  </div>

</body>
</html>