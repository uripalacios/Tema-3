<?php
$arrayvacio = array();
var_dump($arrayvacio);
//array vacio
echo "<br>";
$array10 = array(10);
var_dump($array10);
echo "<br>";
//nos pone el array con el valor 10, pero no un array de 10 posiciones
$notas = array(8,9,6,"diez",7,4);
echo "<pre>";
var_dump($notas);
//pone tipo de datos
print_r($notas);
//lo hace mas visible pero no muestra tipo de datos
echo "</pre>";

//recorrer array
for($i=0; $i <count($notas) ; $i++){
    # code..
    echo "<p>".$notas[$i]."</p>";
}

//modificacion del array
$notas[10] = "MH";
echo "<pre>";
print_r($notas);
echo "</pre>";

//Para poder recorrerlo con posiciones vacias
foreach ($notas as $value) {
    # code...
    echo "<p>".$value."</p>";
}

//ver si existe algo en el array
if(isset($notas[6])){
    echo "existe";
}else{
    echo "no existe";
}

//borrar valores
unset($notas[0]);
foreach ($notas as $value) {
    # code...
    echo "<p>".$value."</p>";
}


?>
<br>
<a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>