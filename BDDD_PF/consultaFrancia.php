<?php
header('Access-Control-Allow-Origin: *');
include("conexiones/conexion_francia.php");

$sql1 = "select * from episodios1"; 

$query1 = $conn1 -> prepare($sql1); 
$query1 -> execute();  
$results = $query1 -> fetchAll(PDO::FETCH_OBJ); 

if($query1 -> rowCount() > 0)   { 
  echo "<table border='1px', padding='5px'>";
  echo "<tr>
    <td>ID</td>
    <td>Capitulo</td>
    <td>Temporada</td>
  </tr>";
  foreach($results as $result) { 
    echo "<tr>
      <td>" . $result->id . "</td>
      <td>" . $result->nombre . "</td>
      <td>" . $result->temporada . "</td>
    </tr>"; 
  }
  echo "</table>";
}
?>