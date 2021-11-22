<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>
    <h1>Formulario</h1>

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

        
        // Se validan los datos del formulario
        // Si se ha rellenado correctamente...
        if(validaFormulario())
        {

            echo "<h2>EL FORMULARIO SE HA ENVIADO CORRECTAMENTE</h2><br>";

            // Se muestran los datos del formulario
            muestraDatosFormulario();

            /*

            // Posteriormente
            $nuevaURL = "../codigo/muestraFormulario.php";

            header("Location: " . $nuevaURL);
            */
        }
        // Si no...
        else
        {
            echo "<h2>ERROR AL ENVIAR EL FORMULARIO</h2>";

        // Quito el } para que desaparezca el formulario

    ?>

    <!-- Formulario por POST -->
    <!-- Le indico en el actio que me redirija a este mismo fichero para validarlo -->
    <!-- enctype="multipart/form-data" para permitir que se puedan cargar archivos -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="formulario" id="idFormulario"  enctype="multipart/form-data">

        <!-- Nombre - Alfabetico -->
        <p>
            <label for="idNombre">Nombre:</label>

            <input type="text" name="nombre" id="idNombre" size="40" placeholder="Nombre" value="<?php

                    // Si no está vacío, se guarda el texto introducido
                    validaSiVacio('nombre');
                   
                ?>">

                <?php

                    // En caso de que esté vacío, se muestra un error
                    imprimeError("idNombre",'nombre',"Debe introducir un nombre");

                    // Valida el nombre mediante un patrón
                    validaNombre(true);
                ?>

        </p>

        <!-- Apellido - Alfanumérico -->
        <p>
            <label for="idApellido">Apellido:</label>
            <input type="text" name="apellido" id="idApellido" size="40" placeholder="Apellido" value="<?php

                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('apellido');
               
            ?>">

            <?php

                // En caso de que esté vacío, se muestra un error
                imprimeError("idApellido",'apellido',"Debe introducir un apellido");

                // Valida el apellido mediante un patrón
                validaApellido(true);

            ?>
        </p>

        <!-- Fecha - Alfanumérico -->
        <p>
            <label for="idFecha">Fecha:</label>
            <input type="text" name="fecha" id="idFecha" size="10" placeholder="Fecha" value="<?php

                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('fecha');
               
            ?>">

            <?php

                // En caso de que esté vacío, se muestra un error
                imprimeError("idFecha",'fecha',"Debe introducir una fecha");

                // Valida el dni mediante un patrón
                validaFecha(true);
            ?>
        </p>

        <!-- DNI (bien formado y letra correcta) -->
        <p>
            <label for="idDni">DNI:</label>
            <input type="text" name="dni" id="idDni" size="9" placeholder="DNI" value="<?php

                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('dni');
                
            ?>">

            <?php

                // En caso de que esté vacío, se muestra un error
                imprimeError("idDni",'dni',"Debe introducir un dni");

                // Valida el dni mediante un patrón
                validaDNI(true);
            ?>
        </p>


        <!-- E-mail  -->
        <p>
            <label for="idEmail">E-mail:</label>
            <input type="email" name="email" id="idEmail" size="40" placeholder="E-mail" value="<?php

                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('email');
                
            ?>">

            <?php

            // En caso de que esté vacío, se muestra un error
            imprimeError("idEmail",'email',"Debe introducir un email");

            // Valida el email mediante un patrón
            validaEmail(true);
            ?>
        </p>

        <br><br>

        <!-- Input de tipo Submit -->
        <!-- Se le pone el atributo name para evitar ataques -->
        <input type="submit" value="Enviar" name="Enviado">

        <!-- Input de tipo Reset -->
        <input type="reset" value="Limpiar">
    </form>

    <?php
        }
    ?>

    <br><br><br>

    <!-- Footer informativo -->
    <footer>&copy Ismael Maestre</footer>

</body>
</html>