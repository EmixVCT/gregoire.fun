<?php 
//Config file

$sql_details = array(
    "type" => "Mysql",     // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
    "user" => "root",          // Database user name
    "pass" => "",          // Database password
    "host" => "127.0.0.1", // Database host
    "port" => "3306",          // Database connection port (can be left empty for default)
    "db"   => "gregoirefun",          // Database name
    "dsn"  => "charset=utf8mb4",          // PHP DSN extra information. Set as `charset=utf8mb4` if you are using MySQL
    "pdoAttr" => array()   // PHP PDO attributes array. See the PHP documentation for all options
);

?>