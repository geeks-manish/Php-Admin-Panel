<?php
// Conexão
require_once 'DB.php';

// Sessão
session_start();

// Botão enviar
if(isset($_POST['btn-entrar'])):
	$erros = array();
	$login = mysqli_escape_string($conn, $_POST['login']);
	$senha = mysqli_escape_string($conn, $_POST['senha']);

	if(isset($_POST['lembrar-senha'])):

		setcookie('login', $login, time()+3600);
		setcookie('senha', md5($senha), time()+3600);
	endif;

	if(empty($login) or empty($senha)):
		$erros[] = "<li>You Forgot to enter the username or password</li>";
	else:
		// 105 OR 1=1 
	    // 1; DROP TABLE teste

		$sql = "SELECT login FROM usuarios WHERE login = '$login'";
		$resultado = mysqli_query($conn, $sql);		

		if(mysqli_num_rows($resultado) > 0):
		$senha = md5($senha);       
		$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";



		$resultado = mysqli_query($conn, $sql);

			if(mysqli_num_rows($resultado) == 1):
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($conn);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('Location: painel2.php');
			else:
				$erros[] = "<li> Username and password do not match  </li>";
			endif;

		else:
			$erros[] = "<li> User doesn't exist </li>";
		endif;

	endif;

endif;
?>

<html lang="pt-br">
<head>
	<title>Verification</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor2/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor2/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor2/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor2/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css2/util.css">
	<link rel="stylesheet" type="text/css" href="css2/main.css">
<!--===============================================================================================-->
<style>
    .wrap-login100 p-t-190 p-b-30 {
        
        background-color: white;
    }
    
</style>
</head>
<body>
    
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('1054068.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="login100-form validate-form" >
					

					<span class="login100-form-title p-t-20 p-b-45">
						LOGIN
					</span>
					
					<?php 
if(!empty($erros)):
	foreach($erros as $erro):
		echo $erro;
	endforeach;
endif;
?>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Campo vazio!">
						<input class="input100" type="text" name="login" placeholder="Username" value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : '' ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Campo Vazio!">
						<input class="input100" type="password" name="senha" placeholder="Password" value="<?php echo isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '' ?>" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit" name="btn-entrar">
							Log in
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a  class="txt1">
						</a>
					</div>


					<div class="text-center w-full">
						<a class="txt1" href="https://t.me/Pandemic_Mod">
							SERVER BY PANDEMIC MOD TEAM
						
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor2/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor2/bootstrap/js/popper.js"></script>
	<script src="vendor2/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor2/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>