<?php
//Conecção á base de dados 
require_once ('../../../../PHP/conexao.php');


// Se o botao de registar for carregado
if(isset($_POST['enviar-gpu'])){

//Recolha de dados inseridos pelo utilizador (USERNAME, PASSWORD)
$Nome = $_POST['inputNome'];
$Chipset = $_POST['inputChipset'];
$Date = $_POST['inputDate'];
$Bus = $_POST['inputBus'];
$Memoria = $_POST['inputMemoria'];
$ClockBase = $_POST['inputClock_Base'];
$ClockMax = $_POST['inputClock_Max'];


    //Query para verificar se o Nome inserido já está registado na DB
    $dbNome = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.gpu WHERE Name = '$Nome'") or exit(mysqli_error($conn)); 

    //Se existir algum email ou username
    if(mysqli_num_rows($dbNome)) {
        //Mensagem de error a informar o utilizador que o email e usernam ejá se encontram registados
        header("location: ../../../hardware.php?erro=Uma placa gráfica com esse nome já foiregistada");
        exit();

    }else{

        //Insereção dos dados inseridos pelo admin
        $sql = "INSERT INTO dc463jjk_benchking.gpu (Name, Chipset, Realeased, Bus, Memory, Clock_Max, Clock_Base) VALUES ('$Nome', '$Chipset','$Date','$Bus','$Memoria','$ClockBase','$ClockMax')";

        //executa a query
        $resultado = $conn->query($sql);

        header("location: ../../../hardware.php");

    }



}

    //Encerra a conecção á base de dados
    mysqli_close($conn);

?>