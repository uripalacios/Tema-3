<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lee/Edita XML</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>

    <h1>Lee y edita el Fichero XML</h1>

    <!-- Enlace que accede a otra pagina php que muestra/imprime el codigo de la misma -->
    <!-- Incluir en todos los .php -->
    <a target="_blank" id="idVerCodigo" title="Vér el código PHP" href="codigoPHP.php?paginaPHP=<?php
        $pagina = basename($_SERVER['SCRIPT_FILENAME']);
        echo $pagina;?>"
    >
        <img src="../img/icono_ver_codigo.png" alt="suu" width="35px" height="35px"></img>
    </a>

    <!-- PHP -->
    <?php

        // Se importa el fichero que contiene las funciones
        require_once("./funciones.php");

        // Fichero que contiene las notas
        $rutaFichero = $_REQUEST["nombreFichero"];

        // Si no existe el fichero...
        if(!existeFichero($rutaFichero))
        {
            imprimeError("El fichero adjuntado no existe.");
        }
        // En caso contrario...
        else
        {

            // Se muestra la tabla con las notas de cada Alumno
            muestraTabla();
        }


    ?>
    
    <footer>&copy Ismael Maestre</footer>

</body>
</html>