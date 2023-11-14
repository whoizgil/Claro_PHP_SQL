<?php
session_start();
include('conexaosql.php');

if (!isset($_SESSION['login']) || !isset($_SESSION['2fa']) || $_SESSION['2fa'] !== true) {
  header("Location: ../../assets/error/erro_login.php");
  exit();
}

if ($_SESSION['tipo'] == 'm') {
  header('location:../../assets/error/erro_voltar.php');
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['nsenha']) && isset($_POST['csenha'])) {
    $nsenha = $_POST['nsenha'];
    $csenha = $_POST['csenha'];

    if ($nsenha === $csenha) {
      $sql = "UPDATE usuario SET Senha='$nsenha' WHERE Login='" . $_SESSION['login'] . "'";

      if (mysqli_query($mysqli, $sql)) {
        echo "<script>alert('Senha alterada com sucesso!'); window.location.href='../../public/main.php';</script>";
        exit();
      } else {
        echo "Erro ao alterar a senha: " . mysqli_error($mysqli);
      }
    } else {
      echo "<script>alert('As senhas não coincidem.');</script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/style-login-cad.css" />
  <title>Alteração</title>
</head>

<body class="recsenha-html">
  <section class="container-login">
    <div class="div-logo">
      <a class="ancora-logo" href="../../public/main.php"><img src="https://es.logodownload.org/wp-content/uploads/2018/12/claro-logo-1-11-768x288.png" alt="logo telecall" /></a>
    </div>
    <form id="formulario" action="" method="POST">
      <h1>Alterar Senha</h1>

      <div class="campo-cadastro">
        <input type="text" name="nsenha" id="nsenha" required="required" maxlength="8" minlength="8" />
        <span>Digite sua nova senha:</span>
        <i></i>
      </div>
      <div class="campo-cadastro">
        <input type="text" name="csenha" id="csenha" required="required" maxlength="8" minlength="8" />
        <span>Confirme sua nova senha:</span>
        <i></i>
      </div>

      <input class="botao-recsenha" type="submit" value="Enviar" />
      <input class="botao-limpar" type="button" value="Limpar Tela" onclick="" />

      <div class="links-login" id="cadastro">
        <p>Não tem uma conta? <a href="../../public/cadastro.php">Cadastre-se</a></p>
      </div>
    </form>
  </section>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const formulario = document.getElementById("formulario");
      const senha = document.getElementById("nsenha");
      const conf_senha = document.getElementById("csenha");

      formulario.addEventListener("submit", function(event) {
        if (senha.value !== conf_senha.value) {
          event.preventDefault();
          alert("As senhas não coincidem. Por favor, verifique.");
        }
      });
    });
  </script>
</body>

</html>