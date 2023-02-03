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
	<script type="text/javascript" src="JS\register.js"></script>
	<link href="CSS/registerstyle.css" rel="stylesheet">
	
</head>

<body> 
<div class="container">
        <div class="card card-container">

            <a href="index.php"><img id="profile-img" class="profile-img-card" src="img/icons/logo.png" /></a>
            <p id="profile-name" class="profile-name-card"></p>

			<form name="form-signup" class="form-signup" onsubmit="return validar()" action="PHP\registo.php" method="POST">

			<?php if(isset($_GET['erro'])){ ?>
          		<div class="mensagem_error"><?php echo $_GET['erro']; ?></div>
			<?php } ?>

			<div id="mensagem_erro"></div>

            
                <input type="text" id="inputEmail" name="inputEmail" class="form-control" placeholder="Introduza o seu email">
                <div class="img_email">
                    <figure><img class="far fa-envelope" id="imagem-email"></figure>
                </div> 

                <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Introduza o username">
                <div class="img_username">
                    <figure><img class="fas fa-user" id="imagem-username"></figure>
                </div> 

                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Introduza a password">
                <div class="img_password_1">
                    <figure><img class="fas fa-lock" id="imagem-password_1"></figure>
                </div>

                <div class="indicador_forca">
                    <span class="fraco"></span>
                    <span class="medio"></span>
                    <span class="forte"></span>
                </div>
                <div class="text">A tua password é muito fraca</div>


				<input type="password" name="inputPassword2" placeholder="Confirmar password" id="inputPassword2">
                <div class="img_password_2">
                    <figure><img class="fas fa-unlock-alt" id="imagem-password_2"></figure>
                </div>

                <button name="enviar" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Registar</button>
            </form><!-- /form -->
            <a href="login.php" class="login">Login</a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>

</html>