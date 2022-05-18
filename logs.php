<?php
require_once 'Database.php';
    function logs($e_type) {
        $Database1 = new Database();
        $qry = "INSERT INTO logs (id_user, e_id, e_type, datetime_logs, ip_user, agent_user) VALUES (:id_user, :e_id, :e_type, :datetime_logs, :ip_user, :agent_user)";
        $parm = array(
            "id_user"=>$_SESSION["id_user"],
            "e_id"=> http_response_code(),
            "e_type"=> $e_type,
            "datetime_logs"=>date("Y-m-d H:i:s"),
            "ip_user"=> $_SERVER["REMOTE_ADDR"],
            "agent_user"=> $_SERVER["HTTP_USER_AGENT"]
        );

        $Database1->InsertData($qry, $parm);
        } 
?>