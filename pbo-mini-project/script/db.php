<?php

class Database {
  public $con;
  public function __construct(
    $server = "localhost",
    $username = "root",
    $password = "",
    $dbName = "pbo_db"
  ) {
    $this->con = mysqli_connect($server, $username, $password, $dbName);

    if(!$this->con) {
      die("Connection failed :" . mysqli_connect_error());
    }
  }

  public function query($sql) {

    $result = mysqli_query($this->con, $sql);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result))
    {
      $rows[] = $row;
    }
    return $rows;
  }

  public function registrasi($sql) {

    $fullName = stripcslashes($sql["fullname"]);
    $username = stripcslashes($sql["username"]);
    $password = mysqli_real_escape_string($this->con, $sql["password"]);
    $passwordConfirm = mysqli_real_escape_string($this->con, $sql["password-confirm"]);

    $query = "SELECT user_username FROM user_tb WHERE user_username = '$username'";
    $result = mysqli_query($this->con, $query);

    if( mysqli_fetch_assoc($result)) {
      echo "<script>
              alert('Username sudah terpakai!');
            </script>";
      return false;
    }

    if (strpos($username, ' ') == true) {
      echo "<script>
              alert('Username tidak boleh mengandung spasi');
            </script>";
      return false;
    }

    if( strlen($password) < 7) {
    echo "<script>
            alert('Password yang anda masukkan harus lebih dari 6 karakter');
          </script>";
    return false;
    }

    if( $password !== $passwordConfirm ) {
      echo "<script>
              alert('Password & Konfirmasi Password yang anda masukkan tidak sama');
            </script>";
      return false;
    }
  
    $hash = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($this->con, "INSERT INTO user_tb
                VALUES('', '$fullName', '$username', '$hash', '', '', '', ''
                )"
              );

              return mysqli_affected_rows($this->con);
  }

  function ubah($sql) //$add penghubung dengan $_POST pada tambah.php
{
    mysqli_query($this->con, $sql);

    return mysqli_affected_rows($this->con);
}
}