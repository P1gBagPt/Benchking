<?php

session_start();
unset($_SESSION["logged_in"]);

header('location: ../index.php');


?>