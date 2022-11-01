<?php
include ('connect.php');

$metodo = $_SERVER["REQUEST_METHOD"];
switch($metodo){
  case "GET";
      $codPais = $_GET['countrycode'];
      
  break;
  case "POST";
      $codPais = $_POST['countrycode'];
  break;
  }
  
$sql = "select world.country.name 'Pais', continent 'Continente', region 'Region',world.city.name 'Capital', code, code2 from [world].[country]
inner join world.city on world.country.capital=world.city.id
where code2='".$codPais."'"; 
$query = $conn -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
  echo "<table border='1px', padding='5px'>";
  echo "<tr>
    <td>Pais</td>
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
