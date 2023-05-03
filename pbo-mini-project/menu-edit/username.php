<?php

require_once '/xampp/htdocs/pbo-mini-project/script/db.php';

$db = new Database();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $row = $db->query("SELECT * FROM user_tb WHERE id = $id")[0];
} else {
    echo "Data tidak ditemukan";
    exit();
}

if (isset($_POST["selesai"])) {
    if (isset($_POST["user_username"])) {
        $username = $_POST["user_username"];
        if (mysqli_query($db->con, "UPDATE user_tb SET user_username = '$username' WHERE id = $id") > 0 ) {
            echo "<script>
                      alert('Username anda berhasil diubah!');
                      document.location.href = '/pbo-mini-project/account.php?id=$id';
                  </script>";
        } else {
            echo "<script>
                      alert('Username anda gagal diubah!');
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
</head>
<body>
    <form action="" method="post">
        <label for="user_username">Username</label>
        <input type="text" name="user_username" value="<?= $row['user_username'] ?>" required autocomplete="off">
        <p></p>
        <button type="submit" name="selesai">Selesai</button>
    </form>
</body>
</html>
