<?php



require_once ('conexao.php');



if(isset($_POST['footer-enviar'])){



$email = $_POST['footer-email'];



    $dbEmail = mysqli_query($conn, "SELECT * FROM dc463jjk_benchking.newsletter WHERE email = '$email'") or exit(mysqli_error($conn));

    if(mysqli_num_rows($dbEmail)) {

        header("location: ../index.php?erro=O email inserido ja esta a receber noticias");

    }else{

        $sql = "INSERT INTO dc463jjk_benchking.newsletter (email) VALUES ('$email')";
        $resultado = $conn->query($sql);


        $from= 'suporte@benchking.pt';//email de envio
        $subject= 'Registo da Newsletter';   
        $msg= "Obrigado por se registar na nossa newletter, ficar a par de todas as noticias"; 
        mail($email, $subject, $msg, 'From:' . $from); 
        echo 'Email sent to: ' . $email. '<br>';

        header("location: ../newsSucesso.php");

}



}



mysqli_close($conn);



?>