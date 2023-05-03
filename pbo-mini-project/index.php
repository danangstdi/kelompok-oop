<?php

session_start();

require_once 'script/db.php';
require_once 'asset/component/function.php';
require_once 'asset/component/icon.php';

$db = new Database();
$row = $db->query("SELECT * FROM user_tb");
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toko Sport | Home</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>

  <nav>
    <h1>MINI PROJECT</h1>
    <ul>
      <li><a href="#">Jersey</a></li>
      <li><a href="#">Sepatu</a></li>
      <li><a href="#">Bola</a></li>
      <li><a href="#">Alat</a></li>
      <li><a href="#">Suplemen</a></li>
    </ul>
    <a href="
      <?php
        if(isset($_SESSION["login"])) {
          echo 'account.php?id=' . $id;
        }else {
          echo 'login.php';
        }
      ?>">
      <?php
        if(isset($_SESSION["login"])) {
          Login();
        }else {
          nonLogin();
        }
      ?>
    </a>
  </nav>

  <section class="secs-1">
    <div class="left">
      <h1>Pilih Apapun Yang Anda Inginkan</h1>
      <p>Semua kebutuhan untuk berolahraga anda tersedia disini</p>
    </div>
    <div class="right">
      <div class="lingkaran"></div>
    </div>
  </section>

  <section class="secs-2">
    <div class="top">
      <h1>NEW ARRIVALS</h1>
      <a href="">SELENGKAPNYA ></a>
    </div>
    <div class="box-parent">
      <?php
        newArrival("new-arrival-1.jpg");
        newArrival("new-arrival-2.jpg");
        newArrival("new-arrival-3.webp");
      ?>
    </div>
  </section>

  <section class="secs-3">
    <div class="top">
      <h1>TREND COLLECTIONS</h1>
      <a href="">SELENGKAPNYA ></a>
    </div>
    <div class="container">
      <?php
        card("push-up-board.jpg", "Push Up Board", "40.000");
        card("grip.webp", "Hand Grip", "27.000");
        card("running-watches.jpg", "Running Watches", "377.000");
        card("monster.jpg", "Monster Energy Drink", "990.000");
      ?>
    </div>
  </section>

  <section class="secs-4">
    <a href="#">
      <div class="opt">
        <img src="asset/img/bola.jpg" alt="">
        <h1>Temukan Yang Berhubungan Dengan Permainan Bola</h1>
      </div>
    </a>
    <a href="#">
      <div class="opt">
        <img src="asset/img/atletik.jpeg" alt="">
        <h1>Temukan Yang Berhubungan Dengan Olahraga Atletik</h1>
      </div>
    </a>
  </section>

  <footer>
    <div class="foot">
      <h2>MINI PROJECT</h2>
    </div>
    <div class="foot">
      <h2>Kategori</h2>
      <ul>
        <li><a href="">Jersey</a></li>
        <li><a href="">Sepatu</a></li>
        <li><a href="">Bola</a></li>
        <li><a href="">Alat</a></li>
        <li><a href="">Suplemen</a></li>
      </ul>
    </div>
    <div class="foot">
      <h2>Kontak</h2>
      <ul>
        <li><a href="#">danangstd17@gmail.com</a></li>
        <li><a href="#">+62 853-3583-7454</a></li>
        <li><a href="#">Jombang, Jawa Timur</a></li>
      </ul>
    </div>
    <div class="foot">
      <h2>Sosial Media</h2>
      <ul>
        <li>
          <a href="https://www.instagram.com/danangstd_/">
            <?php instagram() ?>
          </a>
        </li>
        <li>
          <a href="https://web.facebook.com/setiadi.danang.16"> 
            <?php facebook() ?>
          </a>
        </li>
        <li>
          <a href="https://github.com/danangstdi"> 
            <?php github() ?>
          </a>
        </li>
      </ul>
    </div>
  </footer>
  <hr>
  <footer class="copyright">
    <p>Mini Project Copyright © 2023 All Rights Reserved</p>
  </footer>

</body>
</html>