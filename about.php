<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sobre Nós</title>
  <link rel="stylesheet" href="style_teste.css" />
  <style>
    .container {

      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: auto auto;
      gap: 10px;
      width: 80%;
      margin: 20px auto;
      margin-top: 185px;
      display: flex;
      justify-content: space-between;

    }

    .card {
      background-color: white;
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
      font-family: Arial, sans-serif;
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
      font-family: Arial, sans-serif;
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
        <p>Descrição 2</p>
      </div>
    </div>
    <div class="card" id="card2">
      <img c src="assets/syndra_projeto.jpg" alt="Foto 2">
      <div class="info-card">
        <h3>Syndra</h3>
        <p>Descrição 2</p>
      </div>
    </div>
    <div class="card" id="card3">
      <img src="assets/evelynn_projeto.jpg" alt="Foto 3">
      <div class="info-card">
        <h3>Evelynn</h3>
        <p>Descrição 2</p>
      </div>
    </div>
  </div>

</body>

</html>