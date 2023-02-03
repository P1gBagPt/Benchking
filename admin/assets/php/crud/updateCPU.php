<?php
	require_once '../conexao_admin.php';
	
	if(isset($_POST['updateCPU'])){
        //Recolha de dados inseridos pelo utilizador (USERNAME, PASSWORD)
        $cpu_id = $_POST['cpu_id'];
        $inputNome = $_POST['inputNome'];
        $inputCores = $_POST['inputCores'];
        $inputClock = $_POST['inputClock'];
        $inputSocket = $_POST['inputSocket'];
        $inputLitho = $_POST['inputLitho'];
        $inputCache = $_POST['inputCache'];
        $inputTDP = $_POST['inputTDP'];
        $inputRealeased = $_POST['inputRealeased'];
		

        mysqli_query($conn, "UPDATE dc463jjk_benchking.cpu SET Name = '$inputNome', Cores_Threads = '$inputCores', Clock = '$inputClock', Socket = '$inputSocket', Litho = '$inputLitho', Cache = '$inputCache', TDP = '$inputTDP', Realeased = '$inputRealeased' WHERE id = '$cpu_id'");


		header('location: ../../../hardware.php');
	
    }

?>