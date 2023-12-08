<?php
session_start();
if (isset($_SESSION['2fa']) && $_SESSION['2fa'] == true) {
    header("Location: public/main.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style-login-cad.css" />
    <script src="script.js" defer></script>
    <title>Cadastro</title>
</head>

<body>
    <section class="container">
        <div class="div-logo">
            <a class="ancora-logo" href="main.php"><img class="logo" src="https://es.logodownload.org/wp-content/uploads/2018/12/claro-logo-1-11-768x288.png" alt="logo claro" /></a>
        </div>
        <form id="formulario" action="../config/database/entrada_de_dados.php" method="post">
            <h1>Cadastro</h1>
            <fieldset>
                <div class="campo-cadastro">
                    <input type="text" id="nome" name="nome" autocomplete="off" required="required" />
                    <span>Nome:</span>
                    <i></i>
                </div>

                <div class="campo-cadastro">
                    <input type="text" id="email" name="email" autocomplete="off" required="required" />
                    <span>Email:</span>
                    <i></i>
                </div>
            </fieldset>

            <fieldset>
                <div class="campo-cadastro">
                    <input type="text" id="nome_materno" name="nome_materno" autocomplete="off" required="required" />
                    <span>Nome materno:</span>
                    <i></i>
                </div>

                <div class="campo-cadastro">
                    <input type="text" id="cpf" name="cpf" autocomplete="off" required="required" oninput="formatarCPF(this)" maxlength="14" />
                    <span>CPF:</span>
                    <i></i>
                </div>
            </fieldset>

            <fieldset>
                <div class="campo-cadastro">
                    <input type="tel" id="celular" name="celular" autocomplete="off" required="required" oninput="formatarCelular(this)" maxlength="14" />
                    <span>Celular:</span>
                    <i></i>
                </div>

                <div class="campo-cadastro">
                    <input type="tel" id="tel_fixo" name="tel_fixo" autocomplete="off" required="required" oninput="formatarTelefoneFixo(this)" maxlength="13" />
                    <span>Telefone fixo:</span>
                    <i></i>
                </div>
            </fieldset>

            <fieldset>
                <div class="campo-cadastro">
                    <input type="text" id="endereco" name="endereco" autocomplete="off" required="required" />
                    <span>Endereço completo:</span>
                    <i></i>
                </div>

                <div class="campo-cadastro">
                    <input type="text" id="login" name="login" autocomplete="off" required="required" maxlength="6" />
                    <span>Login:</span>
                    <i></i>
                </div>
            </fieldset>

            <fieldset>
                <div class="campo-cadastro">
                    <input type="password" id="senha" name="senha" required="required" maxlength="8" />
                    <span>Senha:</span>
                    <i></i>
                </div>

                <div class="campo-cadastro">
                    <input type="password" id="conf_senha" name="conf_senha" required="required" maxlength="8" />
                    <span>Confirmar senha:</span>
                    <i></i>
                </div>
            </fieldset>

            <fieldset style="display: flex;
    justify-content: space-evenly;">
                <div class="campo-cadastro">
                    <input type="text" id="cep" name="cep" autocomplete="off" required="required" />
                    <span>CEP:</span>
                    <i></i>
                </div>

            </fieldset>

            <fieldset style="display: flex;
                 flex-direction: row;
                 flex-wrap: nowrap;
                 justify-content: space-evenly;">
                <div class="campo-cadastro-select">
                    <span>Sexo:</span>
                    <br />
                    <input name="sexo" type="radio" value="m" required="required" />
                    <label>Masculino</label>
                    <input name="sexo" type="radio" value="f" required="required" />
                    <label>Feminino</label>
                </div>

                <div>
                    <label class="label-campo-cadastro">Data de nascimento:</label>
                    <div class="campo-cadastro-select">
                        <input type="date" id="dat_nascimento" name="dat_nascimento" required="required" />
                        <br />
                    </div>
                </div>
            </fieldset>

            <div class="links">
                <p>Já possui uma conta? <a href="../index.php">Login</a></p>
            </div>

            <input class="botao-cadastro" type="submit" value="Cadastrar" />
            <input class="botao-limpar" type="button" value="Limpar Tela" onclick="limparCampos()" />
        </form>
    </section>

    <script>
        function formatarCPF(cpfCampo) {
            let cpf = cpfCampo.value.replace(/\D/g, '');
            cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            cpfCampo.value = cpf;
        }

        function formatarTelefoneFixo(telefoneFixoCampo) {
            let telefoneFixo = telefoneFixoCampo.value.replace(/\D/g, '');
            telefoneFixo = telefoneFixo.replace(/(\d{2})(\d{4})(\d{4})/, '($1)$2-$3');
            telefoneFixoCampo.value = telefoneFixo;
        }

        function formatarCelular(celularCampo) {
            let celular = celularCampo.value.replace(/\D/g, '');
            celular = celular.replace(/(\d{2})(\d{5})(\d{4})/, '($1)$2-$3');
            celularCampo.value = celular;
        }
        document.addEventListener("DOMContentLoaded", function() {
            const formulario = document.getElementById("formulario");
            const senha = document.getElementById("senha");
            const conf_senha = document.getElementById("conf_senha");

            formulario.addEventListener("submit", function(event) {
                if (senha.value !== conf_senha.value) {
                    event.preventDefault();
                    alert("As senhas não coincidem. Por favor, verifique.");
                }

                const hoje = new Date();
                const dataNascimento = new Date(datNascimento.value);

                if (dataNascimento >= hoje) {
                    event.preventDefault();
                    alert("A data de nascimento não pode ser igual ou posterior à data de hoje. Por favor, verifique.");
                }
            });
        });


        function showH1() {
            var campos = ['nome', 'email', 'nome_materno', 'cpf', 'celular', 'tel_fixo', 'endereco', 'login', 'senha', 'conf_senha', 'cep'];

            campos.forEach(function(campoId) {
                var campoInput = document.getElementById(campoId);

                if (campoInput.value !== '') {
                    campoInput.classList.add('has-content');
                }
            });

            var inputsSemConteudo = campos.every(function(campoId) {
                return document.getElementById(campoId).value === '';
            });
        }

        var campos = ['nome', 'email', 'nome_materno', 'cpf', 'celular', 'tel_fixo', 'endereco', 'login', 'senha', 'conf_senha', 'cep'];
        campos.forEach(function(campoId) {
            document.getElementById(campoId).addEventListener('blur', showH1);
        });
    </script>
</body>

</html>