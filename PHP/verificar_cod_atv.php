<?php
    require_once ('conexao.php');

    if(isset($_POST['enviar-cod'])){
        session_start();
        $email = $_SESSION['emails'];
        $cod = $_POST['inputCodigo'];

        $verificar_cod_db = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.register WHERE email='$email' AND vkey='$cod'");

        if(mysqli_num_rows($verificar_cod_db) > 0){
            $verifica_1 = mysqli_query($conn, "UPDATE dc463jjk_benchking.register set verificado='1' WHERE email='$email'");
            header('location: ../registosucesso.php');
        }else{
            header("location: ../Inserir_cod_atv.php?erro=Codigo invalido ou conta ja confirmada");
            exit();  
        }

    }
    if(isset($_POST['resendEmail'])){
        session_start();
        $email = $_SESSION['emails'];

        $resend = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.register WHERE email='$email'");

        if($resend){
            while($row = mysqli_fetch_array($resend)){
            $vkey = $row['vkey'];

            $to = $email;
            $from = 'suporte@benchking.pt';
            $subject= 'Verificação de email';
            $mensagem = 'Código de ativação: '.$vkey;
            $headers = "De: suporte@benchking.pt";
    
            mail($to, $subject, $mensagem, 'From:' . $from);
    
            //Redireciona para a página de inserir o código de confirmacao

            header("location: ../Inserir_cod_atv.php");

            }
        }else{
            echo 'algo correu mal';
        }

    }


    if(isset($_POST['enviar-cod-security'])){
        session_start();
        $email = $_SESSION['emails'];
        $cod = $_POST['inputCodigo'];

        $verificar_cod_db = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.register WHERE email='$email' AND securityCode='$cod'");

        if(mysqli_num_rows($verificar_cod_db) > 0){
            //$verifica_1 = mysqli_query($conn, "UPDATE dc463jjk_benchking.register set verificado='1' WHERE email='$email'");
            header('location: ../novapass.php');
        }else{
            header("location: ../inserirCodPass.php?erro=Codigo invalido");
            exit();  
        }

    }



    if(isset($_POST['resendSecurity'])){
        $securityCode = rand(100000, 999999);
            //Insereção dos dados inseridos pelo utilizador (EMAIL, USERNAME, PASSWORD)
            mysqli_query($conn, "UPDATE dc463jjk_benchking.register SET securityCode = '$securityCode' WHERE email = '$email'");


            $to = $email;
            $from = 'suporte@benchking.pt';
            $subject= 'Código de segurança para repor a password';
            $mensagem = 'Código de segurança: '.$securityCode;
            $headers = "De: suporte@benchking.pt";
    
            mail($to, $subject, $mensagem, 'From:' . $from);

            header("location: ../inserirCodPass.php");

    }



?>