<?php
//Conecção á base de dados 
require_once ('../../../../PHP/conexao.php');


// Se o botao de registar for carregado
if(isset($_POST['enviar-cpu'])){

//Recolha de dados inseridos pelo utilizador (USERNAME, PASSWORD)
$Nome = $_POST['inputNome'];
$Cores = $_POST['inputCores'];
$Clocks = $_POST['inputClock'];
$Socket = $_POST['inputSocket'];
$Litho = $_POST['inputLitho'];
$Cache = $_POST['inputCache'];
$TDP = $_POST['inputTDP'];
$Date = $_POST['inputDate'];

    //Query para verificar se o Nome inserido já está registado na DB
    $dbNome = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.cpu WHERE Name = '$Nome'") or exit(mysqli_error($conn)); 

    //Se existir algum email ou username
    if(mysqli_num_rows($dbNome)) {
        //Mensagem de error a informar o utilizador que o email e usernam ejá se encontram registados
        header("location: ../../../hardware.php?erro=Um processador com esse nome já foiregistada");
        exit();

    }else{

        //Insereção dos dados inseridos pelo admin
        $sql = "INSERT INTO dc463jjk_benchking.cpu (Name, Cores_Threads, Clock, Socket, Litho, Cache, TDP, Realeased) VALUES ('$Nome', '$Cores','$Clocks','$Socket','$Litho','$Cache','$TDP','$Date')";

        //executa a query
        $resultado = $conn->query($sql);

        header("location: ../../../hardware.php");

    }



}

    //Encerra a conecção á base de dados
    mysqli_close($conn);

?>