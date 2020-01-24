<?php
    $connectionInfo = array(
        "UID" => $config['UID'],
        "pwd" => $config['pwd'],
        "Database" => $config['Database'],
        "LoginTimeout" => 30,
        "Encrypt" => 1,
        "TrustServerCertificate" => 0
    );
    $serverName = $config['serverName'];
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if(!$conn)
    {
        die('Connection Problem ' . sqlsrv_errors());
    }