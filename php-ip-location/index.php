<?php

/* Al utilizar $_SERVER['REMOTE_ADDR'] se esta requiriendo la direccion del servidor privado generado por xampp 
es por ello que tenemos que usar una ip publica la cual le permita a geoplugin acceder a su informacion */

echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));

?> 