<?php

require_once ('conexao.php');



if(isset($_POST['enviar-form'])){


        $email = $_POST['email'];


        $query =mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.register WHERE email='$email'");


        if (mysqli_num_rows($query) > 0){
            session_start();
            $_SESSION['emails'] = $_POST['email'];


            $securityCode = rand(100000, 999999);
            //Insereção dos dados inseridos pelo utilizador (EMAIL, USERNAME, PASSWORD)
            mysqli_query($conn, "UPDATE dc463jjk_benchking.register SET securityCode = '$securityCode' WHERE email = '$email'");


            $to = $email;
            $from = 'suporte@benchking.pt';
            $subject= 'Código de segurança para repor a password';
            $mensagem = 'Código de segurança: '.$securityCode;
            $headers = "De: suporte@benchking.pt";
    
            mail($to, $subject, $mensagem, 'From:' . $from);

            header('location: ../inserirCodPass.php');
           
        }else{
            header('location: ../forgotpassword.php?erro=Nao existe nenhuma conta com o email inserido');
        }

}

    mysqli_close($conn);

?>