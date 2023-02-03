<!DOCTYPE html>
<!--Linguagem do website-->
<html lang="pt">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Benchking</title>
	<link rel="icon" href="../img/icons/logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
  	<!--Link CSS ao HTML-->
    <link rel="stylesheet" type="text/css" href="assets/css/dashboardadminstyle.css">

</head>
<body>
    <!--Cabeçalho-->
    <header class="cabecalho-fixo">
      <div class="cabecalho">
          <!--Título Perfil-->
        <h1 class="text-center">Perfil Admin</h1>
      </div>
    </header>

    <div class="container">
        <div class="card card-container">

            <!--Logotipo carregando para página inicial-->
            <a href="index.php"><img id="profile-img" class="profile-img-card" src="../img/icons/logo.png" /></a>
            <p id="profile-name" class="profile-name-card"></p>



    <div class="dashboard">

        <!--Existindo algum erro aparece caixa de erro-->
        <?php if(isset($_GET['erro'])){ ?>
                    <div class="mensagem_error"><?php echo $_GET['erro']; ?></div>
        <?php } ?>
                

    
                
                <!--Form para alterar a imagem de perfil-->
                <form action="assets/php/uploadImg.php" method="POST" enctype="multipart/form-data" id="uploadForm">



                <?php //Verificar se o utilizador está com o login efetuado e não acedeu a página diretamente
         include ('assets/php/login.php');

         if(isset($_SESSION['logged_in_admin'], $_SESSION['username_admin'])){


         $usuario_status = $_SESSION['logged_in_admin'];

         if ($usuario_status == 1) { 
    ?>
              <div class="menuAcao">
              <div class="profile-pic-div">
              <?php 
                                if(isset($_SESSION['logged_in_admin'], $_SESSION['username_admin'])){
                                    $username = $_SESSION['username_admin'];
                                    $usuario_status = $_SESSION['logged_in_admin'];

                                    if ($usuario_status) { 
                                        require_once ('assets/php/conexao_admin.php');
                                        
                                        $id = $_SESSION['id_admin'];

                                        $qry = mysqli_query($conn, "SELECT imagem FROM dc463jjk_benchking.admin WHERE id='$id'");
						                while($row = mysqli_fetch_assoc($qry)){
                                            if($row['imagem'] == ""){
                                                echo "<img class='img-radius' src='../Profiles/Imagens/default.png' alt='User-Profile-Image'>";
                                            }else{
                                                $nomeImg = $row['imagem'];
                                                echo "<img class='img-radius' src='assets/images/adminImages/".$nomeImg."' alt='User-Profile-Image'>";
                                            }
                                        }
                                    }
                                }
                                ?>
                </div>







                    <label type="submit" for="file" name="enviar_imagem" id="enviar_imagem"></label>
                    <input type="file" name="imagem" class="ficheiro" id="file">
                    
                    <p> Só é possível alterar a foto de perfil</p>

                    
                </div>


                <script src="../JS\app.js"></script>




                </form>

                <!--Form para alterar as informações dos utilizadores-->
                

        <!--Se o utlizador não tiver feito o login é mostrado os botões de Login e Register-->
        <?php }} else {?>
            <h5>You are NOT allowed to access this area</h5>
        <?php } ?>
        
        </div>

        </div><!-- /card-container -->
    </div><!-- /container -->

</body>
</html>