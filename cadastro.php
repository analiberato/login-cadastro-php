<?php session_start(); ?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Cadastro</h3> <!-- titulos -->
                    
                    <?php if($_SESSION['status_cadastro']): ?>
                    <div class="notification is-success">
                      <p>Cadastro efetuado!</p>
                      <p>Faça login informando o seu usuário e senha <a href="login.php">aqui</a></p>
                    </div>
                    <?php endif;
                    unset($_SESSION['status_cadastro']);
                    ?>
                    
                    <?php if($_SESSION['cpf_invalido']): ?>
                    <div class="notification is-success">
                      <p>CPF inválido!</p>
                      <p>Verifique o número informado no campo CPF. E tente realizar o cadastro novamente.</p>
                    </div>
                    <?php endif; 
                    unset($_SESSION['cpf_invalido']);
                    ?>
                    
                    <?php if($_SESSION['email_invalido']): ?>
                    <div class="notification is-success">
                      <p>Email inválido!</p>
                      <p>Verifique o email informado. E tente realizar o cadastro novamente.</p>
                    </div>
                    <?php endif; 
                    unset($_SESSION['email_invalido']);
                    ?>
                    
                    <?php if($_SESSION['usuario_existe']): ?>
                    <div class="notification is-info">
                        <p>O cpf escolhido já está cadastrado. Entre em contato com nosso time para solucionar o problema.</p>
                    </div>
                    <?php endif;
                    unset($_SESSION['usuario_existe']);
                    ?>
                    
                    <div class="box">
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="nome" type="text" class="input is-large" placeholder="Nome" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="cpf" type="text" class="input is-large" placeholder="CPF">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="email" type="text" class="input is-large" placeholder="Email">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="input is-large" type="password" placeholder="Senha">
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>