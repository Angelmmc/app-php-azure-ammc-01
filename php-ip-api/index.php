<?php
$curl = curl_init();

$var = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
echo "La ip del cliente es: ".$var['geoplugin_request'];

  $url = "https://backendapp-ammc-01.azurewebsites.net/php-ip-api/select.php/?countrycode=" . $varixd['geoplugin_countryCode'];


  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($curl); 
  echo $result;
  
  curl_close($curl);

  ?>
