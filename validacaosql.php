<?php
include('banco_de_dados/conexaosql.php');

if (isset($_POST['login']) && isset($_POST['senha'])) {
    if (empty($_POST['login'])) {
        echo "Preencha seu login";
    } else if (empty($_POST['senha'])) {
        echo "Preencha sua senha";
    } else {
        $login = $mysqli->real_escape_string($_POST['login']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        if (isset($_POST['tipousuario'])) {
            $tipousuario = $mysqli->real_escape_string($_POST['tipousuario']);
        } else {
            echo "Selecione o tipo de usuário (Master ou Comum)";
            exit();
        }

        $sql_code = "SELECT CPF, Nome, Email, Nome_Materno, Celular, Tel_Fixo, Endereco, Login, Data_Nascimento, Sexo, Senha, Tipo, Statuses, CEP FROM usuario WHERE login = '$login' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL:" . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        $sql_nome = "SELECT nome FROM usuario WHERE login = '$login'";
        $result_nome = $mysqli->query($sql_nome);
        $nome = $result_nome->fetch_assoc()['nome'];

        $sql_tipo = "SELECT Tipo FROM usuario WHERE login = '$login'";
        $result_tipo = $mysqli->query($sql_tipo);
        $tipo = $result_tipo->fetch_assoc()['tipo'];


        if ($quantidade == 1) {
            $cadastro = $sql_query->fetch_assoc();

            if ($cadastro['Statuses'] == 2) {
                header("Location: erro_status_off.php");
            } else {
                $sql_tipo = "SELECT tipo FROM usuario WHERE login = '$login'";
                $result_tipo = $mysqli->query($sql_tipo);
                $tipo = $result_tipo->fetch_assoc()['tipo'];


                if ($tipousuario == $tipo) {
                    session_start();
                    $_SESSION['nome'] = $nome;
                    $_SESSION['senha'] = $senha;
                    $_SESSION['login'] = $login;
                    $_SESSION['tipo'] = $tipo;
                    header("Location: 2fa.php");
                } else {
                    header("Location: erro_login.php");
                }
            }
            exit();
        } else {
            header("Location: erro_login.php");
        }
    }
}
