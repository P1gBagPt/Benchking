<?php
require_once ('conexao.php');

if(isset($_POST['enviar-form'])){
    //Recolha de dados inseridos pelo utilizador (USERNAME, PASSWORD)
$nome = $_POST['inputNome'];
$email = $_POST['inputEmail'];
$mensagem = $_POST['inputMensagem'];


        //Insereção dos dados inseridos pelo admin
        $sql = "INSERT INTO dc463jjk_benchking.inbox (nome, email, mensagem) VALUES ('$nome', '$email','$mensagem')";

        //executa a query
        $resultado = $conn->query($sql);

        header("location: ../contacto.php?erro_contacto=Enviado com sucesso irá ser contactado pelo email inserido o mais rápido possivel obrigado");

}

?>