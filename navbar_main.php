<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <!--NavBar Início-->
  <nav>
    <div class="logo-menu">
      <a href="inicial.php"><img style="
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
      <li><a href="#">SERVIÇOS</a></li>

      <li>
        <a class="login-button-menu" href="Login.html">Login</a>
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