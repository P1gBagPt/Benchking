<?php


if(isset($_GET['id'])){
    include ('../conexao_admin.php');   
    $id_gpu = $_GET['id'];

    $sql = "SELECT * FROM dc463jjk_benchking.gpu WHERE id='$id_gpu'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        

        $deleteRow = "DELETE FROM dc463jjk_benchking.gpu WHERE id='$id_gpu'";
        $resultDelete = $conn->query($deleteRow);

        header('location: ../../../hardware.php');

    }
}else{
    echo "Não é possível apagar o registo!";
}


?>