<?php
//Conecção á base de dados 
require_once ('conexao.php');


// Se o botao de registar for carregado
if(isset($_POST['enviar'])){

//Recolha de dados inseridos pelo utilizador (EMAIL, USERNAME, PASSWORD)
$email = $_POST['inputEmail'];
$usernames = $_POST['inputUsername'];
//Incriptacao da password
$passwords = md5($_POST['inputPassword']);

    //Query para verificar se o email inserido já está registado DB
    $dbEmail = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.register WHERE email = '$email'") or exit(mysqli_error($conn));
    //Query para verificar se o username inserido já está registado na DB
    $dbUsername = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.register WHERE username = '$usernames'") or exit(mysqli_error($conn)); 

    //Se existir algum email ou username
    if(mysqli_num_rows($dbEmail) || mysqli_num_rows($dbUsername)) {
        //Mensagem de error a informar o utilizador que o email e usernam ejá se encontram registados
        header("location: ../Register.php?erro=Email ou username ja em uso");
        exit();

    }else{
        session_start();
        $_SESSION['emails'] = $_POST['inputEmail'];
        $vkey = rand(100000, 999999);
        //Insereção dos dados inseridos pelo utilizador (EMAIL, USERNAME, PASSWORD)
        $sql = "INSERT INTO dc463jjk_benchking.register (email, username, passwords, vkey) VALUES ('$email', '$usernames', '$passwords', '$vkey')";

        //executa a query
        $resultado = $conn->query($sql);

        $to = $email;
        $from = 'suporte@benchking.pt';
        $subject= 'Verificação de email';
        $mensagem = 'Código de ativação: '.$vkey;
        $headers = "De: suporte@benchking.pt";

        mail($to, $subject, $mensagem, 'From:' . $from);

        //Redireciona para a página de inserir o código de confirmacao
        header("location: ../Inserir_cod_atv.php");

        
        //header("location: ../RegistoSucesso.php");

    }



}

    //Encerra a conecção á base de dados
    mysqli_close($conn);

?>