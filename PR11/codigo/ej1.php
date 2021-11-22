<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>

    <h1>Ejercicio 1</h1>

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
        require_once("./funcionesValidarForm.php");

        // En funcion del botón que se haya pulsado...
        // Si se ha pulsado algun boton (hecho submit del form)
        if(sizeof($_REQUEST) > 0)
        {

            if((isset($_REQUEST["boton"]) &&(!empty($_REQUEST["nombreFichero"]) &&(validaNombreFichero(false)))))
            {
                // Editar...
                if($_REQUEST['boton'] == "Editar")
                {
                    // Abro la página de editar y le paso el nombre del fichero
                    header("Location: EditaFichero.php?nombreFichero=" . $_REQUEST["nombreFichero"]);
                }

                // Leer
                if($_REQUEST['boton'] == "Leer")
                {
                    // Abro la página de leer y le paso el nombre del fichero
                    header("Location: LeeFichero.php?nombreFichero=" . $_REQUEST["nombreFichero"]);
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
            <label for="idNombreFichero">Nombre del fichero:</label>

            <input type="text" name="nombreFichero" id="idNombreFichero" size="40" placeholder="Nombre del Fichero" value="<?php

                    // Si no está vacío, se guarda el texto introducido
                    validaSiVacio('nombreFichero');
                   
                ?>">

                <?php

                    // En caso de que esté vacío, se muestra un error
                    imprimeError("idNombreFichero",'nombreFichero',"Debe introducir un nombre de fichero");

                    // Valida el nombre mediante un patrón
                    validaNombreFichero(true);
                    
                ?>

        </p>

        <!-- Input de tipo Submit -->
        <!-- Se le pone el atributo name para evitar ataques -->
        <input type="submit" value="Editar" name="boton">

        <!-- Input de tipo Submit -->
        <!-- Se le pone el atributo name para evitar ataques -->
        <input type="submit" value="Leer" name="boton">

    </form>

    <footer>&copy Ismael Maestre</footer>


</body>

</html>