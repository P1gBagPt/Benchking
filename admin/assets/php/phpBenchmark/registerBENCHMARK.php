<?php
    // Create database connection
    require_once ('../../../../PHP/conexao.php');


    // If upload button is clicked ...
     if (isset($_POST['enviar-benchmark'])) {


            $link = $_POST['inputLink'];
            $link = preg_replace("#.*youtube\.com/watch\?v=#", "", $link);
            $sql = "INSERT INTO dc463jjk_benchking.benchmark (link) VALUES ('$link')";
             // execute query
            mysqli_query($conn, $sql);

            header('location: ../../../benchmarks.php');
    }else{
        echo "Algo correu mal";
    }
?>