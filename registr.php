<?php 
if(trim($_POST['login'] !== '') && trim($_POST['password'] !== '')) { 
    require "Database.php";

    if($_POST["login"] === 'admin') { 
      $group = 100;
    }
    else {
       $group = 1;
    }

    $Database = new Database();
    $qry = "INSERT INTO `users` (`user_name`, `user_login`, `user_password`, `id_group` ) VALUES (:name, :login, :password, $group )"; 
    $parm = array(
      ':name' => trim($_POST['name']),
      ':login' => trim($_POST['login']), 
      ':password' => trim($_POST['password']),
  );
    $Database->insertData($qry,$parm);
    
    require 'logs.php';
    $_SESSION['user'] = $_POST['login'];
    if($_SESSION['rule'] == 100){
      $e_type = "Регистрация";
      logs($e_type); 
      }   
     header('Location: ../');

} 
?>