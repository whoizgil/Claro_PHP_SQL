<?php
session_start();
include('../config/database/conexaosql.php');

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit();
}

if (isset($_SESSION['2fa']) && $_SESSION['2fa'] == true) {
    header("Location: main.php");
    exit();
}

if ($_SESSION['tipo'] == 'm') {
    $_SESSION['2fa'] = true;
    header('location: main.php');
    exit();
}

$sql_code = "SELECT CPF, Nome, Email, Nome_Materno, Celular, Tel_Fixo, Endereco, Login, Data_Nascimento, Sexo, Senha, Tipo, Statuses, CEP FROM usuario WHERE login = '" . $_SESSION['login'] . "'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" . $mysqli->error);
$usuario = $sql_query->fetch_assoc();

$perguntas = array(
    "Qual é o CEP do seu endereço?" => $usuario['CEP'],
    "Qual é o nome da sua mãe?" => $usuario['Nome_Materno'],
    "Qual é a sua data de nascimento?" => $usuario['Data_Nascimento']
);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    unset($_SESSION['pergunta']);
}


if (!isset($_SESSION['pergunta'])) {
    $_SESSION['pergunta'] = array_rand($perguntas);
}

$pergunta_aleatoria = $_SESSION['pergunta'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($pergunta_aleatoria == "Qual é a sua data de nascimento?") {
        $data_nascimento = $_POST['resposta'];
        $data_nascimento_format = date('Y-m-d', strtotime(str_replace('/', '-', $data_nascimento)));

        if ($data_nascimento_format != '1970-01-01' && strtotime($data_nascimento_format)) {
            if ($data_nascimento_format == $usuario['Data_Nascimento']) {
                $_SESSION['2fa'] = true;
                unset($_SESSION['pergunta']);
                echo "<script>alert('Você logou com sucesso!'); window.location.href='main.php';</script>";
                exit();
            } else {
                session_destroy();
                echo "<script>alert('Credenciais incorretas. Logue novamente.'); window.location.href='../index.php';</script>";
                exit();
            }
        }
    } elseif ($_POST['resposta'] == $perguntas[$pergunta_aleatoria]) {
        unset($_SESSION['pergunta']);
        echo "<script>alert('Você logou com sucesso!'); window.location.href='main.php';</script>";
        $_SESSION['2fa'] = true;
        exit();
    } else {
        session_destroy();
        echo "<script>alert('Credenciais incorretas. Logue novamente.'); window.location.href='../index.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style-login-cad.css" />
    <link rel="stylesheet" href="../assets/css/2fa_style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Onest">
    <script src="" defer></script>
    <title>2FA - Verificação de Duas Etapas</title>
</head>

<body>
    <div class="container-2fa">
        <div class="div-logo-2fa">
            <a class="ancora-logo-2fa" href="main.php"><img src="https://es.logodownload.org/wp-content/uploads/2018/12/claro-logo-1-11-768x288.png" alt="logo claro" /></a>
        </div>
        <h1>Verificação de Duas Etapas</h1>
        <p class="pergunta-2fa">Pergunta: <?php echo $pergunta_aleatoria; ?></p>
        <form method="post" action="">
            <?php if ($pergunta_aleatoria == "Qual é a sua data de nascimento?") : ?>
                <input class="input-resposta" type="date" name="resposta" required>
            <?php else : ?>
                <input class="input-resposta" type="text" name="resposta" placeholder="Sua Resposta" required>
            <?php endif; ?>
            <button class="botao-confirmar" type="submit">Confirmar Resposta</button>
        </form>
    </div>
</body>

</html>