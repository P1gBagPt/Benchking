<?php
	require_once '../conexao_admin.php';
	
	if(isset($_POST['updateGPU'])){
        //Recolha de dados inseridos pelo utilizador (USERNAME, PASSWORD)
        $gpu_id = $_POST['gpu_id'];
        $Nome = $_POST['inputNome'];
        $Chipset = $_POST['inputChipset'];
        $Date = $_POST['inputDate'];
        $Bus = $_POST['inputBus'];
        $Memoria = $_POST['inputMemoria'];
        $ClockBase = $_POST['inputClock_Base'];
        $ClockMax = $_POST['inputClock_Max'];
		

        mysqli_query($conn, "UPDATE dc463jjk_benchking.gpu SET Name = '$Nome', Chipset = '$Chipset', Realeased = '$Date', Bus = '$Bus', Memory = '$Memoria', Clock_Max = '$ClockMax', Clock_Base = '$ClockBase' WHERE id = '$gpu_id'");



		//mysqli_query($conn, "UPDATE dc463jjk_benchking.gpu SET firstname = '$firstname', `lastname` = '$lastname', `address` = '$address' WHERE `user_id` = '$user_id'") or die(mysqli_error());

		header('location: ../../../hardware.php');
	
    }

?>