<?php 
include("conexiones/conexion_francia.php");
include("conexiones/conexion_alemania.php");
include("conexiones/conexion_colombia.php");

$sqlDel1 = "delete from episodios1"; 
$sqlDel2 = "delete from episodios2"; 
$sqlDel3 = "delete from episodios3"; 

$query1 = $conn1 -> prepare($sqlDel1); 
$query1 -> execute(); 

$query2 = $conn2 -> prepare($sqlDel2); 
$query2 -> execute(); 

$query3 = $conn3 -> prepare($sqlDel3); 
$query3 -> execute();

$curl = curl_init();

  $url = "https://631f96f958a1c0fe9f6c4d28.mockapi.io/bb_episodios";

  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($curl); 
  
  curl_close($curl);

  $result = json_decode(curl_exec($curl));

 foreach($result as $index => $item){
  $index . ": ".$item->temporada . "<br>";

  switch ($item->temporada) {
    case 1:
        $sqlIns1 = "insert into episodios1 values ('".$item->nombre."',1)";
        $query4 = $conn1 -> prepare($sqlIns1); 
        $query4-> execute(); 
      break;

      case 2:
        $sqlIns2 = "insert into episodios2 values ('".$item->nombre."',2)";
        $query4 = $conn2 -> prepare($sqlIns2); 
        $query4-> execute(); 
      break;

      case 3:
        $sqlIns3 = "insert into episodios3 values ('".$item->nombre."',3)";
        $query4 = $conn3 -> prepare($sqlIns3); 
        $query4-> execute(); 
      break;
    
    default:

      break;
  }
}

echo "<br>Los datos de MockApi fueron insertados exitosamente";
echo " <ul style='text-decoration: none; margin: 0; padding: 0; list-style-type: none;'>
<li><a href='https://my-sites1-ammc.000webhostapp.com/BDDD_PF/'>Volver</a></li>
</ul>";

$conn1 = null;
$conn2 = null;
$conn3 = null;

?>
