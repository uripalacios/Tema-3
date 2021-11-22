<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fichero</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>

    <h1>Edición del fichero</h1>


    <!-- PHP -->
    <?php

        // Se importa el fichero que contiene las funciones
        require_once("./funcionesValidarForm.php");

        $nombreFichero = "";

        // Recojo el nombre del fichero
        if(isset($_REQUEST['nombreFichero']))
        {
            $nombreFichero = $_REQUEST['nombreFichero'];
            echo "El nombre del fichero es: <b>" . $_REQUEST['nombreFichero'] . "</b>";
        }

        
        if(sizeof($_REQUEST) > 0)
        {

            if((isset($_REQUEST["boton"]) &&(!empty($_REQUEST["contenidoFichero"]) &&(existeFichero($_REQUEST['inputNombreFichero'])))))
            {
                
                // Leer
                if($_REQUEST['boton'] == "Guardar Cambios")
                {
                    // Se modifica el contenido del fichero
                    modificaFichero($_REQUEST['inputNombreFichero']);

                    // Abro la página de leer y le paso el nombre del fichero
                    header("Location: LeeFichero.php?nombreFichero=" . $_REQUEST["inputNombreFichero"]);
                }
            }

        }
        

    ?>


    <!-- Formulario -->
    <!-- Formulario por POST -->
    <!-- Le indico en el action que me redirija a este mismo fichero para validarlo -->
    <!-- enctype="multipart/form-data" para permitir que se puedan cargar archivos -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="formularioEditar" id="idFormularioEditar">

        <!-- Contenido Del fichero - Alfabetico -->
        <p>
            <p><b>Contenido del fichero</b></p>

            <textarea name="contenidoFichero" id="idContenidoFichero" size="" placeholder="Contenido del Fichero"><?php

                // En caso de que el fichero posea contenido... se imprime
                echo leeFichero($_REQUEST['nombreFichero']);

                ?></textarea>

                <?php

                    // Se comprueba si existe el fichero...
                    // SI no, se imprime un mensaje de error
                    if(!existeFichero($_REQUEST['nombreFichero']))
                    {
                        ?>
                        <label for="idContenidoFichero" style="color:red;">El fichero adjuntado no existe.</label>
                        <?php
                    }
                    
                ?>

        </p>

        <!-- Input oculto que llevará el nombre del fichero a la página de LeeFichero.php -->
        <input type="hidden" name="inputNombreFichero"  value="<?php
            echo $_REQUEST['nombreFichero'];
        ?>">

        <!-- Input de tipo Submit -->
        <!-- Se le pone el atributo name para evitar ataques -->
        <input type="submit" value="Guardar Cambios" name="boton">


    </form>

    

    <footer>&copy Ismael Maestre</footer>

</body>

</html>