<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style-login-cad.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Onest">
    <script src="" defer></script>
    <title>Erro de Autenticação</title>
    <style>
        .titulo-erro {
            font-family: 'Onest', sans-serif;
            text-align: center;
            margin-top: 25%;
        }

        .mensagem-erro {
            font-family: 'Onest', sans-serif;
            text-align: center;
            margin-top: 5%;
            margin-bottom: 10%;
        }

        .botao-voltar {
            margin-left: 35%;
            border: none;
            outline: none;
            padding: 5px 25px;
            background: #de0d0d;
            color: #fff;
            cursor: pointer;
            font-size: 1.1em;
            border-radius: 15px;
            font-weight: 600;
            width: 100%;
            margin-top: 10px;
            box-shadow: 4px 5px 5px #00000047;
            text-decoration: none;
            margin: 36px;
        }

        .botao-voltar:hover {
            background: #b31a1a;
        }

        .botao-voltar:active {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <section class="container-login">
        <div class="div-logo">
            <a class="ancora-logo" href="index.php"><img src="https://es.logodownload.org/wp-content/uploads/2018/12/claro-logo-1-11-768x288.png" alt="logo claro" /></a>
        </div>
        <h1 class="titulo-erro">Erro</h1>
        <p class="mensagem-erro">Ocorreu um erro ao tentar acessar essa página. Contate o suporte e tente novamente.</p>
        <a class="botao-voltar" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511993031052&text=Olá,%20Preciso%20de%20ajuda%20sobre%20minha%20conta%20">Suporte</a>
        <a class="botao-voltar" href="javascript:void(0)" onClick="history.go(-1); return false;">Voltar</a>
    </section>


</body>

</html>