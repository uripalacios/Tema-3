<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>
    <h1>Ejercicio 1</h1>

    <!-- Enlace que accede a otra pagina php que muestra/imprime el codigo de la misma -->
    <!-- Incluir en todos los .php -->
    <a target="_blank" id="idVerCodigo" title="Vér el código PHP" href="../codigoPHP.php?paginaPHP=<?
        $pagina = "ej1/" . basename($_SERVER['SCRIPT_FILENAME']);
        echo $pagina;?>"
    >
        <img src="../../img/icono_ver_codigo.png" alt="suu" width="35px" height="35px"></img>
    </a>

    <!-- PHP -->
    <?php

        // Se importa el fichero que contiene las funciones
        require_once("./funciones_ej1.php");

        echo '<h2>Crea tu propio fichero de php que tenga las funciones de:</h2>';
        
        // a)
        echo "<h3>a) br() Pinta un br</h3>";

        echo "Antes del salto de línea.";
        br();
        echo "Despues del salto de línea.";
        
        // b) 
        echo "<h3>b) h1( cadena ) Pinta la cadena entre dos h1</h3>";

        h1("Cadena pintada entre dos h1");

        // c) 
        echo "<h3>c) p(cadena) Pinta la cadena entre <p></h3>";

        p("Cadena 1");
        p("Cadena 2");

        // d) 
        echo "<h3>d) funcion_self() Devuelve el fichero actual</h3>";

        echo "El fichero actual es: " . funcion_self();

        // e) 
        echo "<h3>e) dni(numeroDNI) Se introduce el DNI y devuelve la letra que le corresponde</h3>";

        $numeroDNI = 71212725;

        echo "La letra correspondiente al DNI <i>" . $numeroDNI . "</i> es: <b>" . dni($numeroDNI) . "</b>";

    ?>

    <!-- Footer informativo -->
    <footer>&copy Ismael Maestre</footer>

</body>
</html>
