<?php


if(isset($_GET['id'])){
    include ('../conexao_admin.php');   
    $id_admin = $_GET['id'];

    $sql_admin = "SELECT * FROM dc463jjk_benchking.admin WHERE id='$id_admin'";
    $result = $conn->query($sql_admin);
    if ($result->num_rows > 0) {
        

        $deleteRow = "DELETE FROM dc463jjk_benchking.admin WHERE id='$id_admin'";
        $resultDelete = $conn->query($deleteRow);

        header('location: ../../../bs-basic-table.php');

    }
}else{
    echo "Não é possível apagar o registo!";
}


?>