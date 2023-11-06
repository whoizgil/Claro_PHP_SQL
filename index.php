<?php
session_start();
if (!isset($_SESSION['login']) || !isset($_SESSION['2fa']) || $_SESSION['2fa'] !== true) {
  header("Location: erro_login.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style_teste.css" />
  <title>Tela Inicial</title>
  <style>
    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      background-color: #cccccc;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #CE2D2D;

    }
  </style>

</head>

<body>
  <!--NavBar Início-->
  <div class="navbar">
    <?php include_once('navbar_main.php'); ?>
  </div>
  <!--NavBar Fim-->
  </div>
  <!--Wave Início-->
  <div class="header">
    <div class="inner-header flex">
      <a href="index.php"><img style="
              display: block;
              margin: auto;
              transition: background-color 300ms;
            " src="https://seeklogo.com/images/C/Claro-logo-73D218C14E-seeklogo.com.png" /></a>
    </div>
    <div class="div-waves">
      <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
          <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
          <use xlink:href="#gentle-wave" x="48" y="0" fill="#f40d0d" />
          <use xlink:href="#gentle-wave" x="48" y="3" fill="#de0d0d" />
          <use xlink:href="#gentle-wave" x="48" y="5" fill="#e33f2c" />
          <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
        </g>
      </svg>
    </div>
  </div>
  <!--Wave Fim-->

  <div class="footer">
    <?php include_once('footer.php'); ?>
  </div>
  <script src="main-script.js"></script>
</body>

</html>