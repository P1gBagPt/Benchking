<?php


if(isset($_GET['id'])){
    include ('../conexao_admin.php');   
    $id_mensagem = $_GET['id'];

    $sql = "SELECT * FROM dc463jjk_benchking.inbox WHERE id='$id_mensagem'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        

        $deleteRow = "DELETE FROM dc463jjk_benchking.inbox WHERE id='$id_mensagem'";
        $resultDelete = $conn->query($deleteRow);

        header('location: ../../../mensagens.php');

    }
}else{
    echo "Não é possível apagar o registo!";
}


?>