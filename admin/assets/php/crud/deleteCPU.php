<?php


if(isset($_GET['id'])){
    include ('../conexao_admin.php');   
    $id_cpu = $_GET['id'];

    $sql = "SELECT * FROM dc463jjk_benchking.cpu WHERE id='$id_cpu'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        

        $deleteRow = "DELETE FROM dc463jjk_benchking.cpu WHERE id='$id_cpu'";
        $resultDelete = $conn->query($deleteRow);

        header('location: ../../../hardware.php');

    }
}else{
    echo "Não é possível apagar o registo!";
}


?>