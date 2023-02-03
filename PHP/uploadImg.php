<?php

//Conecção á base de dados 
require ('conexao.php');

    if($_FILES['imagem']['name'] != ''){
        //$extPerm = array("jpg", "png", "gif");
        $extension = pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);
        if($extension=='jpg' || $extension=='jpeg' || $extension=='png' || $extension=='gif'){
            if($_FILES['imagem']['size'] < 5000000){
                include ('login.php');
                $id = $_SESSION['id'];
                $username = $_SESSION['username'];

                $image = $_FILES['imagem']['name'];
                $ext = pathinfo($image, PATHINFO_EXTENSION);

                $nomeFicheiro = $username. 'Perfil'. '.'.'jpg';

                move_uploaded_file($_FILES['imagem']['tmp_name'], "../Profiles/Imagens/".$nomeFicheiro);
                $qry = mysqli_query($conn, "UPDATE dc463jjk_benchking.register SET imagem = '".$nomeFicheiro."' WHERE id = '".$_SESSION['id']."'");

                header('location: ../dashboard.php');
            }else{
                header("location: ../dashboard.php?erro=A imagem e muito pesada");
            }
        }else{
            header("location: ../dashboard.php?erro=O arquivo nao e uma imagem");
        }

    }else{
        header("location: ../dashboard.php?erro=Por favor selecione uma imagem");
    }
    
    
    

?>