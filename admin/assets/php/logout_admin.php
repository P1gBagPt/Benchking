<?php
session_start();
unset($_SESSION["logged_in_admin"]);

header('location: ../../../index.php');
?>