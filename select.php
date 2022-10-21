<?php
include_once ('connect.php');

    $sql = 'SELECT code, name, continent, region FROM [world].[country] ORDER BY name';

    foreach ($conn->query($sql) as $row) {
        echo $row['code'] . " | ";
        echo $row['name'] . " | ";
        echo $row['continent'] . " | ";
        echo $row['region'] . " | ";
    }

    // use exec() because no results are returned
    $conn->exec($sql);

$conn = null;
