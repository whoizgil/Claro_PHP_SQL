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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços - Claro</title>
    <link rel="stylesheet" href="../assets/css/style_main.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Onest">
    <title>Serviços</title>
    <style>
        * {
            font-family: 'Onest', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background-color: #cccccc;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #CE2D2D;

        }

        @media screen and (max-width: 1384px) {
            .plano-net {
                font-weight: 400;
            }

            .preco-net {
                font-size: 20px;
            }

            .titulo-net {
                font-size: 2rem;
                margin-top: 115px;
                /* flex-direction: column; */
                margin-bottom: 45px;
            }

            .servico_internet {
                display: flex;
                margin-top: 3%;
                flex-direction: column;
                align-items: center;
            }

            .card-internet,
            .card-internet2 {
                margin-bottom: 25px;
            }
        }


        .titulo-net {
            margin-top: 100px;
            color: black;
            text-align: center;
            font-family: 'Onest', sans-serif;
            font-weight: 500px;
            color: black;
            text-shadow: -1px 3px 3px rgba(173, 12, 55, 0.56);
        }

        .servico_internet {
            display: flex;
            justify-content: center;
            margin-top: 3%;
            margin-right: 45px;
        }

        .card-internet {
            background-color: #DCDCDC;
            width: 390px;
            height: 410px;
            border-radius: 15px;
            -webkit-box-shadow: 0px 1px 23px 13px rgba(204, 24, 24, 0.34), 0px 12px 17px 1px rgba(0, 0, 0, 0.44);
            box-shadow: 0px 1px 23px 13px rgba(204, 24, 24, 0.34), 0px 12px 17px 1px rgba(0, 0, 0, 0.44);
            text-align: center;
            padding-top: 20px;
            margin-left: 3%;
            padding: 12px;
        }

        .plano-net {
            font-family: 'Onest', sans-serif;
            color: black;
            font-weight: 800;
            padding-top: 30px
        }

        .info-net {
            font-family: 'Onest', sans-serif;
            font-size: 25px;
            color: black;
            padding-top: 10px;
        }

        .sub-net {
            font-family: 'Onest', sans-serif;
            font-size: 20px;
            color: black;
            margin-top: 10px;
            padding-top: 10px;
        }

        .preco-net {
            font-family: 'Onest', sans-serif;
            font-size: 30px;
            color: black;
            padding-top: 10px;
        }

        .span-net {
            font-family: 'Onest', sans-serif;
            font-size: 50px;
            color: black;
            padding-top: 10px;
            font-weight: 800;
        }

        .botao-net {
            font-family: 'Onest', sans-serif;
            background-color: #FF0000;
            color: white;
            border-radius: 15px;
            font-weight: 600;
            box-shadow: 4px 5px 5px #00000047;
            font-size: 30px;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            margin-top: 5%;
            width: 210px;
            height: 60px;
            line-height: 60px;
        }

        .botao-net:hover {
            background-color: #FF6347;
            text-decoration: none;
            color: var(--cor-secundaria);
        }

        .botao-net:active {
            opacity: 0.8;
        }

        .titulo-celular {
            margin-top: 5%;
            color: black;
            text-align: center;
            font-family: 'Onest', sans-serif;
            font-weight: 500px;
            color: black;
            text-shadow: -1px 3px 3px rgba(173, 12, 55, 0.56);
        }

        .card-internet2 {
            background-color: #DCDCDC;
            width: 390px;
            height: 500px;
            border-radius: 15px;
            -webkit-box-shadow: 0px 1px 23px 13px rgba(204, 24, 24, 0.34), 0px 12px 17px 1px rgba(0, 0, 0, 0.44);
            box-shadow: 0px 1px 23px 13px rgba(204, 24, 24, 0.34), 0px 12px 17px 1px rgba(0, 0, 0, 0.44);
            text-align: center;
            padding-top: 20px;
            margin-left: 3%;
        }
    </style>
</head>

<body>
    <!--NavBar Início-->
    <div class="navbar">
        <?php include_once('../assets/elements/navbar.php'); ?>
    </div>
    <!--NavBar Fim-->

    <section>
        <div>
            <h1 class="titulo-net">Planos de internet para a sua casa</h1>
        </div>
        <div class="servico_internet">
            <div class="card-internet">
                <h1 class="plano-net">100 Mega</h1>
                <p class="info-net">Internet para a sua casa com Wi-fi grátis.</p>
                <h2 class="sub-net">Por apenas:</h2>
                <p class="preco-net">R$<span class='span-net'> 59,00 </span>/ mês</p>
                <a class="botao-net" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511993031052&text=Ol%C3%A1,%20gostaria%20de%20contratar%20servi%C3%A7o%20de%20internet%20=))">Contratar</a>
            </div>
            <div class="card-internet">
                <h1 class="plano-net">200 Mega</h1>
                <p class="info-net">Internet para a sua casa com Wi-fi grátis.</p>
                <h2 class="sub-net">Por apenas:</h2>
                <p class="preco-net">R$<span class='span-net'> 100,00 </span>/ mês</p>
                <a class="botao-net" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511993031052&text=Ol%C3%A1,%20gostaria%20de%20contratar%20servi%C3%A7o%20de%20internet%20=))">Contratar</a>
            </div>
            <div class="card-internet">
                <h1 class="plano-net">300 Mega</h1>
                <p class="info-net">Internet para a sua casa com Wi-fi grátis.</p>
                <h2 class="sub-net">Por apenas:</h2>
                <p class="preco-net">R$<span class='span-net'> 159,90 </span>/ mês</p>
                <a class="botao-net" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511993031052&text=Ol%C3%A1,%20gostaria%20de%20contratar%20servi%C3%A7o%20de%20internet%20=))">Contratar</a>
            </div>
            <div class="card-internet">
                <h1 class="plano-net">500 Mega</h1>
                <p class="info-net">Internet para a sua casa com Wi-fi grátis.</p>
                <h2 class="sub-net">Por apenas:</h2>
                <p class="preco-net">R$<span class='span-net'> 250,00 </span>/ mês</p>
                <a class="botao-net" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511993031052&text=Ol%C3%A1,%20gostaria%20de%20contratar%20servi%C3%A7o%20de%20internet%20=))">Contratar</a>
            </div>
        </div>
    </section>
    <section>
        <div>
            <h1 class="titulo-celular">Planos de celular com bônus de internet</h1>
        </div>
        <div class="servico_internet">
            <div class="card-internet2">
                <h1 class="plano-net">Controle 15GB</h1>
                <p class="info-net">8GB plano + 7GB de bônus</p>
                <p class="info-net">Apps ilimitados sem descontar da franquia</p>
                <h2 class="sub-net">Por apenas:</h2>
                <p class="preco-net">R$<span class='span-net'> 49,90 </span>/mês</p>
                <a class="botao-net" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511993031052&text=Ol%C3%A1,%20gostaria%20de%20contratar%20servi%C3%A7o%20de%20internet%20=))">Contratar</a>
            </div>
            <div class="card-internet2">
                <h1 class="plano-net">Controle 20GB</h1>
                <p class="info-net">10GB plano + 10GB de bônus</p>
                <p class="info-net">Apps ilimitados sem descontar da franquia</p>
                <h2 class="sub-net">Por apenas:</h2>
                <p class="preco-net">R$<span class='span-net'> 59,90 </span>/mês</p>
                <a class="botao-net" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511993031052&text=Ol%C3%A1,%20gostaria%20de%20contratar%20servi%C3%A7o%20de%20internet%20=))">Contratar</a>
            </div>
            <div class="card-internet2">
                <h1 class="plano-net">Controle 50GB</h1>
                <p class="info-net">25GB plano + 25GB de bônus</p>
                <p class="info-net">Apps ilimitados sem descontar da franquia</p>
                <h2 class="sub-net">Por apenas:</h2>
                <p class="preco-net">R$<span class='span-net'> 99,90 </span>/mês</p>
                <a class="botao-net" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511993031052&text=Ol%C3%A1,%20gostaria%20de%20contratar%20servi%C3%A7o%20de%20internet%20=))">Contratar</a>
            </div>
        </div>
    </section>




    <div class="footer">
        <?php include_once('../assets/elements/footer.php'); ?>
    </div>
</body>

</html>