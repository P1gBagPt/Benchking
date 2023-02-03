<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Benchking</title>
	<link rel="icon" href="img/icons/logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<!-- newsletter javascript -->
	<script type="text/javascript" src="JS\login.js"></script>
	<link href="CSS/loginstyle.css" rel="stylesheet">
	
</head>

<body> 
<div class="container">
        <div class="card card-container">

            <a href="index.php"><img id="profile-img" class="profile-img-card" src="img/icons/logo.png" /></a>
            <p id="profile-name" class="profile-name-card"></p>

			<form name="form-signin" class="form-signin" onsubmit="return validar()" action="PHP\login.php" method="POST">

			<?php if(isset($_GET['erro'])){ ?>
          		<div class="mensagem_error"><?php echo $_GET['erro']; ?></div>
			<?php } ?>

			<div id="mensagem_erro"></div>

            
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="inputEmail" id="inputEmail" class="form-control" placeholder="Introduza o email">

				<!--Icon Email-->
				<div class="img_email">
        			<figure><img class="far fa-envelope"></figure>
      			</div>
				<!--Icon Email-->

				<input type="password" name="inputPassword" placeholder="Introduza a password" id="inputPassword">
				<i class="material-icons visibility" id="eye" onclick="mostrarEsconder()">visibility</i>

				<!--Icon Password-->
				<div class="img_password">
        			<figure><img class="fas fa-lock" id="imagem-password"></figure>
      			</div>

    			<!--Botao para Mostrar e Esconder a Password-->

                <button name="enviar-form" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Login</button>
            </form><!-- /form -->
			<a href="forgotpassword.php" class="forgot-password">Repor password</a>
            <a href="register.php" class="forgot-password">Registar</a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>