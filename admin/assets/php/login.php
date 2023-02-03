<?php
session_start() ;
//Conecção á base de dados 
require_once ('conexao_admin.php');

//Se o botao de dar login for carregado
if(isset($_POST['enviar-login-admin'])){

    //Recolha dos dados inseridos pelo utilizador
    $username = $_POST['inputUsername'];
    //Incriptação da password
    $passwords = md5($_POST['inputPassword']);

        //Query
        $login_admin = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.admin WHERE username='$username' AND passwords='$passwords'");

        //Verificar se os dados eram iguais com alguma das rows da DB
        if (mysqli_num_rows($login_admin) > 0){
                //Login efetuado com sucesso
                $_SESSION['logged_in_admin'] = true;

                //Selecionar username pelo username inserido
                $userCount = mysqli_num_rows($login_admin);
                if($userCount == 1){
                    while($row = mysqli_fetch_array($login_admin)){
                        $id = $row["id"];
                        $_SESSION['id_admin'] = $row["id"];
                        $_SESSION['imagem_admin'] = $row["imagem"];
                        $_SESSION['username_admin'] = $row["username"];
                    }
                }

                header("location: ../../index.php");
                die;

        }else{
            //Mensagem de error a informar que não foi possivel dar login
            header('location: ../../auth-normal-sign-in.php?erro=Username ou password incorretos');
        }

}

?>