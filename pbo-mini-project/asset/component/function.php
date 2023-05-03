<?php

function Login() {
  $element = "
  <svg id=\"person\" xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"30\" fill=\"rebeccapurple\" class=\"bi bi-person-circle\" viewBox=\"0 0 16 16\">
    <path d=\"M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z\"/>
    <path fill-rule=\"evenodd\" d=\"M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z\"/>
  </svg>
  ";
  echo $element;
}
function nonLogin() {
  $element = "
  <button type=\"button\" class=\"home-login\" name=\"home-login\" id=\"home-login\">
    Login
  </button>
  ";
  echo $element;
}

function account( $name, $username, $number, $addres, $photo) {
  $element = "
  <div class=\"container\">
    <div class=\"left\">
      <div class=\"photo-frame\">
        <img src=\"asset/img/$photo\">
      </div>
      <button class=\"change-photo\">Ganti Foto Profil</button>
      <button class=\"change-password\">Ganti Password</button>
      <a href=\"logout.php\">
        <button>Logout</button>
      </a>
    </div>

    <div class=\"right\">
      <h1>ACCOUNT SETTING</h1>
      <p></p>
      <div class=\"nama-lengkap\">
        <label>Nama Lengkap</label><br>
        <span>$name</span>
        <a href=\"\">ubah</a>
      </div>
      <br>
      <br>
      <div class=\"username\">
        <label>Username</label><br>
        <span>$username</span>
        <a href=\"\">ubah</a>
      </div>
      <br><br>
      <div class=\"alamat\">
        <label>Alamat</label><br>
        <span>$addres</span>
        <a href=\"\">ubah</a>
      </div>
      <br><br>
      <div class=\"no\">
        <label>No Handphone</label><br>
        <span>$number</span>
        <a href=\"\">ubah</a>
      </div>
    </div>
  </div>
  ";
  echo $element;
}

function newArrival($pict) {
  $element = "
    <div class=\"box\">
      <img src=\"asset/img/$pict\">
    </div>
  ";
  echo $element;
} 

function card($pict, $name, $price) {
  $element = "
  <a href=\"\">
        <div class=\"card\">
          <div class=\"img\">
            <img src=\"asset/img/$pict\" alt=\"\">
          </div>
          <h2 class=\"name\">$name</h2>
          <p>Rp $price</p>
        </div>
      </a>
  ";
  echo $element;
}

