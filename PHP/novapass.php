<?php

require_once ('conexao.php');



session_start();

$email = $_SESSION['emails'];

$password = md5($_POST['password_1']);


        $reset = mysqli_query($conn, "UPDATE dc463jjk_benchking.register set passwords='$password' WHERE email='$email'");

        /*if(mysqli_num_rows($reset) > 0){
            header('location: ../passSucesso.php');
        }else{
            echo 'Algo correu mal volte ao inicio';
        }*/

        if($reset){
            header('location: ../passSucesso.php');
        }else{
            echo 'Algo correu mal volte ao inicio';
        }

mysqli_close($conn);

?>