<?php
include('banco_de_dados/conexaosql.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="style-login-cad.css" />
  <script src="" defer></script>
  <title>Login</title>
</head>

<body>
  <section class="container-login">
    <div class="div-logo">
      <a class="ancora-logo" href="index.php"><img src="https://es.logodownload.org/wp-content/uploads/2018/12/claro-logo-1-11-768x288.png" alt="logo claro" /></a>
    </div>
    <form id="formulario" autocomplete="off" action="validacaosql.php" method="POST" onsubmit="return validarFormulario()">
      <h1>Login</h1>

      <div class="campo-cadastro">
        <input type="text" name="login" id="login" required="required" minlength="6" maxlength="6" />
        <span>Login (6 caracteres):</span>
        <i></i>
      </div>

      <div class="campo-cadastro">
        <input type="password" name="senha" id="senha" required="required" minlength="8" maxlength="8" />
        <span>Senha (8 caracteres):</span>
        <i></i>
      </div>

      <div id="esqsenha">
        <label for="tipoUsuario">Tipo de Usuário:</label>
        <select name="tipousuario" id="tipoUsuario" name="tipoUsuario" style="border-radius: 10px; background-color: #cecece;" required>
          <option value="m">Master</option>
          <option value="c">Comum</option>
        </select>
      </div>

      <input class="botao-login" type="submit" value="Login" />
      <input class="botao-limpar" type="button" value="Limpar Tela" onclick="limparCampos()" />

      <div class="links-login" id="cadastro">
        <p>Não tem uma conta? <a href="cad.php">Cadastre-se</a></p>
      </div>
    </form>
  </section>

  <script>
    function validarFormulario() {
      const login = document.getElementById("login").value;
      const senha = document.getElementById("senha").value;

      // Requisito 1
      if (login.length !== 6 || senha.length !== 8) {
        alert(
          "O login deve ter exatamente 6 caracteres e a senha deve ter exatamente 8 caracteres."
        );
        return false;
      }

      return true;
    }

    // Pré-formatação para Login
    const loginInput = document.getElementById("login");
    loginInput.addEventListener("input", () => {
      const formattedLogin = formatLogin(loginInput.value);
      loginInput.value = formattedLogin;
    });

    function formatLogin(login) {
      // Apenas permite caracteres alfabéticos e limita a 6 caracteres
      return login.replace(/[^a-zA-Z]/g, "").slice(0, 6);
    }

    function limparCampos() {
      const inputs = document.querySelectorAll("input, textarea, select");
      inputs.forEach((input) => {
        if (input.type !== "submit" && input.type !== "button") {
          input.value = "";

          if (input.type === "radio" || input.type === "checkbox") {
            input.checked = false;
          }
        }
      });
    }

    function formatInput(id) {
      const input = document.getElementById(id);
      if (input) {
        input.addEventListener("input", () => {
          const formattedValue = formatValue(input.value);
          input.value = formattedValue;
        });
      }
    }

    function formatValue(value) {
      return value.replace(/[^a-zA-Z0-9]/g, "").slice(0, 8);
    }

    formatInput("senha");
  </script>
</body>

</html>