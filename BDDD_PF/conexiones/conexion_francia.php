<?php
$port = 1433;
$serverName = "jvg-dp-01.database.windows.net," . $port;
$database = "pb_francia";
$userName = "Student";
$password = "Pa55w.rd";

try {
    $conn1 = new PDO("sqlsrv:server = $serverName,$port; Database = $database", $userName, $password);
    // set the PDO error mode to exception
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully ";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
