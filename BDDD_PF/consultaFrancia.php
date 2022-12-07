<?php
header('Access-Control-Allow-Origin: *');
include("conexiones/conexion_francia.php");
echo "<center> <h3>Base de datos Francia</h3>";

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
      <td>" . round($result->carbohidratos, 3) . "</td>
      <td>" . round($result->proteinas, 3) . "</td>
      <td>" . round($result->grasas, 3) . "</td>
      <td>" . round($result->calorias, 3) . "</td>
      <td>" . round($result->azucar,3 ) . "</td>
    </tr>"; 
  }
  echo "</table> </center>";
}
?>
