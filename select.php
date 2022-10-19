<?php
include_once ('connect.php');

    $sql = 'SELECT id, firstname, lastname, email, reg_date FROM MyGuests ORDER BY lastname';

    foreach ($conn->query($sql) as $row) {
        echo $row['id'] . " | ";
        echo $row['firstname'] . " | ";
        echo $row['lastname'] . " | ";
        echo $row['email'] . " | ";
        echo $row['reg_date'] . "<br>";
    }

    // use exec() because no results are returned
    $conn->exec($sql);

$conn = null;
