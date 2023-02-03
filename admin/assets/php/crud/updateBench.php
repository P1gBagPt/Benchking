<?php
	require_once '../conexao_admin.php';
	
	if(isset($_POST['updateBench'])){
        $bench_id = $_POST['bench_id'];
		
        $link = $_POST['inputLink'];
        $link = preg_replace("#.*youtube\.com/watch\?v=#", "", $link);
        mysqli_query($conn, "UPDATE dc463jjk_benchking.benchmark SET link = '$link' WHERE id = '$bench_id'");


		header('location: ../../../benchmarks.php');
	
    }

?>