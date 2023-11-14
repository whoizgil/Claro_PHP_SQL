<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Onest">
  <style>
    .navbar {
      display: flex;
    }


    nav {
      height: 4.5rem;
      width: 100vw;
      background: linear-gradient(to right, #9b1313, #ed1818);
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.2);
      display: flex;
      position: fixed;
      z-index: 10;
    }

    /*Styling logo*/
    .logo-menu {
      padding: 1vh 1vw;
      text-align: center;
      display: flex;
      align-items: center;
      padding-top: 16px;
    }

    /*Styling Links*/
    .nav-links-menu {
      display: flex;
      list-style: none;
      width: 88vw;
      padding: 0 0.7vw;
      justify-content: space-evenly;
      align-items: center;
      text-transform: uppercase;
    }

    .nav-links-menu li a {
      text-decoration: none;
      margin: 0 0.7vw;
      color: #f2f5f7;
    }

    .nav-links-menu li a:hover {
      color: rgb(165, 141, 141);
    }

    .nav-links-menu li {
      position: relative;
    }

    .nav-links-menu li a:hover::before {
      width: 80%;
    }

    /*Styling Buttons*/
    .login-button-menu {
      background-color: transparent;
      border: 1.5px solid #f2f5f7;
      border-radius: 2em;
      padding: 0.6rem 0.8rem;
      margin-left: 2vw;
      font-size: 1rem;
      cursor: pointer;
    }

    .login-button-menu:hover {
      color: #131418;
      background-color: #f2f5f7;
      border: 1.5px solid #f2f5f7;
      transition: all ease-in-out 350ms;
    }

    /*Styling Hamburger Icon*/
    .hamburger-menu div {
      width: 30px;
      height: 3px;
      background: #f2f5f7;
      margin: 5px;
      transition: all 0.3s ease;
    }

    .hamburger-menu {
      display: none;
    }

    /*Stying for small screens*/
    @media screen and (max-width: 800px) {
      nav-menu {
        position: fixed;
        z-index: 3;
      }

      .hamburger-menu {
        display: block;
        position: absolute;
        cursor: pointer;
        right: 5%;
        top: 50%;
        transform: translate(-5%, -50%);
        z-index: 2;
        transition: all 0.7s ease;
      }

      .nav-links-menu {
        position: fixed;
        background: linear-gradient(to bottom, #9b1313, #e21f1f);
        height: 100vh;
        width: 100%;
        flex-direction: column;
        clip-path: circle(50px at 90% -20%);
        -webkit-clip-path: circle(50px at 90% -10%);
        transition: all 1s ease-out;
        pointer-events: none;
      }

      .nav-links-menu.open {
        clip-path: circle(1000px at 90% -10%);
        -webkit-clip-path: circle(1000px at 90% -10%);
        pointer-events: all;
      }

      .nav-links-menu li {
        opacity: 0;
      }

      .nav-links-menu li:nth-child(1) {
        transition: all 0.5s ease 0.2s;
      }

      .nav-links-menu li:nth-child(2) {
        transition: all 0.5s ease 0.4s;
      }

      .nav-links-menu li:nth-child(3) {
        transition: all 0.5s ease 0.6s;
      }

      .nav-links-menu li:nth-child(4) {
        transition: all 0.5s ease 0.7s;
      }

      .nav-links-menu li:nth-child(5) {
        transition: all 0.5s ease 0.8s;
      }

      .nav-links-menu li:nth-child(6) {
        transition: all 0.5s ease 0.9s;
        margin: 0;
      }

      .nav-links-menu li:nth-child(7) {
        transition: all 0.5s ease 1s;
        margin: 0;
      }

      li.fade {
        opacity: 1;
      }

      .inner-header img {
        height: 75%;
        width: 75%;
      }
    }

    /*Animating Hamburger Icon on Click*/
    .toggle .line1 {
      transform: rotate(-45deg) translate(-5px, 6px);
    }

    .toggle .line2 {
      transition: all 0.7s ease;
      width: 0;
    }

    .toggle .line3 {
      transform: rotate(45deg) translate(-5px, -6px);
    }

    h1 {
      font-family: "Lato", sans-serif;
      font-weight: 300;
      letter-spacing: 2px;
      font-size: 48px;
    }

    p {
      font-family: "Lato", sans-serif;
      letter-spacing: 1px;
      font-size: 14px;
      color: #333333;
    }

    .header {
      position: relative;
      text-align: center;
      background: -webkit-linear-gradient(to right, #414345, #232526);
      background: linear-gradient(to right, #414345, #232526);
      color: white;
    }

    .logo-menu {
      width: 50px;
      fill: white;
      padding-right: 15px;
      display: inline-block;
      vertical-align: middle;
    }

    .inner-header {
      height: 65vh;
      width: 100%;
      margin: 0;
      padding: 0;
      background-color: #931f1f;
    }
  </style>
</head>

<body>
  <!--NavBar Início-->
  <nav>
    <div class="logo-menu">
      <a href="main.php"><img style="
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
      <?php if ($_SESSION['tipo'] == 'm') {
        echo '<li><a href="../public/consulta.php">CONSULTA</a></li>';
      } ?>
      <li><a href="#">MODELO</a></li>
      <li><a href="../public/sobre.php">SOBRE NÓS</a></li>
      <li><a href="../public/serviços.php">SERVIÇOS</a></li>

      <li>
        <?php
        echo '<a style= "color: rgb(242, 245, 247);">Usuário:</a><a href="../config/database/update_pass.php" title="Clique aqui para alterar a senha" style= "color: rgb(242, 245, 247);
        text-decoration: none; margin-left: -5px;
        padding-right: 40px;">' . $_SESSION['nome'] . '</a> <a href="../config/database/logout.php" title= "Clique aqui para sair da sua conta">Logout</a>';
        ?>
      </li>
    </ul>
  </nav>
  <!--NavBar Fim-->
  <script>
    const hamburger = document.querySelector(".hamburger-menu");
    const navLinks = document.querySelector(".nav-links-menu");
    const links = document.querySelectorAll(".nav-links-menu li");

    hamburger.addEventListener("click", () => {

      navLinks.classList.toggle("open");
      links.forEach((link) => {
        link.classList.toggle("fade");
      });


      hamburger.classList.toggle("toggle");
    });
  </script>
</body>

</html>