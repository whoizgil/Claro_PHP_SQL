<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="navbar.css">
</head>

<body>
  <!--NavBar Início-->
  <nav>
    <div class="logo-menu">
      <a href="index.php"><img style="
              display: block;
              margin: auto;
              transition: background-color 300ms;
            " src="https://www.claro.com.br/files/104379/x/4e0cdf35df/claro.svg/m/filters:quality(75)" /></a>
    </div>
    <div class="hamburger-menu">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
    <ul class="nav-links-menu">
      <li><a href="#">CONSULTA</a></li>
      <li><a href="#">MODELO</a></li>
      <li><a href="about.php">SOBRE NÓS</a></li>
      <li><a href="serviços.php">SERVIÇOS</a></li>

      <li>
        <?php
        echo 'Usuário:<a href="RecSenha.php" title="Clique aqui para alterar a senha" style= "color: inherit;
        text-decoration: none;">' . $_SESSION['nome'] . '</a> <a href="logout.php" title= "Clique aqui para sair da sua conta">Logout</a>';
        ?>
      </li>
    </ul>
  </nav>
  <!--NavBar Fim-->
  <script>
    // Hamburguer Menu Início
    const hamburger = document.querySelector(".hamburger-menu");
    const navLinks = document.querySelector(".nav-links-menu");
    const links = document.querySelectorAll(".nav-links-menu li");

    hamburger.addEventListener("click", () => {
      //Animate Links
      navLinks.classList.toggle("open");
      links.forEach((link) => {
        link.classList.toggle("fade");
      });

      //Hamburger Animation
      hamburger.classList.toggle("toggle");
    });
    // Hamburguer Menu Fim
  </script>
</body>

</html>