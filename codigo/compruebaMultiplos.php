<h1>Comprueba multiplos</h1>
<?php
//Escriba un programa que pida un año y que escriba si es bisiesto o no.
//Los años bisietos son múltiplos de 4, pero los multiplos de 100
//no lo son,aunque los múltiplo de 400 sí. 
$anio=(int)$_GET["ejemplo"];
echo $anio;
echo "<br>";
if(($anio%4) == 0){
    if(($anio%100) == 0){
        if(($anio%400) == 0){
            echo "Año bisiesto";
        }else{
            echo "Año no bisiesto";
        }
    }echo "Año bisiesto";
}else{
    echo "Año no bisiesto";
}
?>
<br>
<a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>