<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
  header('location:erro_login.php');
}

$logado = $_SESSION['login'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sobre Nós</title>
  <link rel="stylesheet" href="style_teste.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Onest">
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

    .container {

      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: auto auto;
      gap: 10px;
      width: 80%;
      margin: 20px auto;
      margin-top: 115px;
      display: flex;
      justify-content: space-between;

    }

    .card {

      border: 1px solid #cccccc;
      padding: 10px;
      border: none;
    }

    .card img {
      width: 70%;
      height: auto;
      margin-left: 15%;
      border-radius: 3%;
      -webkit-box-shadow: 0px 1px 23px 13px rgba(204, 24, 24, 0.34), 0px 12px 17px 1px rgba(0, 0, 0, 0.44);
      box-shadow: 0px 1px 23px 13px rgba(204, 24, 24, 0.34), 0px 12px 17px 1px rgba(0, 0, 0, 0.44);


    }

    .card h3 {
      font-family: 'Onest', sans-serif;
      font-size: 18px;
      font-weight: bold;
      margin-top: 10px;
      text-shadow: 2px -2px 6px #CE2D2D;
      color: black;
    }

    .card h3:hover,
    .card p:hover {
      color: #CE2D2D;
      cursor: default;
    }

    .card p {
      font-family: 'Onest', sans-serif;
      font-size: 14px;
      margin-top: 5px;
    }

    .info-card {
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      align-content: space-around;
      align-items: center;
      margin-top: 10px;
    }



    #card1 img {
      max-height: 1155px;
      max-width: 830px;
    }

    #card3 img {
      max-width: 768px;
    }

    @media screen and (max-width: 800px) {
      .container {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        margin-top: 105px;
      }
    }
  </style>

</head>

<body>
  <!--NavBar Início-->
  <div class="navbar">
    <?php include_once('navbar_main.php'); ?>
  </div>
  <!--NavBar Fim-->
  <div class="container">
    <div class="card" id="card1">
      <img src="assets/morgana_projeto.jpg" alt="Foto 1">
      <div class="info-card">
        <h3>Morgana</h3>
        <p>Morgana é a visionária por trás da Claro, fundadora da empresa que transformou a maneira como nos conectamos. Com um olhar voltado para o futuro, ela acreditava que a comunicação poderia ser mais do que apenas uma troca de palavras - poderia ser uma ponte para unir pessoas. Sua paixão pela inovação tecnológica e sua visão empreendedora foram os pilares que deram vida à Claro, uma empresa que continua a moldar o mundo da telecomunicação.</p>
      </div>
    </div>
    <div class="card" id="card2">
      <img c src="assets/syndra_projeto.jpg" alt="Foto 2">
      <div class="info-card">
        <h3>Syndra</h3>
        <p>Syndra, a mulher à frente da Claro, assume a responsabilidade de liderar uma das maiores empresas de telecomunicações do mundo. Com habilidades notáveis de gestão e um profundo conhecimento do setor, ela guia a equipe da Claro rumo a uma trajetória de sucesso. A visão de Syndra é clara: proporcionar uma conectividade superior e inovações revolucionárias que atendam às necessidades em constante evolução de nossos clientes.</p>
      </div>
    </div>
    <div class="card" id="card3">
      <img src="assets/evelynn_projeto.jpg" alt="Foto 3">
      <div class="info-card">
        <h3>Evelynn</h3>
        <p>Evelynn é uma peça fundamental na equipe de desenvolvimento da Claro. Sua expertise técnica e criatividade são elementos cruciais para o aprimoramento contínuo dos serviços oferecidos pela empresa. Ela é apaixonada por desafios e está sempre buscando maneiras de melhorar a experiência dos usuários, garantindo que a Claro permaneça na vanguarda da inovação e ofereça soluções de alta qualidade para seus clientes.</p>
      </div>
    </div>
  </div>

  <div class="footer">
    <?php include_once('footer.php'); ?>
  </div>
</body>

</html>