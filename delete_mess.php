<?php 
    require "Database.php";
    
    $Database = new Database();
    $qry = "DELETE FROM comments WHERE id_comments = :id";
    $parm = array(
        ":id"=>$_GET["id_comments"]);
    $Database->set($qry,$parm);
    require 'logs.php';
 
    if($_SESSION['rule'] == 100){
        $e_type = "Удаление сообщения";
        logs($e_type); 
        }
    header('Location: /panel.php');
?>