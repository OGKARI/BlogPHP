<?php
        require 'Database.php';
        require 'logs.php';
        require "sys.php";

        if(isset($_POST["login"]) && isset($_POST["password"])) {
            $Database = new Database();
            $qry = "SELECT * FROM users WHERE user_login = :login AND BINARY user_password = :password";
            $parm = (array(
                "login" => $_POST["login"],
                "password" => $_POST["password"]
            ));
            $user = $Database->getRow($qry,$parm);
       
            saveAuth($user["id_user"],$Database);
            if($_SESSION['rule'] == 100){
                $e_type = "Вход";
                logs($e_type); 
            }
            header('Location: ../'); 
        }
        else {
            echo "<p>Вход не выполнен</p>";
        }
    ?>