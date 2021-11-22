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

                ?>

        </p>

        <!-- Nombre Opcional -  Alfabetico Opcional -->
        <p>
            <label for="idNombreOpcional">Nombre (opcional):</label>
            <input type="text" name="nombreOpcional" id="idNombreOpcional" size="40" placeholder="Nombre" value="<?php

            // Si no está vacío, se guarda el texto introducido
            validaSiVacio('nombreOpcional');

            ?>">

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

            ?>
        </p>

        <!-- Apellido Opcional - Alfanumérico Opcional -->
        <p>
            <label for="idApellidoOpcional">Apellido (opcional):</label>
            <input type="text" name="apellidoOpcional" id="idApellidoOpcional" size="40" placeholder="Apellido" value="<?php

            // Si no está vacío, se guarda el texto introducido
            validaSiVacio('apellidoOpcional');

            ?>">
        </p>

        <!-- Fecha -->
        <p>
            <label for="idFecha">Fecha:</label>
            <input type="date" name="fecha" id="idfecha" size="40" value="<?php

                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('fecha');
               
            ?>">

            <?php

                // En caso de que esté vacío, se muestra un error
                imprimeError("idFecha",'fecha',"Debe introducir una fecha");

            ?>
        </p>

        <!-- Fecha Opcional -->
        <p>
            <label for="idFechaOpcional">Fecha (opcional):</label>
            <input type="date" name="fechaOpcional" id="idFechaOpcional" size="40" value="<?php

            // Si no está vacío, se guarda el texto introducido
            validaSiVacio('fechaOpcional');

            ?>">

        </p>

        <!-- Radio Button Obligatorio -->
        <p><b>Radio Button Obligatorio</b></p>

        <label for="idRadio1">Opción 1
            <input type="radio" name="radioButtons" id="idRadio1" value="1" <?php compruebaRadio('radioButtons',1); ?>>
        </label>

        <label for="idRadio2">Opción 2
            <input type="radio" name="radioButtons" id="idRadio2" value="2" <?php compruebaRadio('radioButtons',2); ?>>
        </label>

        <label for="idRadio3">Opción 3
            <input type="radio" name="radioButtons" id="idRadio3" value="3" <?php compruebaRadio('radioButtons',3); ?>>
        </label>

        <?php

            validaRadioButton('radioButtons',"idRadio3","Debe seleccionar al menos un radioButton");
        ?>

        <!-- Input de tipo Select -->
        <p><b>Selecciona una opción:</b></p>

        <select name="ciclo" id="idCiclo" id="idCiclo">
            <option value="no">Seleccione una opción</option>
            <option value="opcion1" <?php guardaValorLista('ciclo',"opcion1"); ?>>1ª Opción</option>
            <option value="opcion2" <?php guardaValorLista('ciclo',"opcion2"); ?>>2ª Opción</option>
            <option value="opcion3" <?php guardaValorLista('ciclo',"opcion3"); ?>>3ª Opción</option>
        </select>

        <?php
            // Compruebo que no se haya seleccionado la primera opcion
            compruebaLista('ciclo',"idCiclo","Debe seleccionar otra opción");
        ?>

        <!-- Input de tipo check -->
        <p><b>Elije al menos 1 y máximo 3</b></p>

        <input type="checkbox" name="checks[]" id="idcheck1" value="Check 1" <?php guardaValorCheck('checks',"Check 1",0); ?>>
        <label for="idcheck1">Check 1</label>

        <input type="checkbox" name="checks[]" id="idcheck2" value="Check 2" <?php guardaValorCheck('checks',"Check 2",1); ?>>
        <label for="idcheck2">Check 2</label>

        <input type="checkbox" name="checks[]" id="idcheck3" value="Check 3" <?php guardaValorCheck('checks',"Check 3",2); ?>>
        <label for="idcheck3">Check 3</label>

        <input type="checkbox" name="checks[]" id="idcheck4" value="Check 4" <?php guardaValorCheck('checks',"Check 4",3); ?>>
        <label for="idcheck4">Check 4</label>

        <input type="checkbox" name="checks[]" id="idcheck5" value="Check 5" <?php guardaValorCheck('checks',"Check 5",4); ?>>
        <label for="idcheck5">Check 5</label>

        <input type="checkbox" name="checks[]" id="idcheck6" value="Check 6" <?php guardaValorCheck('checks',"Check 6",5); ?>>
        <label for="idcheck6">Check 6</label>

        <?php 
            compruebaCheck("checks","idcheck6","Debe seleccionar entre 1 y 3 campos"); 
        ?>

        <!-- Teléfono - Tel -->
        <p>
            <label for="idTelefono">Teléfono:</label>
            <input type="tel" name="telefono" id="idTelefono" size="40" placeholder="Teléfono" value="<?php

                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('telefono');
               
            ?>">

        </p>

         <!-- E-mail  -->
         <p>
            <label for="idEmail">E-mail:</label>
            <input type="email" name="email" id="idEmail" size="40" placeholder="E-mail" value="<?php

                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('email');
               
            ?>">
        </p>

        <!-- Contraseña - Input de Password -->
        <p>
            <label for="idPass">Contraseña:</label>
            <input type="password" name="pass" id="idPass" placeholder="Contraseña" value="<?php

                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('pass');
               
            ?>">
        </p>

       <!-- Selector de archivos -->
        <p><b>Selector de Archivos</b></p>

        <p>
            <label for="idArchivo">Subir documento:</label>
            <input type="file" name="archivo" id="idArchivo">
        </p>

        <?php guardaArchivo("idArchivoLabel"); ?>

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