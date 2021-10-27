<?php
//Pinta un br
function br(){
    echo "<br>";
}
//Funcion que escribe en h1 la cadena que se le pasa
function h1($cadena){
    echo "<h1>".$cadena."</h1>";
}
//Pinta la cadena entre cadenas
function p($cadena){
    echo "<p>".$cadena."</p>";
}
function letraDni($numeroDni){
    $compruevaLetra=array("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");
    $numeroDni=$numeroDni%23;
    echo $compruevaLetra[$numeroDni];
}
function self(){
    echo $_SERVER['PHP_SELF'];
}
?>