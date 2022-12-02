<?php
$port = 1433;
$serverName = "tcp:ammc-db-01.database.windows.net," . $port;
$database = "bb_alemania";
$userName = "Student";
$password = "Pa55w.rd";

try {
    $conn2 = new PDO("sqlsrv:server = $serverName,$port; Database = $database", $userName, $password);
    // set the PDO error mode to exception
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully ";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
