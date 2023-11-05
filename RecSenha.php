<?php
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)) {
  header('location:erro_login.php');
}

if ($_SESSION['tipo'] == 'm') {
  header('location:erro_voltar.php');
}

$logado = $_SESSION['login'];

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="style-login-cad.css" />
  <title>Telecall - Projeto</title>
</head>

<body class="recsenha-html">
  <section class="container-login">
    <div class="div-logo">
      <a class="ancora-logo" href="index.php"><img src="https://es.logodownload.org/wp-content/uploads/2018/12/claro-logo-1-11-768x288.png" alt="logo telecall" /></a>
    </div>
    <form id="formulario" action="">
      <h1>Alterar Senha</h1>

      <div class="campo-cadastro">
        <input type="text" id="nsenha" required="required" maxlength="8" minlength="8" />
        <span>Digite sua nova senha:</span>
        <i></i>
      </div>
      <div class="campo-cadastro">
        <input type="text" id="csenha" required="required" maxlength="8" minlength="8" />
        <span>Confirme sua nova senha:</span>
        <i></i>
      </div>

      <input class="botao-recsenha" type="submit" value="Enviar" />
      <input class="botao-limpar" type="button" value="Limpar Tela" onclick="limparCampos()" />

      <div class="links-login" id="cadastro">
        <p>Não tem uma conta? <a href="cad.php">Cadastre-se</a></p>
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