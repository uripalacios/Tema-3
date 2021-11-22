<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Formulario</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>
    <h1>Datos del Formulario</h1>

    <!-- Enlace que accede a otra pagina php que muestra/imprime el codigo de la misma -->
    <!-- Incluir en todos los .php -->
    <a target="_blank" id="idVerCodigo" title="Vér el código PHP" href="codigoPHP.php?paginaPHP=<?
        $pagina = basename($_SERVER['SCRIPT_FILENAME']);
        echo $pagina;?>"
    >
        <img src="../img/icono_ver_codigo.png" alt="suu" width="35px" height="35px"></img>
    </a>

    <!-- PHP -->
    <?php

        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";

        // Se importa el fichero que contiene las funciones
        require_once("./funcionesValidarForm.php");

        
        // Se validan los datos del formulario
        // Si se ha rellenado correctamente...
        if(validaFormulario())
        {
            // Función que muestra los datos del formulario 

            // NO FUNCIONA
            muestraDatosFormulario();
        }
        // Si no...
        else
        {
            echo "<b>ERROR AL RECIBIR EL FORMULARIO</b>";
        }

    ?>

    <!-- Footer informativo -->
    <footer>&copy Ismael Maestre</footer>

</body>
</html>
