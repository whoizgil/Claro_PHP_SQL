<?php
session_start();
if (!isset($_SESSION['login']) || !isset($_SESSION['2fa']) || $_SESSION['2fa'] !== true) {
    header("Location: ../assets/error/erro_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/style_main.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Onest">
    <title>Modelo</title>
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

        * {
            font-family: 'Onest', sans-serif;
        }

        .imagem-modelo {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            margin-top: 7%;
        }



        .container-main-text {
            margin-top: 0px;
        }

        @media (max-width: 800px) {
            .imagem-modelo {
                margin-top: 20%;
            }
        }
    </style>
</head>

<body>
    <!--NavBar Início-->
    <div class="navbar">
        <?php include_once('../assets/elements/navbar.php'); ?>
    </div>
    <!--NavBar Fim-->

    <div class="imagem-modelo"><img src="../assets/img/modelo-er.png" alt=""></div>

    <div class="container-main-text">
        <p class="texto-main">Esse é o Modelo Entidade Relacionamento do nosso site!</p>
    </div>

    <div class="footer">
        <?php include_once('../assets/elements/footer.php'); ?>
    </div>
</body>

</html>