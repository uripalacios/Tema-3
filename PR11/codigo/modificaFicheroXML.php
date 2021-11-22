<!DOCTYPE html>
<html lang="e">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Notas XML</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>

    <h1>Edita Notas</h1>

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

            if(isset($_REQUEST["boton"]))
            {

                // Si se guardan los cambios...
                if($_REQUEST['boton'] == "Guardar Cambios")
                {
                    // Guardo las modificaciones
                    modificaNotas();

                    // Vuelvo de nuevo a la página donde visualizo las notas de los alumnos
                    header("Location: ej2.php");
                }
            }

        }

    ?>

    <!-- Formulario -->
    <!-- Formulario por POST -->
    <!-- Le indico en el action que me redirija a este mismo fichero para validarlo -->
    <!-- enctype="multipart/form-data" para permitir que se puedan cargar archivos -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="formulario" id="idFormulario">

        <!-- Título -->
        <?php
            echo "<p><b>Notas de " . $_REQUEST['nombreAlumno'] . "</b></p>";
        ?>

        <!-- Input oculto que llevará el nombre del alumno -->
        <input type="hidden" name="inputNombreAlumno"  value="<?php
            echo $_REQUEST['nombreAlumno'];
        ?>">

        <!-- Input oculto que llevará el nombre del alumno -->
        <input type="hidden" name="inputNombreFichero"  value="<?php
            echo $_REQUEST['nombreFichero'];
        ?>">

        <!-- Nota 1 -->
        <p>
            <label for="idNota1">Nota de la 1ª evaluación</label>

            <input type="number" name="nota1" id="idNota1" size="2" min="0" max="10" placeholder="Nota de la 1ª evaluación" value="<?php

                    // Lee la nota de este alumno, le paso el nombre y la evaluacion
                    leeNota($_REQUEST['nombreAlumno'],1);
                   
                ?>">
        </p>

        <!-- Nota 2 -->
        <p>
            <label for="idNota2">Nota de la 2ª evaluación</label>

            <input type="number" name="nota2" id="idNota2" size="2" min="0" max="10" placeholder="Nota de la 2ª evaluación" value="<?php

                    // Lee la nota de este alumno, le paso el nombre y la evaluacion
                    leeNota($_REQUEST['nombreAlumno'],2);
                   
                ?>">
        </p>

        <!-- Nota 3 -->
        <p>
            <label for="idNota3">Nota de la 3ª evaluación</label>

            <input type="number" name="nota3" id="idNota3" size="2" min="0" max="10" placeholder="Nota de la 3ª evaluación" value="<?php

                    // Lee la nota de este alumno, le paso el nombre y la evaluacion
                    leeNota($_REQUEST['nombreAlumno'],3);
                   
                ?>">
        </p>

        <!-- Input de tipo Submit -->
        <!-- Se le pone el atributo name para evitar ataques -->
        <input type="submit" value="Guardar Cambios" name="boton">

    </form>
    
    <footer>&copy Ismael Maestre</footer>
</body>
</html>