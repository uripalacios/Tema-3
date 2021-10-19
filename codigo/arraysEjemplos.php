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

//arrays con clave valor
$notasAso = array(
    "David" =>8,
    "Ismael" =>9,
    "Uriel" =>6,
    "Ivan" =>10,
    "Aaron" =>7,
    "Hector" =>4);

echo "<pre>";
print_r($notasAso);
echo "</pre>";

//cambiar un valor de forma permanente a todo el array
foreach ($notasAso as $key => $value) {
    $notasAso[$key]++;
}
//visualizar
echo "<pre> Despues de incrementar";
print_r($notasAso);
echo "</pre>";

//Multidimensionales    [][]
echo "<h2>MULTIDIMENSIONALES</h2>";
$tabla = array();
for ($i=0; $i <=10 ; $i++) { 
    $tabla[$i]=array();
    for ($j=0; $j <=10 ; $j++) { 
        $tabla[$i][$j]=$i*$j;
    }
}
echo "<pre> tabla";
print_r($tabla);
echo "</pre>";

//Otro ejemplo de array
$ciclos = array(
    "DAW" => array("PR" =>"Programación",
        "BD" =>"Bases de Datos",
        "DWES" =>"Desarrollo web en entorno servidor"),
    "DAM" => array("PR" =>"Programación",
        "BD" =>"Bases de Datos",
        "PMDM" =>"Programación multimedia y de dispositivos móviles")  
);
//visualizacion 
foreach ($ciclos as $key1 => $value1) {
    echo"<p>".$key1."</p>";
    foreach ($value1 as $key2 => $value2) {
        echo"<p>".$key2.":".$value2."</p>";
    }
}
//recorrer el array $ciclos
echo "<h1>Funciones para recorrer</h1>";
$ciclos = array(
    "DAW" => array("PR" =>"Programación",
        "BD" =>"Bases de Datos",
        "DWES" =>"Desarrollo web en entorno servidor"),
    "DAM" => array("PR" =>"Programación",
        "BD" =>"Bases de Datos",
        "PMDM" =>"Programación multimedia y de dispositivos móviles"),
    "ASIR" => array("ASO" =>"Sistemas Operativos",
        "BD" =>"Bases de Datos",
        "PLAR" =>"Redes")
);
echo"current<br>";
print_r(current($ciclos));
echo "<br>next<br>";
print_r(next($ciclos));
echo"<br>current<br>";
echo"<pre>";
print_r(current($ciclos));
echo"</pre>";

while ($ciclo = each($ciclos)) {
    echo"<pre>";
    echo "El ciclo es: ".$ciclo['key']." y las asignaturas son: ";
    print_r($ciclo['value']);
    echo"</pre>";
}
//no funciona porque ya estaba en la ultima posicion tra recorrerlo con each
echo"<pre>";
print_r(current($ciclos));
echo"</pre>";
//reiniciar el array
echo "<p>Array reiniciado</p>";
reset($ciclos);
while ($ciclo = each($ciclos)) {
    echo"<pre>";
    echo "El ciclo es: ".$ciclo['key']." y las asignaturas son: ";
    print_r($ciclo['value']);
    echo"</pre>";
}
?>
<br>
<a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>