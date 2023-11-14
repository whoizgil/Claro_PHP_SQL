<?php
include('conexaosql.php');

function validarCPF($cpf)
{
    $cpf = preg_replace('/[^0-9]/', '', $cpf);


    if (strlen($cpf) != 11) {
        return false;
    }


    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }


    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += intval($cpf[$i]) * (10 - $i);
    }
    $resto = $soma % 11;
    $digito1 = ($resto < 2) ? 0 : 11 - $resto;


    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += intval($cpf[$i]) * (11 - $i);
    }
    $resto = $soma % 11;
    $digito2 = ($resto < 2) ? 0 : 11 - $resto;

    if ($cpf[9] != $digito1 || $cpf[10] != $digito2) {
        return false;
    }

    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $nome_materno = $_POST["nome_materno"];
    $cpf = preg_replace('/[^0-9]/', '', $_POST["cpf"]);
    $celular = preg_replace('/[^0-9]/', '', $_POST["celular"]);
    $tel_fixo = preg_replace('/[^0-9]/', '', $_POST["tel_fixo"]);
    $endereco = $_POST["endereco"];
    $login = $_POST["login"];
    $dat_nascimento = $_POST["dat_nascimento"];
    $sexo = $_POST["sexo"];
    $senha = $_POST["senha"];
    $cep = $_POST["cep"];


    $verificar_cpf_sql = "SELECT CPF FROM Usuario WHERE CPF = ?";
    $verificar_cpf_stmt = $mysqli->prepare($verificar_cpf_sql);
    $verificar_cpf_stmt->bind_param("s", $cpf);
    $verificar_cpf_stmt->execute();
    $verificar_cpf_stmt->store_result();

    if ($verificar_cpf_stmt->num_rows > 0) {
        echo "<script>
            alert('CPF já cadastrado. Por favor, verifique seus dados.');
            window.location.href = '../../public/cadastro.php';
        </script>";
        exit();
    }

    if (!validarCPF($cpf)) {
        echo "<script>
            alert('CPF inválido. Por favor, verifique seus dados.');
            window.location.href = '../../public/cadastro.php';
        </script>";
        exit();
    }


    $verificar_login_sql = "SELECT Login FROM Usuario WHERE Login = ?";
    $verificar_login_stmt = $mysqli->prepare($verificar_login_sql);
    $verificar_login_stmt->bind_param("s", $login);
    $verificar_login_stmt->execute();
    $verificar_login_stmt->store_result();

    if ($verificar_login_stmt->num_rows > 0) {
        echo "<script>
            alert('Login já está sendo utilizado. Por favor, escolha outro.');
            window.location.href = '../../public/cadastro.php';
        </script>";
        exit();
    }


    $sql = "INSERT INTO Usuario (CPF, Nome, Email, Nome_Materno, Celular, Tel_Fixo, Endereco, Login, Data_Nascimento, Sexo, Senha, Tipo, Statuses, CEP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'c', '1', ?)";

    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        header("Location: ../../error/erro_login.php?message=" . $mysqli->error);
        exit();
    }

    $parametro = "ssssssssssss";
    $stmt->bind_param($parametro, $cpf, $nome, $email, $nome_materno, $celular, $tel_fixo, $endereco, $login, $dat_nascimento, $sexo, $senha, $cep);

    if ($stmt->execute()) {

        echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href='../../index.php';</script>";
        exit();
    } else {
        header("Location: ../../error/erro_login.php?message=" . $stmt->error);
        exit();
    }

    $stmt->close();
    $verificar_cpf_stmt->close();
    $verificar_login_stmt->close();

    $mysqli->close();
}
