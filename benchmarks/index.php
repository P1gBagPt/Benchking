<?php


if (isset($_POST['enviar-comentario'])) {
		
		include_once ('../PHP/login.php');
		if(isset($_SESSION['logged_in'])){
			$usuario_status = $_SESSION['logged_in'];

			$idVideo = $_POST['id_video'];
			$idUser = $_SESSION['id'];
			$comentario = $_POST['textarea'];

			include_once ('../PHP/conexao.php');
			$sql_comentario = "INSERT INTO dc463jjk_benchking.comentarios (id_user, id_video, comentario) VALUES ('$idUser', '$idVideo', '$comentario')";
			//executa a query
			$resultado = $conn->query($sql_comentario);

			header('location: index.php');
		}else{
			header('location: index.php?erroComentario=Precisa de fazer login para comentar os vídeos');
		}

	}
?>





<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="Benchking tem como objetivo mostrar pontuações de benchmarks e as últimas noticias do mundo do hardware" />
	<meta name="keywords" content="benchmark, hardware, software, news, bench" />
	<meta name="author" content="Benchking" />
	<title>Benchking</title>
	<link rel="icon" href="../img/icons/logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script type="text/javascript" src="..\JS\comentarios.js"></script>
	<script type="text/javascript">
		var observe;
		if (window.attachEvent) {
			observe = function(element, event, handler) {
				element.attachEvent('on' + event, handler);
			};
		} else {
			observe = function(element, event, handler) {
				element.addEventListener(event, handler, false);
			};
		}

		function init() {
			var text = document.getElementById('text');

			function resize() {
				text.style.height = 'auto';
				text.style.height = text.scrollHeight + 'px';
			}
			/* 0-timeout to get the already changed text */
			function delayedResize() {
				window.setTimeout(resize, 0);
			}
			observe(text, 'change', resize);
			observe(text, 'cut', delayedResize);
			observe(text, 'paste', delayedResize);
			observe(text, 'drop', delayedResize);
			observe(text, 'keydown', delayedResize);

			text.focus();
			text.select();
			resize();
		}
	</script>





	<!-- newsletter javascript -->
	<link href="../CSS/benchmarkstyle.css" rel="stylesheet">

</head>

<body onload="init();">
	<nav class="navbar navbar-custom navbar-expand-md">
		<div class="container-fluid">
			<a class="navbar-brand" href="../index.php"><img src="../img/icons/logo.png"></a>
			<button class="navbar-toggler ml-auto custom-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="/">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../noticias.php">Not&iacute;cias</a>
					</li>


<?php //Verificar se o utilizador está com o login efetuado e não acedeu a página diretamente
					include_once ('../PHP/login.php');

					//Se estiver com login feito!
					if (isset($_SESSION['logged_in'], $_SESSION['username'])) {
						//Recolha dos dados status e o username do utilizador
						//Status
						$usuario_status = $_SESSION['logged_in'];
						//Username
						$username = $_SESSION['username'];

						//Se o status === TRUE
						if ($usuario_status) {?>
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php
									if (isset($_SESSION['logged_in'], $_SESSION['username'])) {
										$usuario_status = $_SESSION['logged_in'];
										$username = $_SESSION['username'];

										if ($usuario_status) {
											require_once('../PHP/conexao.php');
											$id = $_SESSION['id'];

											$qry = mysqli_query($conn, "SELECT imagem FROM dc463jjk_benchking.register WHERE id='$id'");
											while ($row = mysqli_fetch_assoc($qry)) {
												if ($row['imagem'] == "") {
													echo "<img class='img-profile rounded-circle' src='../Profiles/Imagens/default.png' width='50' height='50' alt='Default Profile Pic'>";
												} else {
													$nomeImg = $row['imagem'];
													echo "<img class='img-profile rounded-circle' src='../Profiles/Imagens/" . $nomeImg . "' width='50' height='50' alt='Profile Pic'>";
												}
											}
										}
}?>
								</a>
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="userDropdown">
									<a class="dropdown-item" href="../dashboard.php">
										<i class="fas fa-user fa-sm fa-fw mr-2"></i>
										Perfil
									</a>
									<a class="dropdown-item" href="../Chat/">
										<i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
										Chat
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="../PHP/logout.php">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
										Logout
									</a>
								</div>
							</li>
<?php }
} else {?>
						<li class="nav-item">
							<a href="../login.php"><button id="btn-log" type="button" class="btn btn-primary">Login</button></a>
						</li>

						<li class="nav-item">
							<a href="../register.php"><button id="btn-reg" type="button" class="btn btn-primary">Register</button></a>
						</li>
<?php } 
					// closing connection
					mysqli_close($conn);?>
				</ul>
			</div>
		</div>

	</nav>


<?php if (isset($_GET['erroComentario'])) { ?>
		<div class="mensagem_error"><?php echo $_GET['erroComentario']; ?></div>
<?php }?>

<span id="mensagem_erro"></span>


<?php include('../PHP/conexao.php');
	$sql = "SELECT id, link FROM dc463jjk_benchking.benchmark";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			$url = "https://www.youtube.com/embed/" . $row['link'];
			echo "<iframe class='resp-container' id='resp-container' src='" . $url . "' allowfullscreen></iframe><br>";
			echo "<div class='comentery-box'>";
			echo "<h4>Coment&aacute;rios</h4>";

			// $sql = "SELECT * FROM brand INNER JOIN product ON brand.brand_id = product.brand_id";  
			$mostrarComentarios = "SELECT comentario, username FROM dc463jjk_benchking.comentarios INNER JOIN register ON comentarios.id_user = register.id WHERE id_video='" . $row['id'] . "'";
			$resultComentarios = $conn->query($mostrarComentarios);
			if ($resultComentarios->num_rows > 0) {
				while ($rowComentario = $resultComentarios->fetch_assoc()) {
					echo "<span>" . $rowComentario['username'] . ": </span>";
					echo "<p>" . $rowComentario['comentario'] . "</p>";
				}
			}
			echo "</div>";
?>
<?php
			echo "<form name='form-comentarios' action='' method='POST'>";
				echo "<input type='hidden' name='id_video' value='" . $row['id'] . "'>";
				echo "<textarea class='textarea-comentarios' rows='3' id='text' maxlength='300' placeholder='Escrever Coment&aacute;rio' name='textarea'></textarea>";
				echo "<button name='enviar-comentario' class='btn btn-lg btn-primary btn-block btn-comentario' onclick='validarComentario();' type='submit'>Enviar</button>";
			echo "</form>";
		}
	}

?>






	<div class="bottom_body"></div>



	<!--- Footer -->
	<footer>
		<div class="container-fluid padding">
			<div class="row text-center">
				<div class="col-md-3">
					<img src="../img/icons/logo.png" title="Benchking">
					<hr class="light">
					<p>Benchking tem como objetivo mostrar pontua&ccedil;&otilde;es de benchmarks e
						as &uacute;ltimas noticias do mundo do hardware</p>
				</div>

				<div class="col-md-3">
					<hr class="light">
					<h3>Downloads</h3>
					<hr class="light">
					<a href="../downloadArea.php"><button id="btn-download">Programas de Benchmark</button></a>
				</div>

				<div class="col-md-3">
					<hr class="light">
					<h3>Contacto</h3>
					<hr class="light">
					<a href="../contacto.php">suporte@benchking.pt</a>
				</div>

				<div class="col-md-3">
					<hr class="light">
					<h3>Newsletter</h3>
					<hr class="light">
					<form name="envia-email_form" onsubmit="return validarEmail()" action="../PHP/newsletter.php" method="POST">
						<input type="box" name="footer-email" placeholder="Insira o seu email" id="footer-email">
						<input type="submit" name="footer-enviar" value="Subscrever" id="footer-enviar">
						<?php if (isset($_GET['erro'])) { ?>
							<div class="mensagem_error"><?php echo $_GET['erro']; ?></div>
						<?php } ?>
						<span id="mensagem_erro"></span>
						<br>


					</form>
				</div>
			</div>
		</div>


		<div class="container-fluid padding">
			<div class="row text-center padding">
				<div class="col-12">
					<h2>Redes Sociais</h2>
				</div>
				<div class="col-12 social padding">
					<a href="https://www.instagram.com/benchkingpt/"><i class="fab fa-instagram"></i></a>
					<a href="https://twitter.com/Benchkingpt"><i class="fab fa-twitter"></i></a>
				</div>
			</div>
		</div>
	</footer>



	<div class="bottom">
		<p>&copy; 2021 Copyright Todos os direitos reservados a Benchking</p>
	</div>





</body>

</html>