<h1>Pagina de Devolucion de Monedas</h1>
<p>Si quiere intrdocucir otra canditad escriba: cantidad con la que paga "&precio=" precio del producto</p>
<?php
//Realiza un programa que le introduzca un valor de un producto
//con 2 decimales y posteriormente un valor con el que pagar por
//encima(Valor del producto 6.33 y ha pagado con 10).Muestra el
//número mínimo de monedas con las que puedes devolver el cambio.

$precio =(int)(6.33*100);
$pago=(int)(10*100);

if($_GET["pago"]!=null){
    $precio = (int)($_GET["precio"]*100);
// $precio= $precio+0;
$pago = (int)($_GET["pago"]*100);
// $pago = $pago + 0;
}

$contador=0;

$devolucion=$pago-$precio;


if($devolucion>=0){
    while($devolucion>=200){
        $contador++;        
        $devolucion-=200;
    }
    if($contador > 0){
        echo $contador ." Moneda 2 euros ";
        echo "<br>";
        $contador=0;
    }
    while($devolucion>=100){
        $contador++;        
        $devolucion-=100;
    }
    if($contador > 0){
        echo $contador ." Moneda 1 euro ";
        echo "<br>";
        $contador=0;
    }
    while($devolucion>=50){
        $contador++;        
        $devolucion-=50;
    }
    if($contador > 0){
        echo $contador ." Moneda 50 cent ";
        echo "<br>";
        $contador=0;
    }
    while($devolucion>=20){
        $contador++;        
        $devolucion-=20;
    }
    if($contador > 0){
        echo $contador ." Moneda 20 cent ";
        echo "<br>";
        $contador=0;
    }
    while($devolucion>=10){
        $contador++;        
        $devolucion-=10;
    } 
    if($contador > 0){
        echo $contador ." Moneda 10 cent ";
        echo "<br>";
        $contador=0;
    }   
    while($devolucion>=5){
        $contador++;        
        $devolucion-=5;
    }
    if($contador > 0){
        echo $contador ." Moneda 5 cent ";
        echo "<br>";
        $contador=0;
    }
    while($devolucion>=2){
        $contador++;        
        $devolucion-=2;
    }
    if($contador > 0){
        echo $contador ." Moneda 2 cent ";
        echo "<br>";
        $contador=0;
    }
    while($devolucion>=1){
        $contador++;        
        $devolucion-=1;
    }
    if($contador > 0){
        echo $contador ." Moneda 1 cent ";
        echo "<br>";
        $contador=0;
    }
}else{
    echo "Cantidad insuficiente";
}
echo "<br>";

?>
<br>
<a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>