<?php 
    require "Database.php";
    
    $Database = new Database();
    $qry = "DELETE FROM category WHERE id_category = :id";
    $parm = array(
        ":id"=>$_GET["id_category"]);
    $Database->set($qry,$parm);
    require 'logs.php';
 
    if($_SESSION['rule'] == 100){
        $e_type = "Удаление категории";
        logs($e_type); 
        }
    header('Location: /panel.php');
?>