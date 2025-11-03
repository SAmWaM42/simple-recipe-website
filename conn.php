<?php

require_once('load_env.php');

var_dump($_ENV);
function connect()
{
    $host = $_ENV['HOST'];
    $host_name =$_ENV['HOSTNAME'];
    $server_login=$_ENV["PASS"];
    $database_login =$_ENV["DATABASE"] ;
    $conn = new mysqli($host, $host_name, $server_login, $database_login);
    if(!$conn)
    {
        echo "no connection";
    }

    return $conn;
}
