<?php
require_once('./db_info.php');
require_once('./PdoConnection.php');

$result = [];
try {
    $db1_con = new PdoConnection(_SERVER01_DB_NAME_, _SERVER01_DB_ID_, _SERVER01_DB_PW_, _SERVER01_DB_IP_, _SERVER01_DB_PORT_);
    $query = " sample query ";
    $params = [
        "key1" => "value1",
        "key2" => "value2"
    ];

    $result = $db1_con->run($query, $params);
} catch( PDOException $pe) {
    // 예외 처리
}

return $result;