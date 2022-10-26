<?php
	session_start();

	if (isset($_SESSION["usuario"])){
		header("location: mostrar_agenda.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		body {
		    padding: 0;
		    margin: 0;
		    background-color: #454d6b;
		}
		#login {
		    display: flex;
		    align-items: center;
		    justify-content: center;
		    height: 100vh;
		    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
		}

		.card {
		    background-color: rgba(19, 19, 19, 0.3);
		    padding: 40px;
		    border-radius: 2px;
		    width:280px;
		}

		.card-header {
		    padding-bottom: 50px;
		    opacity: 0.8;
		    color: #fff;
		}

		.card-header::after {
		    content: "";
		    width: 70px;
		    height: 1px;
		    background-color: #fff;
		    display: block;
		    margin-top: -17px;
		    margin-left: -5px;
		}

		.card-content label {
		    color: #fff;
		    font-size: 12px;
		    opacity: 0.8;
		}

		.card-content-area {
		    display: flex;
		    flex-direction: column;
		    padding:10px 0;
		}

		.card-content-area input {
		    margin-top: 10px;
		    padding:0 5px;
		    background-color: transparent;
		    border:none;
		    border-bottom: 1px solid #e1e1e1;
		    outline: none;
		    color: #fff;
		}

		.card-footer {
		    display: flex;
		    flex-direction: column;
		}

		.card-footer .submit{
		    width: 100%;
		    height: 40px;
		    background-color: #5f9ea0;
		    border:none;
		    color:#e1e1e1;
		    margin: 10px 0;
		}

		.card-footer a {
		    text-align: center;
		    font-size: 12px;
		    opacity: 0.8;
		    color: #fff;
		    text-decoration: none;
		}
	</style>
</head>
<body>
	<div id="login">
		<form method="POST" class="card">
			<div class="card-header">
				<h2>Login</h2>
			</div>
			<div class="card-content">
				<div class="card-content-area">
					<label for="usuario">Usuário</label>
					<input type="text" id="usuario" name="usuario" autocomplete="off">
				</div>
				<div class="card-content-area">
					<label for="password">Senha</label>
					<input type="text" id="password" name="senha" autocomplete="off">
				</div>
				<div class="card-footer">
					<input type="submit" value="Login" class="submit" name="enviar">
					<a href="#" class="recuperar_senha">Esqueci minha senha</a>
				</div>
			</div>
		</form>
	</div>
	<?php
		if (isset($_POST["enviar"])) {
			
			require_once("conecta.php");
			
			// a função mysqli_real_escape_string acrescenta caracteres da escape na string, impedindo que ela seja executada como comandos SQL, ou seja, qualquer informação será tratada como texo ou número
			$usuario = mysqli_real_escape_string($conn, $_POST["usuario"]);
			$senha = mysqli_real_escape_string($conn, $_POST["senha"]);

			// utilizando criptografia no login
			$criptografia = md5($senha);

			// usuario preencheu os dois campos
			if (!empty($usuario) && !empty($senha)) {

				echo  $sql = "SELECT * FROM `usuarios` WHERE (login='$usuario' OR email='$usuario') AND senha='$criptografia' ";

				$resultado = mysqli_query($conn, $sql);

				if (mysqli_num_rows($resultado) > 0) {
					$_SESSION["usuario"] = $usuario;
					header("location: mostrar_agenda.php");

				} else {
					echo ("Usuário ou senha incorreto");
				}
			} else {
				echo ("Preencha todos os dados corretamente antes de continuar");
			}
		}
	?>
</body>
</html>