<?php
session_start() ;
//Conecção á base de dados 
require_once ('conexao.php');

//Se o botao de dar login for carregado
if(isset($_POST['enviar-form'])){

    //Recolha dos dados inseridos pelo utilizador
    $email = $_POST['inputEmail'];
    //Incriptação da password
    $passwords = md5($_POST['inputPassword']);

        //Query
        $login = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.register WHERE email='$email' AND passwords='$passwords'");

        //Verificar se os dados eram iguais com alguma das rows da DB
        if (mysqli_num_rows($login) > 0){
            $verificado = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.register WHERE verificado='1'");
            if(mysqli_num_rows($verificado) > 0){
                //Login efetuado com sucesso
                $_SESSION['logged_in'] = true;

                //Selecionar username pelo email inserido
                $userCount = mysqli_num_rows($login);
                if($userCount == 1){
                    while($row = mysqli_fetch_array($login)){
                        $id = $row["id"];
                        $_SESSION['id'] = $row["id"];
                        $_SESSION['imagem'] = $row["imagem"];
                        $_SESSION['username'] = $row["username"];
                        $_SESSION['emails'] = $row["email"];

                    }
                }

                header('location: ../index.php');
                die;
            }else{
                //Erro
                header('location: ../login.php?erro=A conta ainda não foi ativada');
            }
        }else{
            //Mensagem de error a informar que não foi possivel dar login
            header('location: ../login.php?erro=Email ou password incorretos');
        }

}

?>