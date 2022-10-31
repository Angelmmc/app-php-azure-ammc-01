<?php
include ('connect.php');

$code = 'ES';
  
$sql = "select world.country.name 'Pais', continent 'Continente', region 'Region',world.city.name 'Capital', code, code2 from [world].[country]
inner join world.city on world.country.capital=world.city.id
where code2='".$code."'"; 
$query = $conn -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
  echo "<table border='1px', padding='5px'>";
  echo "<tr>
    <td>País</td>
    <td>Capital</td>
    <td>Continente</td>
    <td>Region</td>
    <td>Code</td>
    <td>Code 2</td>
  </tr>";
  foreach($results as $result) { 
    echo "<tr>
      <td>" . $result->Pais . "</td>
      <td>" . $result->Capital . "</td>
      <td>" . $result->Continente . "</td>
      <td>" . $result->Region . "</td>
      <td>" . $result->code . "</td>
      <td>" . $result->code2 . "</td>
    </tr>";
  }
  echo "</table>";
}
?>
