<?php
$port = 1433;
$serverName = "aelp-db-01.database.windows.net," . $port;
$database = "bb_colombia";
$userName = "student";
$password = "Pa55w.rd";

try {
    $conn3 = new PDO("sqlsrv:server = $serverName,$port; Database = $database", $userName, $password);
    // set the PDO error mode to exception
    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully ";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
