<?php
//declaracion del array
$datos=array(2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3);

//Con asort ordeno datos
echo "<p>Ordenando Array</p>";
asort($datos);
foreach ($datos as $key => $value) {
    echo $value;
}

//Quitar valores duplicados
echo "<p>Quitando duplicados</p>";
$sinduplicados = array_unique($datos);
foreach ($sinduplicados as $key => $value) {
    echo $value;
}
?>
<br>
<a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>