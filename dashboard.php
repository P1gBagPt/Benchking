<!DOCTYPE html>
<!--Linguagem do website-->
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
  	<!--Link CSS ao HTML-->
    <link rel="stylesheet" type="text/css" href="CSS\dashboardstyle.css">

</head>
<body>
    <!--Cabeçalho-->
    <header class="cabecalho-fixo">
      <div class="cabecalho">
          <!--Título Perfil-->
        <h1 class="text-center">Perfil</h1>
      </div>
    </header>

    <div class="container">
        <div class="card card-container">

            <!--Logotipo carregando para página inicial-->
            <img id="profile-img" class="profile-img-card" src="img/icons/logo.png" />
            <p id="profile-name" class="profile-name-card"></p>



    <div class="dashboard">

        <!--Existindo algum erro aparece caixa de erro-->
        <?php if(isset($_GET['erro'])){ ?>
                    <div class="mensagem_error"><?php echo $_GET['erro']; ?></div>
        <?php } ?>
                

    
                
                <!--Form para alterar a imagem de perfil-->
                <form action="PHP/uploadImg.php" method="POST" enctype="multipart/form-data" id="uploadForm">




              <?php //Verificar se o utilizador está com o login efetuado e não acedeu a página diretamente
              include ('PHP/login.php');
              //session_start();
              //Se estiver com login feito!
              if(isset($_SESSION['logged_in'], $_SESSION['username'])){
              //Recolha dos dados status e o username do utilizador
              //Status
              $usuario_status = $_SESSION['logged_in'];
              //Username
              $username = $_SESSION['username'];
              
              //Se o status === TRUE
              if ($usuario_status) { ?>
              <div class="menuAcao">
              <div class="profile-pic-div">
                    <?php
                        //Conecção á base de dados
                        require_once ('PHP/conexao.php');
                        //Recolha do id do Login efetuado
                        $id = $_SESSION['id'];

                        //Query á base de dados para buscar a imagem do utilizador
                        $qry = mysqli_query($conn, "SELECT imagem FROM dc463jjk_benchking.register WHERE id='$id'");
                        //Percorre todos os registo da tabela até encontrar o campo do id do utilizador logado
                        while($row = mysqli_fetch_assoc($qry)){
                            //Se o campo de imagem estiver vazio
                            if($row['imagem'] == ""){
                                //É mostrada uma imagem padrão para todos os utilizadores que não tenham escolhido uma imagem
                                echo "<img width='100' height='100' src='Profiles/Imagens/default.png' alt='Default Profile Pic'>";
                            }else{
                                //Se o campo imagem tiver o nome da imagem é mostrada a respetiva imagem do utilizador
                                $nomeImg = $row['imagem'];
                                echo "<img id='photo' name='photo' src='Profiles/Imagens/".$nomeImg."' alt='Profile Pic'>";
                            }
                        }
                    ?>
                </div>







                    <label type="submit" for="file" name="enviar_imagem" id="enviar_imagem"></label>
                    <input type="file" name="imagem" class="ficheiro" id="file">
                    

                    
                </div>


                <script src="JS\app.js"></script>

                </form>

                <!--Form para alterar as informações dos utilizadores-->
                <form name="form-dashboard" class="form-dashboard" action="PHP/atualizarInfo.php" method="POST">
                <div class="caixas_informacoes">
                    <div class="nome_apelido">

                    <?php require ('PHP/login.php'); 

                            $id = $_SESSION['id'];
                            $qry = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.register WHERE id='$id'");

                            if($qry){
                                while($row = mysqli_fetch_array($qry)){
                                if($row['nome'] || $row['apelido'] != NULL){
                                    $nome = $row['nome'];
                                    $apelido = $row['apelido'];
                                    }else{
                                        $nome = '';
                                        $apelido = '';
                                    }
                                }
                            }?>
                        <!--Label a informar o Primeiro nome -->
                        <label for="nome" class="nomeLabel">Primeiro Nome</label>
                        <!--Caixa de texto a mostrar o nome    -Campo não obrigatório-  -->
                        <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" placeholder="Insira o seu nome">
                        <div class="img_nome">
                            <!--Imagem Nome-->
                            <figure><img class="fas fa-user" id="imagem-email"></figure>
                        </div>

                        <!--Label a informar o Apelido -->
                        <label for="apelido">Apelido</label>
                        <!--Caixa de texto a mostrar o apelido   -Campo não obrigatório-  -->
                        <input type="text" name="apelido" id="apelido" value="<?php echo $apelido; ?>" placeholder="Insira o seu apelido">
                        <div class="img_apelido">
                            <!--Imagem Apelido-->
                            <figure><img class="far fa-user" id="imagem-email"></figure>
                        </div>
                    </div>


                    <div class="email_user">
                    <?php require ('PHP/login.php'); $email = $_SESSION['emails']; $username = $_SESSION['username'] ?>
                        <!--Label a informar o Email *-->
                        <label for="email">Email *</label>
                        <!--Caixa de texto a mostrar o email *-->
                        <input type="text" name="email" id="email" value="<?php echo $email ?>" readonly>
                        <div class="img_email">
                            <!--Imagem Email-->
                            <figure><img class="fa fa-envelope" id="imagem-email"></figure>
                        </div>

                        <!--Label a informar o Username *-->
                        <label for="username" class="usernameLabel">Nome de Utilizador *</label>
                        <!--Caixa de texto a mostrar o username *-->
                        <input type="text" name="username" id="username" value="<?php echo $username ?>" readonly>
                        <div class="img_username">
                            <!--Imagem Username-->
                            <figure><img class="fas fa-user" id="imagem-email"></figure>
                        </div>
                    </div>
                </div>

                <div class="atualizar_dados">
                    <!--Botão para atualizar todos os dados inseridos pelo utilizador-->
                    <input type="submit" class="btn btn-lg btn-primary btn-block btn-atualizarInfo" name="atualizar" value="Atualizar dados">
                </div>
                </form>

        <!--Se o utlizador não tiver feito o login é mostrado os botões de Login e Register-->
        <?php }} else {?>
        <div class="botoes_RL">
            <!--Botão de Login-->
            <a class="btn_login" href="Login.php"><button>Login</button></a>
            <!--Botão de Register-->
            <a class="btn_register" href="Register.php"><button>Registar</button></a>
        </div>
        <?php } ?>
        <div class="voltar">
            <!--Hiperligação para a página inicial-->
            <a href="index.php"><p>Voltar</p></a>
        </div>
        </div>

        </div><!-- /card-container -->
    </div><!-- /container -->

</body>
</html>