<?php
include('banco_de_dados/conexaosql.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $nome_materno = $_POST["nome_materno"];
    $cpf = $_POST["cpf"];
    $celular = $_POST["celular"];
    $tel_fixo = $_POST["tel_fixo"];
    $endereco = $_POST["endereco"];
    $login = $_POST["login"];
    $dat_nascimento = $_POST["dat_nascimento"];
    $sexo = $_POST["sexo"];
    $senha = $_POST["senha"];
    
    // Verifica se o CPF já está cadastrado
    $verificar_cpf_sql = "SELECT CPF FROM Usuario WHERE CPF = ?";
    $verificar_cpf_stmt = $mysqli->prepare($verificar_cpf_sql);
    $verificar_cpf_stmt->bind_param("s", $cpf);
    $verificar_cpf_stmt->execute();
    $verificar_cpf_stmt->store_result();
    
    if ($verificar_cpf_stmt->num_rows > 0) {
        echo "<script>
            alert('CPF já cadastrado. Por favor, verifique seus dados.');
            window.location.href = 'cad.php';
        </script>";
        exit();
    }
    
    // Verifica se o login já está sendo utilizado
    $verificar_login_sql = "SELECT Login FROM Usuario WHERE Login = ?";
    $verificar_login_stmt = $mysqli->prepare($verificar_login_sql);
    $verificar_login_stmt->bind_param("s", $login);
    $verificar_login_stmt->execute();
    $verificar_login_stmt->store_result();
    
    if ($verificar_login_stmt->num_rows > 0) {
        echo "<script>
            alert('Login já está sendo utilizado. Por favor, escolha outro.');
            window.location.href = 'cad.php';
        </script>";
        exit();
    }

    // Se o CPF e o login estiverem livres, insere o novo usuário no banco de dados
    $sql = "INSERT INTO Usuario (CPF, Nome, Email, Nome_Materno, Celular, Tel_Fixo, Endereco, Login, Data_Nascimento, Sexo, Senha, Tipo, Statuses) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'c', '1')";
            
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt === false) {
        header("Location: error.php?message=" . $mysqli->error);
        exit();
    }
    
    $parametro = "sssssssssss";
    $stmt->bind_param($parametro, $cpf, $nome, $email, $nome_materno, $celular, $tel_fixo, $endereco, $login, $dat_nascimento, $sexo, $senha);
    
    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        header("Location: erro_login.php?message=" . $stmt->error);
        exit();
    }
    
    $stmt->close();
    
    $verificar_cpf_stmt->close();
    $verificar_login_stmt->close();
}

$mysqli->close();
?>
