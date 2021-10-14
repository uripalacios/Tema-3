<?php
//Realiza un programa que le introduzca un valor de un producto
//con 2 decimales y posteriormente un valor con el que pagar por
//encima(Valor del producto 6.33 y ha pagado con 10).Muestra el
//número mínimo de monedas con las que puedes devolver el cambio.


$precio = 6.33;

$pago = 10;
// $pago = $_GET("pago");
$contador=0;

$devolucion=$pago-$precio;


if($devolucion>=0){
    if($devolucion>0){
        while($devolucion>=2){
            $contador++;
            echo "Moneda 2 euros ";
            echo "<br>";
            $devolucion-=2;
        }
        while($devolucion>=1){
            $contador++;
            echo "Moneda 1 euro ";
            echo "<br>";
            $devolucion-=1;
        }
        while($devolucion>=0.5){
            $contador++;
            echo "Moneda 50 cent ";
            echo "<br>";
            $devolucion-=0.50;
        }
        while($devolucion>=0.2){
            $contador++;
            echo "Moneda 20 cent ";
            echo "<br>";
            $devolucion-=0.20;
        }
        while($devolucion>=0.1){
            $contador++;
            echo "Moneda 10 cent ";
            echo "<br>";
            $devolucion-=0.10;
        }
        while($devolucion>=0.1){
            $contador++;
            echo "Moneda 10 cent ";
            echo "<br>";
            $devolucion-=0.10;
        }
        while($devolucion>=0.05){
            $contador++;
            echo "Moneda 5 cent ";
            echo "<br>";
            $devolucion-=0.05;
        }
        while($devolucion>=0.02){
            $contador++;
            echo "Moneda 2 cent ";
            echo "<br>";
            $devolucion-=0.02;
        }
        while($devolucion>=0.01){
            $contador++;
            echo "Moneda 1 cent ";
            echo "<br>";
            $devolucion-=0.01;
        }
    }
}else{
    echo "Cantidad insuficiente";
}
echo "<br>";
echo $contador;

?>
<br>
<a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>