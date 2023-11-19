<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Footer</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap");

        .footer {
            position: relative;
            width: 100%;
            min-height: 100px;
            padding-top: 15px;
            margin-top: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .social-icon,
        .menu {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
            flex-wrap: wrap;
            color: rgb(227, 63, 44);

        }

        .social-icon__item,
        .menu__item {
            list-style: none;
        }

        .social-icon__link {
            font-size: 2rem;
            color: rgb(227, 63, 44);
            margin: 0 10px;
            display: inline-block;
            transition: 0.5s;
        }

        .social-icon__link:hover {
            transform: translateY(-10px);
        }

        .menu__link {
            font-size: 1.2rem;
            margin: 0 10px;
            display: inline-block;
            transition: 0.5s;
            text-decoration: none;
            opacity: 0.75;
            font-weight: 300;
            color: rgb(227, 63, 44);
        }

        .menu__link:hover {
            opacity: 1;
        }

        .footer p {
            color: rgb(227, 63, 44);
            margin: 15px 0 10px 0;
            font-size: 1rem;
            font-weight: 300;
        }

        .social-icon__item ion-icon {
            color: rgb(227, 63, 44);
        }

        .logout {
            color: rgb(255 110 94);
            text-decoration: none;

        }

        .logout:hover {
            color: rgb(249 70 51);

        }
    </style>
</head>

<body>
    <footer class="footer">
        <ul class="social-icon">
            <li class="social-icon__item"><a class="social-icon__link" href="https://www.facebook.com/clarobrasil/">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="https://twitter.com/ClaroBrasil">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="https://www.instagram.com/clarobrasil/">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a></li>
        </ul>
        <ul class="menu">
            <?php if ($_SESSION['tipo'] == 'm') {
                echo '<li class="menu__item"><a class="menu__link" href="consulta.php">Consulta</a></li>';
            } ?>
            <li class="menu__item"><a class="menu__link" href="modelo.php">Modelo</a></li>
            <li class="menu__item"><a class="menu__link" href="serviços.php">Serviços</a></li>
            <li class="menu__item"><a class="menu__link" href="sobre.php">Sobre nós</a></li>

        </ul>
        <?php if ($_SESSION['tipo'] == 'c') {
            echo '<a class="logout" href="../config/database/update_pass.php">Alterar sua senha</a>';
        } ?>
        <a class="logout" href="../config/database/logout.php">Sair da sua conta</a>
        <p>&copy;2023 Claro | Todos Os Direitos Reservados</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>