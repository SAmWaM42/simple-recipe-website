<?php

function connect()
{
    $host = "localhost";
    $host_name = "root";
    $server_login = "424635";
    $database_login = "app";
    $conn = new mysqli($host, $host_name, $server_login, $database_login);
    if(!$conn)
    {
        echo "no connection";
    }

    return $conn;
}