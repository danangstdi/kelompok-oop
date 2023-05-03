<?php

session_start();

require_once 'script/db.php';
require_once 'asset/component/function.php';
require_once 'asset/component/icon.php';

$db = new Database();
$id = $_GET['id'];
$row = $db->query("SELECT * FROM user_tb WHERE id = $id")[0];

if(isset($_POST["btn-logout"])) {
  echo "<script>
          var confirm = confirm('yakin ingin keluar?');
          if (confirm == true) {
            document.location.href ='script/logout.php';
          }else {
            document.location.href = 'account.php?id=$id';
          }
        </script>";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini Project | Account</title>
  <link rel="stylesheet" href="style/account.css">
</head>
<body>
  

  <nav>
    <a href="index.php?id=<?= $id ?>" class="back">
      <?php back() ?>
    </a>
    <h1>MINI PROJECT</h1>
    <ul>
      <li>
        <a href="#">
          <?php chat() ?>
        </a>
      </li>
      <li>
        <a href="#">
          <?php cart() ?>
        </a>
      </li>
    </ul>
  </nav>

  <div class="container">
    <div class="left">
      <div class="photo-frame">
        <span>Anda belum mengatur foto profil</span>
        <img src="asset/img/<?= $row['user_photo'] ?>">
      </div>
      <button class="change-photo">Ubah Foto Profil</button>
      <a href="edit.php?id=<?= $id ?>">
        <button>Ubah Biodata</button>
      </a>
      <button class="change-password">Ubah Password</button>
      <form action="" method="post">
      <button type="submit" class="btn-logout" name="btn-logout" id="btn-logout">Logout</button>
      </form>
    </div>

    <div class="right">
      <h1>ACCOUNT SETTING</h1>
      <p></p>
      <div class="nama-lengkap">
        <label>Nama Lengkap :</label><br>
        <span><?= $row['user_name'] ?></span>
      </div>
      <br><br>
      <div class="username">
        <label>Username :</label><br>
        <span><?= $row['user_username'] ?></span>
      </div>
      <br><br>
      <div class="username">
        <label>Gender :</label><br>
        <span><?= $row['user_gender'] ?></span>
      </div>
      <br><br>
      <div class="alamat">
        <label>Alamat :</label><br>
        <span><?= $row['user_addres'] ?></span>
      </div>
      <br><br>
      <div class="no">
        <label>No Handphone :</label><br>
        <span><?= $row['user_no'] ?></span>
      </div>
    </div>
  </div>

</body>
</html>