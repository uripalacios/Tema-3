<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3</title>
</head>
<body>
    <header>
        <h1>Tema 3</h1>
    </header>
    <main>
        <?php
            require_once("./funciones.php");
            //Llamar a la funcion
            saludo();
            saludoNombre("uriel");
            //funcion parametro predefinido
            precio_iva(10,0.04);
            //
            precio_iva_return(10);
            //
            echo "Precio por referencia";
            $precio=10;
            precio_a_precioiva($precio);
            echo $precio;

            $array = array();
            añade($array);
            añade($array);
            añade($array);
            añade($array);
            añade($array);
            echo "<pre>";
            print_r ($array);
            echo "</pre>";

            //objetos pasan directamente por referencia
            class Figura{
                public $lado = 5;
            }

            $miFigura = new Figura();
            echo "El lado es: ".$miFigura->lado;
            echo "<br>";
            agrandar($miFigura);
            echo "El lado es: ".$miFigura->lado;
        ?>
    </main>
    <br>
    <a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>
    <footer>&copy urielpalacios</footer> 

</body>
</html>