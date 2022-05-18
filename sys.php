<?php
    function saveAuth($id,$Database) {
        $_SESSION["id"] = $id;
        $qry = "SELECT id_user, user_login, id_group, user_name FROM users  WHERE id_user = :id";
        $parm = array(
            "id" => $id
        );
            
        $user = $Database->getRow($qry,$parm);
        $_SESSION["rule"] = $user["id_group"];
        $_SESSION["login"] = $user["user_login"];
        $_SESSION["user"] = $user["user_name"];
        $_SESSION["id_user"] = $user["id_user"];
        
    } 
?>
