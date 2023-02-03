<!DOCTYPE html>
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
	<!-- newsletter javascript -->
	<link href="../CSS/gpustyle.css" rel="stylesheet">
	
</head>

<body>
    
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
					<a class="nav-link" href="noticias.php">Not&iacute;cias</a>
				</li>


			<?php //Verificar se o utilizador está com o login efetuado e não acedeu a página diretamente
              include_once('../PHP/login.php');
              //Se estiver com login feito!
              if(isset($_SESSION['logged_in'], $_SESSION['username'])){
              //Recolha dos dados status e o username do utilizador
              //Status
              $usuario_status = $_SESSION['logged_in'];
              //Username
              $username = $_SESSION['username'];
              
              //Se o status === TRUE
              if ($usuario_status) { ?>
				<li class="nav-item dropdown no-arrow">
              		<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  <?php 
						if(isset($_SESSION['logged_in'], $_SESSION['username'])){
							$usuario_status = $_SESSION['logged_in'];
							$username = $_SESSION['username'];

						if ($usuario_status) { 
							require_once ('../PHP/conexao.php');
                        $id = $_SESSION['id'];

                        $qry = mysqli_query($conn, "SELECT imagem FROM dc463jjk_benchking.register WHERE id='$id'");
						while($row = mysqli_fetch_assoc($qry)){
                            if($row['imagem'] == ""){
                                echo "<img class='img-profile rounded-circle' src='../Profiles/Imagens/default.png' width='50' height='50' alt='Default Profile Pic'>";
                            }else{
                                $nomeImg = $row['imagem'];
                                echo "<img class='img-profile rounded-circle' src='../Profiles/Imagens/".$nomeImg."' width='50' height='50' alt='Profile Pic'>";
                            }
                        }
                    }}?>
					</a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="userDropdown">
                <a class="dropdown-item" href="dashboard.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                  Perfil
                </a>
                
                <a class="dropdown-item" href="Chat/">
                  <i class="fas fa-list fa-sm fa-fw mr-2"></i>
                  Chat
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="PHP/logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                  Logout
                </a>
              </div>
            </li>
			<?php }} else {?>
				<li class="nav-item">
					<a href="../login.php"><button id="btn-log" type="button" class="btn btn-primary">Login</button></a>
				</li>

				<li class="nav-item">
					<a href="../register.php"><button id="btn-reg" type="button" class="btn btn-primary">Register</button></a>	
				</li>
			<?php } ?>
		</ul>
		</div>
	</div>

</nav>


<div class="container" id="features">
	<div class="row">
		<div class="col-md-12">
			<div class="main_heading">
				<h1>GPU</h1>
				<div class="text-center"><span class="underline"></span></div>
			</div>
		</div><!-- End col-md-12 -->
	</div><!-- End row -->
</div>




<div class="card-block table-border-style">
	<div class="table-responsive">
        <table class="table">
            <thead>
        		<tr>
                	<th>Nome</th>
                	<th>Chipset</th>
					<th>Data de Lançamento</th>
					<th>Bus</th>
					<th>Memoria</th>
					<th>Clock Base</th>
					<th>Clock Máximo</th>
                </tr>
            </thead>
        <tbody>
		<?php 
			require_once ('../PHP/conexao.php');
            $sql = "SELECT Name, Chipset, Realeased, Bus, Memory, Clock_Max, Clock_Base FROM dc463jjk_benchking.gpu";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            	// output data of each row
            	while($row = $result->fetch_assoc()) {
                	echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Chipset"]. "</td><td>". $row["Realeased"]. "</td><td>". $row["Bus"]. "nm </td><td>". $row["Memory"]. "</td><td>". $row["Clock_Base"]. "MHz </td><td>". $row["Clock_Max"];

           		}
			}
        ?>
        	</tbody>
        </table>
    </div>
</div>




<div class="bottom_body"></div>



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
			<a href="downloadArea.php"><button id="btn-download">Programas de Benchmark</button></a>
		</div>

		<div class="col-md-3">
			<hr class="light">
			<h3>Contacto</h3>
			<hr class="light">
			<a href="contacto.php">suporte@benchking.pt</a>
		</div>

		<div class="col-md-3">
			<hr class="light">
			<h3>Newsletter</h3>
			<hr class="light">
			<form name="envia-email_form" onsubmit="return validarEmail()" action="PHP/newsletter.php" method="POST">
                <input type="box" name="footer-email" placeholder="Insira o seu email" id="footer-email">
                <input type="submit" name="footer-enviar" value="Subscrever" id="footer-enviar">
				<?php if(isset($_GET['erro'])){ ?>
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