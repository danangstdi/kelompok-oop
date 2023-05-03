<?php

require_once 'script/db.php';

$db = new Database();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $row = $db->query("SELECT * FROM user_tb WHERE id = $id")[0];
} else {
    echo "Data tidak ditemukan";
    exit();
}

if(isset($_POST["batal"])){
  echo "<script>
          alert('Yakin ingin membatalkan perubahan?');
          document.location.href = 'account.php?id=$id';
        </script>";
}

if (isset($_POST["selesai"])) {
    if (isset($_POST["user_name"])) {
        $name = $_POST["user_name"];
        $username = $_POST["user_username"];
        $gender = $_POST["user_gender"];
        $addres = $_POST["user_addres"];
        $number = $_POST["user_no"];
        if (mysqli_query($db->con, "UPDATE user_tb SET 
          user_name = '$name',
          user_username = '$username',
          user_gender = '$gender',
          user_addres = '$addres',
          user_no = '$number'
           WHERE id = $id") > 0 ) {
            echo "<script>
                      alert('Data anda berhasil diubah!');
                      document.location.href = '/pbo-mini-project/account.php?id=$id';
                  </script>";
        } else {
            echo "<script>
                      alert('Data anda gagal diubah!');
                      document.location.href = '/pbo-mini-project/account.php?id=$id';
                  </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style/edit.css">
</head>
<body>

    <div class="lingkaran"></div>

    <form action="" method="post">
        <div class="container">
          <h1>BIODATA</h1>
          <div class="form">
            <label for="user_name">Nama</label>
            <input type="text" name="user_name" value="<?= $row['user_name'] ?>" required autocomplete="off">
          </div>
          <br>
          <div class="form">
            <label for="user_username">Username</label>
            <input type="text" name="user_username" value="<?= $row['user_username'] ?>" required autocomplete="off">
          </div>
          <br>
          <div class="form">
            <label for="user_gender">Gender</label>
            <select name="user_gender" id="user_gender">
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
              <option value="Geh">Geh</option>
            </select>
          </div>
          <br>
          <div class="form">
            <label for="user_addres">Alamat</label>
            <input type="text" name="user_addres" value="<?= $row['user_addres'] ?>" required autocomplete="off">
          </div>
          <br>
          <div class="form">
            <label for="user_no">No HP</label>
            <input type="text" name="user_no" value="<?= $row['user_no'] ?>" required autocomplete="off">
          </div>
            <p></p>
          <div class="form-btn">
            <button type="submit" class="selesai" name="selesai">Selesai</button>
            <button type="submit" class="batalkan" name="batal">Batal</button>
          </div>
          </div>
        </form>
</body>
</html>
