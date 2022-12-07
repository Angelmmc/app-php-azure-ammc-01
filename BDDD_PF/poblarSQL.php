<?php 
include("conexiones/conexion_francia.php");
include("conexiones/conexion_alemania.php");
include("conexiones/conexion_colombia.php");

$sqlDel1 = "delete from frutas1"; 
$sqlDel2 = "delete from frutas2"; 
$sqlDel3 = "delete from frutas3"; 

$query1 = $conn1 -> prepare($sqlDel1); 
$query1 -> execute(); 

$query2 = $conn2 -> prepare($sqlDel2); 
$query2 -> execute(); 

$query3 = $conn3 -> prepare($sqlDel3); 
$query3 -> execute();

$curl_1 = curl_init('https://my-sites1-ammc.000webhostapp.com/BDDD_PF/getData.php');
$curl_2 = curl_init('https://631f96f958a1c0fe9f6c4d28.mockapi.io/fruta');
curl_setopt($curl_1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_2 , CURLOPT_RETURNTRANSFER, true);
   
$mh = curl_multi_init();
curl_multi_add_handle($mh, $curl_1);
curl_multi_add_handle($mh, $curl_2);
   
    $running = null;
    do {
      curl_multi_exec($mh, $running);
    } while ($running);
  
  curl_multi_remove_handle($mh, $curl_1);
  curl_multi_remove_handle($mh, $curl_2);
  curl_multi_close($mh);
   
  $result_1 = curl_multi_getcontent($curl_1);
  $result_2 = curl_multi_getcontent($curl_2 );

  $result_1 = json_decode(curl_multi_getcontent($curl_1));
  $result_2 = json_decode(curl_multi_getcontent($curl_2));


  $contador=1;

 foreach($result_2 as $index => $item_2){

  foreach($result_1 as $index => $item_1){

    if ($item_1->name == $item_2->fruta){

      $carbohydrates = $item_1->nutritions->carbohydrates;
      $protein = $item_1->nutritions->protein;
      $fat = $item_1->nutritions->fat;
      $calories = $item_1->nutritions->calories;
      $sugar = $item_1->nutritions->sugar;

      switch ($contador) {
        case 1:
            $sqlIns1 = "insert into frutas1 values ('".$item_1->name."','".$item_1->genus."','".$item_1->family."','".$item_1->order."',
            $carbohydrates,$protein,$fat,$calories,$sugar)";

            $query4 = $conn1 -> prepare($sqlIns1); 
            $query4-> execute(); 
            $contador++;
          break;
    
          case 2:
            $sqlIns2 = "insert into frutas2 values ('".$item_1->name."','".$item_1->genus."','".$item_1->family."','".$item_1->order."',
            $carbohydrates,$protein,$fat,$calories,$sugar)";

            $query4 = $conn2 -> prepare($sqlIns2); 
            $query4-> execute(); 
            $contador++; 
          break;
    
          case 3:
            $sqlIns3 = "insert into frutas3 values ('".$item_1->name."','".$item_1->genus."','".$item_1->family."','".$item_1->order."',
            $carbohydrates,$protein,$fat,$calories,$sugar)";

            $query4 = $conn3 -> prepare($sqlIns3); 
            $query4-> execute();
            $contador = 1; 
          break;
        
        default:
    
          break; 
      
       }
    }
  }
}

echo "<br>La insercion cruzada de datos fue exitosa";
echo " <ul style='text-decoration: none; margin: 0; padding: 0; list-style-type: none;'>
<li><a href='index.php'>Volver</a></li>
</ul>";

$conn1 = null;
$conn2 = null;
$conn3 = null;

?>
