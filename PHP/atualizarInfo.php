<?php

require ('conexao.php');
include_once ('login.php');

if(isset($_POST['atualizar'])){
    $id = $_SESSION['id'];

    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];

    $email = $_POST['email'];
    $username = $_POST['username'];

    $atualizarDados = mysqli_query($conn, "UPDATE dc463jjk_benchking.register SET email='$email', username='$username', nome='$nome', apelido='$apelido' WHERE id='$id'");

    header ('location: ../dashboard.php');

}


?>