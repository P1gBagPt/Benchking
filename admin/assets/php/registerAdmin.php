<?php
//Conecção á base de dados 
require_once ('../../../PHP/conexao.php');


// Se o botao de registar for carregado
if(isset($_POST['enviar-admin'])){

//Recolha de dados inseridos pelo utilizador (USERNAME, PASSWORD)
$usernames = $_POST['inputUsername'];
//Incriptacao da password
$passwords = md5($_POST['inputPassword']);

    //Query para verificar se o username inserido já está registado na DB
    $dbUsername = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.admin WHERE username = '$usernames'") or exit(mysqli_error($conn)); 

    //Se existir algum email ou username
    if(mysqli_num_rows($dbUsername)) {
        //Mensagem de error a informar o utilizador que o email e usernam ejá se encontram registados
        header("location: ../../bs-basic-table.php?erro=Email ou username ja em uso");
        exit();

    }else{
        session_start();
        $_SESSION['emails'] = $_POST['email'];

        //Insereção dos dados inseridos pelo utilizador (EMAIL, USERNAME, PASSWORD)
        $sql = "INSERT INTO dc463jjk_benchking.admin (username, passwords) VALUES ('$usernames', '$passwords')";

        //executa a query
        $resultado = $conn->query($sql);

        header("location: ../../bs-basic-table.php");

    }



}

    //Encerra a conecção á base de dados
    mysqli_close($conn);

?>