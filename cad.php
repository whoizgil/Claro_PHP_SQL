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
        <form id="formulario" action="entrada_de_dados.php" method="post">
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
                <p>Já possui uma conta? <a href="login.php">Login</a></p>
            </div>

            <input class="botao-cadastro" type="submit" value="Cadastrar" />
            <input class="botao-limpar" type="button" value="Limpar Tela" onclick="limparCampos()" />
        </form>
    </section>

</body>

</html>