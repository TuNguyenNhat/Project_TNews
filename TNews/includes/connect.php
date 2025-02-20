<?php

    $ip_server = 'localhost';
    $u_name = 'root';
    $pass = '';
    $db_name = 'user_manage';

    $connect = new mysqli($ip_server, $u_name, $pass, $db_name);
    if($connect->connect_error)
    {
        die('Ket noi that bai');
    }

?>