<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>
    <h1>Ejercicio 2</h1>

    <!-- Enlace que accede a otra pagina php que muestra/imprime el codigo de la misma -->
    <!-- Incluir en todos los .php -->
    <a target="_blank" id="idVerCodigo" title="Vér el código PHP" href="../codigoPHP.php?paginaPHP=<?
        $pagina = "ej1/" . basename($_SERVER['SCRIPT_FILENAME']);
        echo $pagina;?>"
    >
        <img src="../../img/icono_ver_codigo.png" width="35px" height="35px"></img>
    </a>


    <!-- PHP -->
    <?php

        // Se importa el fichero que contiene las funciones
        require_once("./funciones_ej2.php");

        echo "<h2>Haz una función que genere números aleatorios que se le pase como parámetros:</h2>";

        // a)
        echo "<h3>a) Array para que lo rellene con los números</h3>";

        // b)
        echo "<h3>b) Número mínimo incluido</h3>";

        // c)
        echo "<h3>c) Número máximo incluido</h3>";

        // d)
        echo "<h3>d) Número de números generados</h3>";

        // e)
        echo "<h3>e) True si puede repetirse / False si no puede repetirse</h3>";

 
        // Creo el array vacío
        $arrayNumeros = array();

        // Creo los parámetros que se le van a pasar a la función
        $numMin = 2;
        $numMax = 13;
        $numValores = 8;
        $repetirse = true;

        // Llamo a la función que me devolverá un array rellenado aleatoriamente
            // en función de los parámetros pasados
        $arrayAleatorio = generaAleatorioArray($arrayNumeros,$numMin,$numMax,$numValores,$repetirse);

        // Imprimo el array
        echo "<pre>";
        print_r($arrayAleatorio);
        echo "</pre>";
    ?>

    <!-- Footer informativo -->
    <footer>&copy Ismael Maestre</footer>

</body>
</html>