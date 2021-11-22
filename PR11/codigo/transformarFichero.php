<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transforma CSV a XML</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>

    <h1>Transformación del fichero <i>notas.csv</i> al fichero <i>notas.xml</i></h1>

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

        // En funcion del botón que se haya pulsado...
        // Si se ha pulsado algun boton (hecho submit del form)
        if(sizeof($_REQUEST) > 0)
        {

            // Hay que corregir la segunda parte del 
            if((isset($_REQUEST["boton"])))
            {
                // Si se pulsa el botón 'Transformar'...
                if($_REQUEST['boton'] == "Transformar")
                {
                    // Invoco a la funcion que me transforma el fichero
                    // Fichero que contiene las notas
                    $rutaFichero = "../ficheros/notas.csv";

                    // Si no existe el fichero...
                    if(!existeFichero($rutaFichero))
                    {
                        imprimeError("El fichero adjuntado no existe.");
                    }
                    // En caso contrario...
                    else
                    {
                        // Se transforma el ficher de csv a xml
                        transformaFichero();
                    }

                    // Abro la página de leer y le paso el nombre del fichero
                    header("Location: leeFicheroXML.php?nombreFichero=" . $_REQUEST["inputNombreFichero"]);
                }

            }

        }

    ?>

    <!-- Formulario -->
    <!-- Formulario por POST -->
    <!-- Le indico en el action que me redirija a este mismo fichero para validarlo -->
    <!-- enctype="multipart/form-data" para permitir que se puedan cargar archivos -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="formulario" id="idFormulario">

        <!-- Nombre Del fichero - Alfabetico -->
        <p>
            <b>Tras pulsar el botón, se transformará el fichero notas.csv a un fichero XML <i>(notas.xml)</i></b>
        </p>

        <!-- Input oculto que llevará el nombre del fichero a la página de LeeFicheroXML.php -->
        <input type="hidden" name="inputNombreFichero"  value="../ficheros/notas.xml">

        <!-- Input de tipo Submit -->
        <!-- Se le pone el atributo name para evitar ataques -->
        <input type="submit" value="Transformar" name="boton">

    </form>

    <footer>&copy Ismael Maestre</footer>


</body>

</html>