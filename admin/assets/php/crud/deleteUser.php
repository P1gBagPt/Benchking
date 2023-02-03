<?php


if(isset($_GET['id'])){
    include ('../conexao_admin.php');   
    $id_user = $_GET['id'];

    $sql_user = "SELECT * FROM dc463jjk_benchking.register WHERE id='$id_user'";
    $result = $conn->query($sql_user);
    if ($result->num_rows > 0) {
        

        $deleteRow = "DELETE FROM dc463jjk_benchking.register WHERE id='$id_user'";
        $resultDelete = $conn->query($deleteRow);

        header('location: ../../../bs-basic-table.php');

    }
}else{
    echo "Não é possível apagar o registo!";
}


?>