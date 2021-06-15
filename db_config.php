<?php
define('_DB_NAME_ONE_', 'db1');
define('_DB_NAME_TWO_', 'db2');
define('_DB_NAME_THREE_', 'db3');
define('_DB_NAME_CUSTOM_', 'custom');

$userid = isset($userid) ? $userid : '';

// 환경에 따라 DB 커넥션 구성 파일을 가져와서 연결 정보를 구성한다.
function get_db_config($server) {
    global $userid;

    $file = "./env.json";
    $log_path = "./". date('Y-m-d'). ".log";

    try {
        if(!$db_con_infos = json_decode(file_get_contents($file))) {
            throw new Exception("Unable to open db connection file : " . $file . ".");
        }
    } catch (Exception $e) {
        error_log("[$userid] [$server] [".$_SERVER['HTTP_HOST']."] [] [] message: ". $e->getMessage(), 3, $log_path);
        // 실패 처리
        fail_exception_process();
    }
    $conn = $db_con_infos->$server;

    $host = isset($conn->host) ? $conn->host : '';
    $port = isset($conn->port) ? $conn->port : '';
    $dbname = isset($conn->dbname) ? $conn->dbname : '';
    if($server == _DB_NAME_CUSTOM_ && $dbname == '') {
        $dbname = $userid;
    }

    $username = isset($conn->username) ? $conn->username : '';
    $password = isset($conn->password) ? $conn->password : '';

    return array(
        $host, 
        $port,
        $dbname,
        $username,
        $password
    );
}

// 실패 익셉션일 때 처리
function fail_exception_process() {
    if (check_ajax_call()) {
        echo json_encode(['result' => 'fail']);
    } else {
        header("Location: http://".$_SERVER['HTTP_HOST']."/error_page.html");
    }
    exit();
}

// ajax 요청인지 검사
function check_ajax_call() {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}