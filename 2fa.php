<?php
session_start();
include('banco_de_dados/conexaosql.php');

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

$sql_code = "SELECT CPF, Nome, Email, Nome_Materno, Celular, Tel_Fixo, Endereco, Login, Data_Nascimento, Sexo, Senha, Tipo, Statuses FROM usuario WHERE login = '" . $_SESSION['login'] . "'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" . $mysqli->error);
$usuario = $sql_query->fetch_assoc();

$perguntas = array(
    "Qual é o CEP do seu endereço?" => $usuario['Endereco'],
    "Qual é o nome da sua mãe?" => $usuario['Nome_Materno'],
    "Qual é a sua data de nascimento?" => $usuario['Data_Nascimento']
);

$pergunta_aleatoria = array_rand($perguntas);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if ($_POST['resposta'] == $perguntas[$pergunta_aleatoria]) {

        header("Location: index.php");
        $_SESSION['2fa'] = true;
    } else {
        session_destroy();
        header("Location: login.php");
    }
} ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style-login-cad.css" />
    <link rel="stylesheet" href="2fa_style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Onest">
    <script src="" defer></script>
    <title>2FA - Verificação de Duas Etapas</title>
</head>

<body>
    <div class="container-2fa">
        <div class="div-logo-2fa">
            <a class="ancora-logo-2fa" href="index.php"><img src="https://es.logodownload.org/wp-content/uploads/2018/12/claro-logo-1-11-768x288.png" alt="logo claro" /></a>
        </div>
        <h1>Verificação de Duas Etapas</h1>
        <p class="pergunta-2fa">Pergunta: <?php echo $pergunta_aleatoria; ?></p>
        <form method="post" action="">
            <input class="input-resposta" type="text" name="resposta" placeholder="Sua Resposta" required>
            <button class="botao-confirmar" type="submit">Confirmar Resposta</button>
        </form>
    </div>
</body>

</html>