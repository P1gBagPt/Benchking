<?php


if(isset($_GET['id'])){
    include ('../conexao_admin.php');   
    $id_bench = $_GET['id'];

    $sql = "SELECT * FROM dc463jjk_benchking.benchmark WHERE id='$id_bench'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        

        $deleteRow = "DELETE FROM dc463jjk_benchking.benchmark WHERE id='$id_bench'";
        $resultDelete = $conn->query($deleteRow);

        header('location: ../../../benchmarks.php');

    }
}else{
    echo "Não é possível apagar o registo!";
}


?>