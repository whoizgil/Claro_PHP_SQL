<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style-login-cad.css" />
    <script src="script.js" defer></script>
    <title>Cadastro</title>
</head>

<body>
    <section class="container">
        <div class="div-logo">
            <a class="ancora-logo" href="index.php"><img class="logo" src="https://es.logodownload.org/wp-content/uploads/2018/12/claro-logo-1-11-768x288.png" alt="logo claro" /></a>
        </div>
        <form id="formulario" action="Login.html" method="post">
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
                    <input type="text" id="cpf" name="cpf" autocomplete="off" required="required" />
                    <span>CPF:</span>
                    <i></i>
                </div>
            </fieldset>

            <fieldset>
                <div class="campo-cadastro">
                    <input type="tel" id="celular" name="celular" autocomplete="off" required="required" />
                    <span>Celular:</span>
                    <i></i>
                </div>

                <div class="campo-cadastro">
                    <input type="tel" id="tel_fixo" name="tel_fixo" autocomplete="off" required="required" />
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
                    <input type="text" id="login" name="login" autocomplete="off" required="required" />
                    <span>Login:</span>
                    <i></i>
                </div>
            </fieldset>

            <fieldset>
                <div class="campo-cadastro">
                    <input type="password" id="senha" name="senha" required="required" />
                    <span>Senha:</span>
                    <i></i>
                </div>

                <div class="campo-cadastro">
                    <input type="password" id="conf_senha" name="conf_senha" required="required" />
                    <span>Confirmar senha:</span>
                    <i></i>
                </div>
            </fieldset>

            <fieldset>
                <div class="campo-cadastro-select">
                    <span>Sexo:</span>
                    <br />
                    <input name="sexo" type="radio" value="masculino" required="required" />
                    <label>Masculino</label>
                    <input name="sexo" type="radio" value="feminino" required="required" />
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
                <p>Já possui uma conta? <a href="login.php">Login</a></p>
            </div>

            <input class="botao-cadastro" type="submit" value="Cadastrar" />
            <input class="botao-limpar" type="button" value="Limpar Tela" onclick="limparCampos()" />
        </form>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.getElementById("formulario");

            form.addEventListener("submit", (event) => {
                event.preventDefault();
                if (validateForm()) {
                    // Simular envio dos dados para o banco de dados
                    alert(
                        "Informações do usuário salvas no banco de dados. Redirecionando para a tela de login..."
                    );
                    redirectToLogin();
                } else {
                    alert("Por favor, preencha todos os campos corretamente.");
                }
            });

            function validateForm() {
                const nome = document.getElementById("nome").value;
                const datNascimento = document.getElementById("dat_nascimento").value;
                const sexo = document.querySelector('input[name="sexo"]:checked');
                const nomeMaterno = document.getElementById("nome_materno").value;
                const cpf = document.getElementById("cpf").value;
                const celular = document.getElementById("celular").value;
                const telFixo = document.getElementById("tel_fixo").value;
                const endereco = document.getElementById("endereco").value;
                const login = document.getElementById("login").value;
                const senha = document.getElementById("senha").value;
                const confSenha = document.getElementById("conf_senha").value;

                // Requisito 1
                if (
                    nome === "" ||
                    datNascimento === "" ||
                    !sexo ||
                    nomeMaterno === "" ||
                    cpf === "" ||
                    celular === "" ||
                    telFixo === "" ||
                    endereco === "" ||
                    login === "" ||
                    senha === "" ||
                    confSenha === ""
                ) {
                    return false;
                }

                // Requisito 2
                const nomeRegex = /^[a-zA-Z\s]{15,80}$/;
                if (!nomeRegex.test(nome)) {
                    return false;
                }

                // Requisito 3
                const telefoneRegex = /^\(\+\d{2}\) \d{2}-\d{4,5}$/;
                if (!telefoneRegex.test(celular) || !telefoneRegex.test(telFixo)) {
                    return false;
                }

                // Requisito 4
                const loginRegex = /^[a-zA-Z]{6}$/;
                if (!loginRegex.test(login)) {
                    return false;
                }

                // Requisito 5
                const senhaRegex = /^[a-zA-Z]{8}$/;
                if (!senhaRegex.test(senha)) {
                    return false;
                }

                // Requisito 6
                if (senha !== confSenha) {
                    return false;
                }

                // Requisito 7
                if (!validateCPF(cpf)) {
                    return false;
                }

                return true;
            }

            function redirectToLogin() {
                // Simula o redirecionamento para a tela de login
                console.log("Redirecionando para a tela de login.");
                window.location.href = "Login.html";
            }

            // Pré-formatação para Telefone Celular, Telefone Fixo, Nome e Login
            const celularInput = document.getElementById("celular");
            celularInput.addEventListener("input", () => {
                const formattedCelular = formatCelular(celularInput.value);
                celularInput.value = formattedCelular;
            });

            const telFixoInput = document.getElementById("tel_fixo");
            telFixoInput.addEventListener("input", () => {
                const formattedTelFixo = formatTelFixo(telFixoInput.value);
                telFixoInput.value = formattedTelFixo;
            });

            const nomeInput = document.getElementById("nome");
            nomeInput.addEventListener("input", () => {
                const formattedNome = formatNome(nomeInput.value);
                nomeInput.value = formattedNome;
            });

            const loginInput = document.getElementById("login");
            loginInput.addEventListener("input", () => {
                const formattedLogin = formatLogin(loginInput.value);
                loginInput.value = formattedLogin;
            });

            const cpfInput = document.getElementById("cpf");
            cpfInput.addEventListener("keydown", (event) => {
                // Permite apenas números (0-9)
                if (event.key.length === 1 && !/\d/.test(event.key)) {
                    event.preventDefault();
                }
            });

            const senhaInput = document.getElementById("senha");
            senhaInput.addEventListener("input", () => {
                const formattedSenha = formatSenha(senhaInput.value);
                senhaInput.value = formattedSenha;
            });

            cpfInput.addEventListener("input", () => {
                const formattedCPF = formatCPF(cpfInput.value);
                cpfInput.value = formattedCPF;
            });

            function formatTelFixo(phone) {
                const cleanedPhone = phone.replace(/\D/g, "");
                const match = cleanedPhone.match(/^(\d{2})(\d{4})(\d{4})$/);
                if (match) {
                    return `(+55) ${match[1]} ${match[2]}-${match[3]}`;
                } else {
                    return phone;
                }
            }

            function formatCelular(phone) {
                const cleanedPhone = phone.replace(/\D/g, "");
                const match = cleanedPhone.match(/^(\d{2})(\d{5})(\d{4})$/);
                if (match) {
                    return `(+55) ${match[1]} ${match[2]}-${match[3]}`;
                } else {
                    return phone;
                }
            }

            function formatNome(nome) {
                // Apenas permite caracteres alfabéticos e limita entre 15 e 80 caracteres
                return nome.replace(/[^a-zA-Z\s]/g, "").slice(0, 80);
            }

            function formatLogin(login) {
                // Apenas permite caracteres alfabéticos e limita a 6 caracteres
                return login.replace(/[^a-zA-Z]/g, "").slice(0, 6);
            }

            function formatCPF(cpf) {
                const cleanedCPF = cpf.replace(/[^\d]/g, "").slice(0, 11);
                const match = cleanedCPF.match(/^(\d{3})(\d{3})(\d{3})(\d{2})$/);
                if (match) {
                    return `${match[1]}.${match[2]}.${match[3]}-${match[4]}`;
                } else {
                    return cpf;
                }
            }

            function validateCPF(cpf) {
                const cleanedCPF = cpf.replace(/\D/g, "");

                if (cleanedCPF.length !== 11) {
                    return false;
                }

                // Checksum algorithm for CPF validation
                let sum = 0;
                let remainder;

                for (let i = 1; i <= 9; i++) {
                    sum += parseInt(cleanedCPF.substring(i - 1, i)) * (11 - i);
                }

                remainder = (sum * 10) % 11;

                if (remainder === 10 || remainder === 11) {
                    remainder = 0;
                }

                if (remainder !== parseInt(cleanedCPF.substring(9, 10))) {
                    return false;
                }

                sum = 0;
                for (let i = 1; i <= 10; i++) {
                    sum += parseInt(cleanedCPF.substring(i - 1, i)) * (12 - i);
                }

                remainder = (sum * 10) % 11;

                if (remainder === 10 || remainder === 11) {
                    remainder = 0;
                }

                if (remainder !== parseInt(cleanedCPF.substring(10, 11))) {
                    return false;
                }

                return true;
            }
        });

        function limparCampos() {
            const inputs = document.querySelectorAll("input, textarea, select");
            inputs.forEach((input) => {
                // Verifica se o campo não é o botão de cadastro
                if (input.type !== "submit" && input.type !== "button") {
                    // Limpa o valor do campo
                    input.value = "";

                    // Para campos de seleção de rádio e checkbox, desmarcamos
                    if (input.type === "radio" || input.type === "checkbox") {
                        input.checked = false;
                    }
                }
            });
        }

        function formatInput(id) {
            const input = document.getElementById(id);
            if (input) {
                input.addEventListener("input", () => {
                    const formattedValue = formatValue(input.value);
                    input.value = formattedValue;
                });
            }
        }

        function formatValue(value) {
            return value.replace(/[^a-zA-Z0-9]/g, "").slice(0, 8);
        }

        formatInput("senha");
        formatInput("conf_senha");
    </script>
</body>

</html>