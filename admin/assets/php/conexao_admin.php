<?php



$servername = "localhost";

$username = "root";

$password = "";

$dbname = "dc463jjk_benchking";





$conn = mysqli_connect($servername, $username, $password, $dbname) or die ("A conexão falhou".mysqli_connect_error());



if (!$conn) {

    echo "Error: Falha ao conectar-se á base de dados" . PHP_EOL;

    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;

    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;

    exit;

}

 

/*echo "A conexão á base de dados feita com sucesso" . PHP_EOL;

echo"<br>";*/



?>