<?php
header('Access-Control-Allow-Origin: *');
include("conexiones/conexion_francia.php");

$sql = "select * from frutas1"; 

$query1 = $conn1 -> prepare($sql); 
$query1 -> execute();  
$results = $query1 -> fetchAll(PDO::FETCH_OBJ); 

if($query1 -> rowCount() > 0)   { 
  echo "<table border='1px', padding='5px'>";
  echo "<tr>
    <td>ID</td>
    <td>Nombre</td>
    <td>Genero</td>
    <td>Familia</td>
    <td>Orden</td>
    <td>Carbohidratos (100g)</td>
    <td>Proteinas (100g)</td>
    <td>Grasas (100g)</td>
    <td>Calorias (100g)</td>
    <td>Azucar (100g)</td>
  </tr>";
  foreach($results as $result) { 
    echo "<tr>
      <td>" . $result->id . "</td>
      <td>" . $result->nombre . "</td>
      <td>" . $result->genero . "</td>
      <td>" . $result->familia . "</td>
      <td>" . $result->orden . "</td>
      <td>" . $result->carbohidratos . "</td>
      <td>" . $result->proteinas . "</td>
      <td>" . $result->grasas . "</td>
      <td>" . $result->calorias . "</td>
      <td>" . $result->azucar . "</td>
    </tr>"; 
  }
  echo "</table>";
}
?>
