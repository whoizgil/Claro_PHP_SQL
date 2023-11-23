<?php

use Dompdf\Dompdf;
use Dompdf\Options;

require_once '../config/dompdf/vendor/autoload.php';
include('../config/database/conexaosql.php');
session_start();


if (!isset($_SESSION['login']) || !isset($_SESSION['2fa']) || $_SESSION['2fa'] !== true) {
    header("Location: ../assets/error/erro_login.php");
    exit();
}

if ($_SESSION['tipo'] == 'c') {
    header('location:../assets/error/erro_voltar.php');
    exit();
}

$query = 'SELECT u.login, u.nome, u.Data_Nascimento, u.CPF, u.tel_fixo, u.statuses, t.tipo_desc, s.statuses_desc FROM usuario u INNER JOIN tipo t ON u.tipo = t.tipo INNER JOIN statuses s ON u.statuses = s.statuses WHERE u.tipo = "c" ORDER BY u.nome';


$stmt = $mysqli->query($query);

if ($stmt) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tabela'])) {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        $html =
            '<h1>Lista de Usuários do Sistema</h1>' .
            '<table class="fl-table">' .
            '<thead>' .
            '<tr>' .
            '<th>Login</th>' .
            '<th>Nome</th>' .
            '<th>Idade</th>' .
            '<th>CPF</th>' .
            '<th>Telefone Fixo</th>' .
            '<th>Tipo</th>' .
            '<th>Status</th>' .
            '</tr>' .
            '</thead>' .
            '<tbody>';

        while ($row = $stmt->fetch_assoc()) {
            $html .= '<tr>' .
                '<td>' . htmlspecialchars($row['login']) . '</td>' .
                '<td>' . htmlspecialchars($row['nome']) . '</td>' .
                '<td>' . calcularIdade($row['Data_Nascimento']) . '</td>' .
                '<td>' . htmlspecialchars($row['CPF']) . '</td>' .
                '<td>' . htmlspecialchars($row['tel_fixo']) . '</td>' .
                '<td>' . htmlspecialchars($row['tipo_desc']) . '</td>' .
                '<td>' . htmlspecialchars($row['statuses_desc']) . '</td>' .
                '</tr>';
        }

        $html .= '</tbody></table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $output = $dompdf->output();

        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="lista_usuarios.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        echo $output;
        exit();
    }



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cpfUsuario = $_POST['CPF'];

        if (isset($_POST['deleteUser'])) {
            $stmt = $mysqli->prepare('DELETE FROM usuario WHERE CPF = ?');
            $stmt->bind_param('s', $cpfUsuario);
            $stmt->execute();

            header("Location: consulta.php");
            exit();
        } else {
            $stmt = $mysqli->prepare('SELECT statuses FROM usuario WHERE CPF = ?');
            $stmt->bind_param('s', $cpfUsuario);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $statusAtual = $row['statuses'];

            if ($statusAtual == 1) {
                $stmt = $mysqli->prepare('UPDATE usuario SET statuses = "2" WHERE CPF = ?');
            } else {
                $stmt = $mysqli->prepare('UPDATE usuario SET statuses = "1" WHERE CPF = ?');
            }
            $stmt->bind_param('s', $cpfUsuario);
            $stmt->execute();

            header("Location: consulta.php");
            exit();
        }
    }
}

function calcularIdade($dataNascimento)
{
    $dataNascimento = date_create($dataNascimento);
    $hoje = date_create(date('Y-m-d'));
    $idade = date_diff($dataNascimento, $hoje);
    return $idade->format('%y');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Usuários</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Onest">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background-color: #cccccc;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #CE2D2D;

    }

    * {
        font-family: 'Onest', sans-serif;
    }

    body {
        -webkit-font-smoothing: antialiased;
        margin: 0;

    }


    /* Table Styles */

    .table-wrapper {
        margin: 10px 70px 70px;
        box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
    }

    .fl-table {
        border-radius: 5px;
        font-size: 12px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        background-color: white;
    }

    .fl-table td,
    .fl-table th {
        text-align: center;
        padding: 8px;
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
        font-size: 12px;
    }

    .fl-table thead th {
        color: #ffffff;
        background: #9b1313;
    }


    .fl-table thead th:nth-child(odd) {
        color: #ffffff;
        background: #324960;
    }

    .fl-table tr:nth-child(even) {
        background: #F8F8F8;
    }

    .myButton {
        box-shadow: 0px 4px 14px -7px #276873;
        background: linear-gradient(to bottom, #9b1313 5%, #9b1313 100%);
        background-color: #9b1313;
        border-radius: 21px;
        display: inline-block;
        cursor: pointer;
        color: #ffffff;
        font-family: Arial;
        font-size: 12px;
        font-weight: bold;
        padding: 6px 8px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #3d768a;
        border: none;
    }

    .myButton:hover {
        background: linear-gradient(to bottom, #9b1313 5%, #9b1313 100%);
        background-color: #9b1313;
    }

    .myButton:active {
        position: relative;
        top: 1px;
    }

    .searchbar {
        margin-top: 75px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 50px;
    }

    .searchbar input {
        padding: 5px;
        font-size: 15px;
        border-width: 1px;
        border-color: #f19595;
        background-color: #FFFFFF;
        color: #000000;
        border-style: solid;
        border-radius: 10px;
        box-shadow: 0px 2px 9px rgba(66, 66, 66, .75);
        text-shadow: 0px 0px 5px rgba(66, 66, 66, .75);
        width: 50%;
    }

    .searchbar input:focus {
        outline: none;
    }

    .searchbar input::placeholder {
        text-align: center;
    }

    /* Responsive */

    @media (max-width: 767px) {
        .fl-table {
            display: block;
            width: 100%;
        }

        .table-wrapper:before {
            display: block;
            text-align: right;
            font-size: 11px;
            color: white;
            padding: 0 0 10px;
        }

        .fl-table thead,
        .fl-table tbody,
        .fl-table thead th {
            display: block;
        }

        .fl-table thead th:last-child {
            border-bottom: none;
        }

        .fl-table thead {
            float: left;
        }

        .fl-table tbody {
            width: auto;
            position: relative;
            overflow-x: auto;
        }

        .fl-table td,
        .fl-table th {
            padding: 20px 10.6em .625em .625em;
            height: 60px;
            vertical-align: middle;
            box-sizing: border-box;
            overflow-x: hidden;
            overflow-y: auto;
            width: 120px;
            font-size: 13px;
            text-overflow: ellipsis;
        }

        .fl-table thead th {
            text-align: left;
            border-bottom: 1px solid #f7f7f9;
        }

        .fl-table tbody tr {
            display: table-cell;
        }

        .fl-table tbody tr:nth-child(odd) {
            background: none;
        }

        .fl-table tr:nth-child(even) {
            background: transparent;
        }

        .fl-table tr td:nth-child(odd) {
            background: #F8F8F8;
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tr td:nth-child(even) {
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tbody td {
            display: block;
            text-align: center;
        }
    }

    .form_pdf_tabela {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    #gerarPdf {
        box-shadow: 0px 4px 14px -7px #276873;
        background: linear-gradient(to bottom, #9b1313 5%, #9b1313 100%);
        background-color: #9b1313;
        border-radius: 21px;
        display: inline-block;
        cursor: pointer;
        color: #ffffff;
        font-family: Arial;
        font-size: 12px;
        font-weight: bold;
        padding: 6px 8px;
        text-decoration: none;
        text-shadow: 0px 1px 0px #3d768a;
        border: none;
    }


    #gerarPdf:hover,
    .myButton:hover {
        background: linear-gradient(to bottom, #d94141 5%, #ed0909 100%);
        background-color: #d94141;
    }

    #gerarPdf:active {
        position: relative;
        top: 1px;
    }
</style>
</head>

<body>
    <div class="navbar">
        <?php include_once('../assets/elements/navbar.php'); ?>
    </div>
    <div class="searchbar">
        <input type="text" id="searchInput" onkeyup="searchUsers()" placeholder="Pesquisar usuários">
    </div>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>CPF</th>
                    <th>Telefone Fixo</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Opção</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['login']); ?></td>
                        <td><?php echo htmlspecialchars($row['nome']); ?></td>
                        <td><?php echo calcularIdade($row['Data_Nascimento']); ?></td>
                        <td><?php echo htmlspecialchars($row['CPF']); ?></td>
                        <td><?php echo htmlspecialchars($row['tel_fixo']); ?></td>
                        <td><?php echo htmlspecialchars($row['tipo_desc']); ?></td>
                        <td><?php echo htmlspecialchars($row['statuses_desc']); ?></td>
                        <td>
                            <form method="post" action="">
                                <?php if ($row['statuses'] == 1) : ?>

                                    <input type="hidden" name="CPF" value="<?php echo htmlspecialchars($row['CPF']); ?>">
                                    <input class="myButton" type="submit" value="Desativar">
                                <?php else : ?>
                                    <input type="hidden" name="CPF" value="<?php echo htmlspecialchars($row['CPF']); ?>">
                                    <input class="myButton" type="submit" value="Ativar">

                                <?php endif; ?>
                                <input type="hidden" name="CPF" value="<?php echo htmlspecialchars($row['CPF']); ?>">
                                <input class="myButton" type="submit" name="deleteUser" value="Deletar" onclick="return confirm('Você realmente deseja deletar o usuário ' + '<?php echo htmlspecialchars($row['nome']); ?>' + ' do banco de dados?');">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <tbody>
        </table>
    </div>

    <form class="form_pdf_tabela" method="POST" action="" target="_blank">
        <input type="hidden" name="tabela" id="tabela">
        <button type="submit" id="gerarPdf">Gerar PDF</button>
    </form>



    <div class="footer" style="margin-top: 265px;">
        <?php include_once('../assets/elements/footer.php'); ?>
    </div>

    <script>
        function searchUsers() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementsByClassName("fl-table")[0];
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                var matchFound = false;
                if (td) {
                    for (j = 0; j < td.length; j++) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            matchFound = true;
                            break;
                        }
                    }
                    if (matchFound) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        $(document).ready(function() {
            $('form').submit(function(e) {
                var tabelaClone = $('.fl-table').clone();
                tabelaClone.find('th:last, td:last').remove();

                var tabelaHtml = tabelaClone.html();
                $('#tabela').val(tabelaHtml);
            });
        });
    </script>

</body>

</html>