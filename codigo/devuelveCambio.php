<?php
//Realiza un programa que le introduzca un valor de un producto
//con 2 decimales y posteriormente un valor con el que pagar por
//encima(Valor del producto 6.33 y ha pagado con 10).Muestra el
//número mínimo de monedas con las que puedes devolver el cambio.


$precio = (int)($_GET["precio"]*100);
// $precio= $precio+0;


$pago = (int)($_GET["pago"]*100);
// $pago = $pago + 0;
$contador=0;

$devolucion=$pago-$precio;


if($devolucion>=0){
    while($devolucion>=200){
        $contador++;
        echo "Moneda 2 euros ";
        echo "<br>";
        $devolucion-=200;
    }
    while($devolucion>=100){
        $contador++;
        echo "Moneda 1 euro ";
        echo "<br>";
        $devolucion-=100;
    }
    while($devolucion>=50){
        $contador++;
        echo "Moneda 50 cent ";
        echo "<br>";
        $devolucion-=50;
    }
    while($devolucion>=20){
        $contador++;
        echo "Moneda 20 cent ";
        echo "<br>";
        $devolucion-=20;
    }
    while($devolucion>=10){
        $contador++;
        echo "Moneda 10 cent ";
        echo "<br>";
        $devolucion-=10;
    }    
    while($devolucion>=5){
        $contador++;
        echo "Moneda 5 cent ";
        echo "<br>";
        $devolucion-=5;
    }
    while($devolucion>=2){
        $contador++;
        echo "Moneda 2 cent ";
        echo "<br>";
        $devolucion-=2;
    }
    while($devolucion>=1){
        $contador++;
        echo "Moneda 1 cent ";
        echo "<br>";
        $devolucion-=1;
    }
}else{
    echo "Cantidad insuficiente";
}
echo "<br>";
echo $contador;

?>
<br>
<a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>