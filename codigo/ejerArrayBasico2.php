<?php
//declaracion del array
$datos=array(2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3);

//sacar las claves que contengan el valor 3
$clave = array_search(3,$datos);
echo $clave;
foreach ($datos as $key => $value) {
    
}

?>
<br>
<a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>