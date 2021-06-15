<?php
class PdoConnection extends PDO {
    var $dbname;

    public function __construct($dbname, $user, $pw, $host, $port='3306')
    {
        $this->dbname = $dbname;

        try {
            parent::__construct("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pw , [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_TIMEOUT => 30000000,
            ]);
        } catch (PDOException $pe) {
            $logPath = "./". date('Y-m-d'). ".log";
            error_log("[$dbname] [$host] [$port] [$user] message: ".$pe->getMessage(), 3, $logPath);
            throw $pe;
        }
    }

    public function run($query, $params = [])
    {
        // ... 
    }

    public function get_last_insert_id()
    {
        // ...
    }
    
    // ...
}