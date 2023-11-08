<?php
include('banco_de_dados/conexaosql.php');
session_start();

if (!isset($_SESSION['login']) || !isset($_SESSION['2fa']) || $_SESSION['2fa'] !== true) {
    header("Location: erro_login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $mysqli->prepare('UPDATE usuario SET statuses = "2" WHERE nome = ?');
    $stmt->execute([$_POST['nome']]);
}

$stmt = $mysqli->query('SELECT u.nome, u.celular, u.tel_fixo, t.tipo_desc, s.statuses_desc FROM usuario u INNER JOIN tipo t ON u.tipo = t.tipo INNER JOIN statuses s ON u.statuses = s.statuses');

?>

<!DOCTYPE html>
<html>

<head>
    <title>Usuários</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>Celular</th>
            <th>Telefone Fixo</th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Excluir</th>
        </tr>
        <?php while ($row = $stmt->fetch_assoc()) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nome']); ?></td>
                <td><?php echo htmlspecialchars($row['celular']); ?></td>
                <td><?php echo htmlspecialchars($row['tel_fixo']); ?></td>
                <td><?php echo htmlspecialchars($row['tipo_desc']); ?></td>
                <td><?php echo htmlspecialchars($row['statuses_desc']); ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>">
                        <input type="submit" value="Excluir">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>