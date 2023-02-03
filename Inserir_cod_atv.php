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

	<script type="text/javascript" src="JS\validarCod.js"></script>

	<link href="CSS/codAtvstyle.css" rel="stylesheet">

	

</head>





<body>

<div class="container">

        <div class="card card-container">

            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->



            <img id="profile-img" class="profile-img-card" src="img/icons/logo.png" />

            <p id="profile-name" class="profile-name-card"></p>

			<form name="form-inserirCod" class="form-inserirCod" onsubmit="return validarCod()" action="PHP\verificar_cod_atv.php" method="POST">



			<?php if(isset($_GET['erro'])){ ?>

          		<div class="mensagem_error"><?php echo $_GET['erro']; ?></div>

			<?php } ?>



			<div id="mensagem_erro"></div>



            

                <span id="reauth-email" class="reauth-email"></span>

                <input type="text" name="inputCodigo" id="inputCodigo" class="form-control" placeholder="C&oacute;digo">





                <button class="btn btn-lg btn-primary btn-block btn-inserirCod" name="enviar-cod" type="submit">Confirmar</button>



                <p>Foi enviado um c&oacute;digo de ativa&ccedil;&atilde;o para o seu email</p>





            </form><!-- /form -->

			

            <form name="resendEmail" action="PHP\verificar_cod_atv.php" method="POST">

                <button class="btn btn-lg btn-block" type="enviar" name="resendEmail" id="resendBTN"><p id="resend">N&atilde;o recebi o c&oacute;digo</p></button>

            </form>





        </div><!-- /card-container -->

    </div><!-- /container --> 

</body>



</html>