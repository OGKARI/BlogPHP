<?php
session_start();
require 'logs.php';

unset($_SESSION['user']);
if($_SESSION['rule'] == 100){
    $e_type = "Выход";
    logs($e_type); 
    } 
header('Location: ../'); 
?>