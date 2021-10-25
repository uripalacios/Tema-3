<?php
//funcion basica sin parametros ni return
function saludo(){
    echo "Hola";
    echo "<br>";
}
//funcion pasandole parametro
function saludoNombre($nombre){
    echo "Hola ".$nombre;
    echo "<br>";
}
//predefinida
function precio_iva($precio,$iva=0.21){
    echo "El precio con iva es: ".$precio*(1+$iva);
    echo "<br>";
}
//
function precio_iva_return($precio,$iva=0.21){
    return $precio*(1+$iva);
    echo "<br>";
}
//Cambiar el valor de una funcion por referencia
function precio_a_precioiva(&$precio,$iva=0.21){
    $precio= $precio*(1+$iva);
    echo "<br>";
}
//añade un valor a un array con su index
function añade(&$array){
    $index = count($array);
    $array[$index]= $index;
}
//funcion agranda un lado del objeto
function agrandar($obj){
    $obj->lado++;
}
?>
