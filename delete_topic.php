<?php 
    require "sys.php";
    require "Database.php";
    
    $Database = new Database();
    $qry = "DELETE FROM topic WHERE id_topic = :id";
    $parm = array(
        ":id"=>$_GET["id_topic"]);
    $Database->set($qry,$parm);
    require 'logs.php';

    if($_SESSION['rule'] == 100){
        $e_type = "Удаление новости";
        logs($e_type); 
        }
    header('Location: /panel.php');
?>