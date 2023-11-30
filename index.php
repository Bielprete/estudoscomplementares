<?php
session_start();
?>

<!DOCTYPE html>
	 <html>
	 
	  <head>
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Alterado o valor para 1 -->
    <link rel="stylesheet" href="css/bulma.min.css"/>
    <link rel="stylesheet" href="css/estilocadastro.css">
		</head> 
<body>
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-6">
                        <div class="box">
    <h1>Login</h1>
    <?php
    if (isset($_SESSION['nao_autenticado'])):
    ?>
       <div class="notification is-danger">
        <p>ERRO: Usuário ou senha inválidos.</p>
        </div>
        <?php
        endif;
        unset($_SESSION['nao_autenticado'])
    ?>
    <form action="conf.php" method="POST">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>

        <input type="submit" value="Entrar">
    </form>
    <div class="field">
	<a href="cadastro.php">cadastrar</a>
	</div>
</body>
</html>