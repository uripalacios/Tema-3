<?php

// Funcion que invoca al resto de funciones que van validando el formulario
function validaFormulario()
{
    /*
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
    */

    if (isset($_REQUEST['Enviado'])) {
        $correcto = true;

        // nombre
        if (empty($_REQUEST['nombre']))
            $correcto = false;

        // Apellido
        if (empty($_REQUEST['apellido']))
            $correcto = false;

        // Fecha
        if (empty($_REQUEST['fecha']))
            $correcto = false;

        // Radio
        if (!isset($_REQUEST['radioButtons']))
            $correcto = false;

        // Lista desplegable
        if ($_REQUEST['ciclo'] == "no")
            $correcto = false;

        // Checks
        if(isset($_REQUEST['checks']))
        {
            $arrayChecks = $_REQUEST['checks'];

            if ((count($arrayChecks) > 3) || (count($arrayChecks) < 1))
                $correcto = false;
        }
        
    } else {
        $correcto = false;
    }

    return $correcto;
}

// Función que valida que se ha enviado el formulario
function validaEnviado($enviado)
{


    if (isset($enviado)) {
        $correcto = true;
    } else {
        $correcto = false;
    }

    return $correcto;
}

// Funcion que valida si está vacío un campo
function validaSiVacio($campo)
{

    if (isset($_REQUEST['Enviado'])) {
        // Si no está vacío
        if (!empty($_REQUEST[$campo])) {
            // Muestro el valor del campo en el input
            echo $_REQUEST[$campo];

            $correcto = true;
        } else {
            $correcto = false;
        }

        return $correcto;
    }
}

// Funcion que imprime un mensaje de error en el caso de que el campo esté vacío
function imprimeError($idCampo, $campo, $mensaje)
{
    if (isset($_REQUEST['Enviado']) && empty($_REQUEST[$campo])) {
?>
        <label for="<?php echo $idCampo ?>" style="color:red;"><?php echo $mensaje ?></label>
        <?php
    }
}

// Funcion que valida los radioButton
function validaRadioButton($campo, $idCampo, $mensaje)
{
    // Si se ha seleccionado algun radio button
    if (isset($_REQUEST[$campo]) && (isset($_REQUEST['Enviado']))) {
    }
    // Si no...
    else {
        if (isset($_REQUEST['Enviado'])) {
        ?>
            <label for="<?php echo $idCampo ?>" style="color:red;"><?php echo $mensaje ?></label>
        <?php
        }
    }
}

// Funcion que guarda el valor de los radioButtons
function compruebaRadio($radio, $valor)
{
    // Si se ha seleccionado algun radio button
    if (isset($_REQUEST[$radio]) && (isset($_REQUEST['Enviado']))) {
        if (($_REQUEST[$radio] == $valor)) {
            echo " checked";
        }
    }
}

// Funcion que comprueba la seleccion de la lista desplegable
function compruebaLista($campo, $idCampo, $mensaje)
{
    // Si se ha seleccionado algun radio button
    if (isset($_REQUEST[$campo])) {
        // Si el campo seleccionado es el primero...
        if ($_REQUEST[$campo] == "no") {
            // Muestro un mensaje de error
        ?>
            <label for="<?php echo $idCampo ?>" style="color:red;"><?php echo $mensaje ?></label>
        <?php
        }
    }
}

// Funcion que guarda el valor seleccionado de la lista
function guardaValorLista($campo, $opcion)
{
    if ($_REQUEST[$campo] == $opcion) {
        echo "selected";
    }
}

// Funcion que comprueba los check
function compruebaCheck($campo, $idCampo, $mensaje)
{
    // Si no se ha seleccionado ningun check...
    if ((!isset($_REQUEST[$campo]) && (isset($_REQUEST['Enviado'])))) 
    {
        // Muestro un mensaje de error
        ?>
        <label for="<?php echo $idCampo ?>" style="color:red;"><?php echo $mensaje ?></label>
        <?php
    }
    // Entre 1 y 3 checks...
    else if (isset($_REQUEST['Enviado']) && (isset($_REQUEST[$campo]))) 
    {
        
        if ((count($_REQUEST[$campo]) > 3) || (count($_REQUEST[$campo]) < 1)) 
        {
            ?>
                <label for="<?php echo $idCampo ?>" style="color:red;"><?php echo $mensaje ?></label>
            <?php
        }
        
    }
}

// Funcion que guarda los check seleccionados
function guardaValorCheck($check, $valor, $posicion)
{
    if ((isset($_REQUEST[$check]) && (isset($_REQUEST['Enviado'])))) 
    {
        $arrayCheck = $_REQUEST[$check];

        for ($i = 0; $i < count($arrayCheck); $i++) {
            if ($arrayCheck[$i] == $valor) {
                echo " checked";
            }
        }
    }
}

// Funcion que guarda el archivo
function guardaArchivo($idCampo)
{
    if(isset($_REQUEST['Enviado']))
    {

        if ((isset($_FILES))) 
        {
            // Se le dice donde se quiere que se guarde
            $rutaGuardado = "../uploads/";

            // Se le establece el nombre al archivo a guardar
            $rutaConNombreFichero = $rutaGuardado .  $_FILES['archivo']['name'];

            // Si se mueve el fichero del sitio temporal a la ruta especificada...
            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaConNombreFichero)) 
            {
                echo "<br>El archivo se ha guardado correctamente.<br>";

                // Si subo una imagen, la guardo y la cargo en el html //
                //echo "La ruta es: <b>" . $rutaConNombreFichero . "</b><br>";

                //echo "<img src='" . $rutaConNombreFichero . "' alt='Imagen' width='100px' height='100px'>";
                //<img src="pic_trulli.jpg" alt="Italian Trulli">

            } 
            else
            {
                //echo "<br>Error al guardar el fichero.";
                ?> <label for="<?php echo $idCampo ?>" style="color:red;">Error al guardar el archivo</label> <?php

            }
        }
        else
        {
            echo "<br>No existe FILES";
        }
    }
    
}

// Funcion que muestra el archivo seleccionado
function muestraArchivo()
{
    if(isset($_REQUEST['Enviado']))
    {

        if ((isset($_FILES))) 
        {
            // Se le dice donde se quiere que se guarde
            $rutaGuardado = "../uploads/";

            // Se le establece el nombre al archivo a guardar
            $rutaConNombreFichero = $rutaGuardado .  $_FILES['archivo']['name'];

            // Si se mueve el fichero del sitio temporal a la ruta especificada...
            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaConNombreFichero)) {
                //echo "<br>El fichero se ha guardado correctamente.<br>";

                // Si subo una imagen, la guardo y la cargo en el html //
                echo "El archivo es (ruta): <b>" . $rutaConNombreFichero . "</b><br>";

                // Si es una imagen, lo imprimo
                echo "<img src='" . $rutaConNombreFichero . "' alt='Imagen' width='100px' height='100px'>";
                //<img src="pic_trulli.jpg" alt="Italian Trulli">

            } 
            else
            {
                //echo "<br>Error al guardar el fichero.";

            }
        }
    }
    
}

// Función que muestra los datos del formulario
function muestraDatosFormulario()
{
    // nombre
    if (!empty($_REQUEST['nombre']))
        echo "El nombre es: <b>" . $_REQUEST["nombre"] . "</b><br>";

    // nombre opcional
    if (!empty($_REQUEST['nombreOpcional']))
        echo "El nombre opcional es: <b>" . $_REQUEST["nombreOpcional"] . "</b><br>";

    // Apellido
    if (!empty($_REQUEST['apellido']))
        echo "El apellido es: <b>" . $_REQUEST["apellido"] . "</b><br>";

    // Apellido opcional
    if (!empty($_REQUEST['apellidoOpcional']))
        echo "El apellido opcional es: <b>" . $_REQUEST["apellidoOpcional"] . "</b><br>";

    // Fecha
    if (!empty($_REQUEST['fecha']))
        echo "La fecha es: <b>" . $_REQUEST["fecha"] . "</b><br>";

    // Fecha opcional
    if (!empty($_REQUEST['fechaOpcional']))
        echo "La fecha opcional es: <b>" . $_REQUEST["fechaOpcional"] . "</b><br>";

    // Radio
    if (isset($_REQUEST['radioButtons']))
        echo "La opcion (radioButton) es: <b>" . $_REQUEST["radioButtons"] . "</b><br>";

    // Lista desplegable
    if (!$_REQUEST['ciclo'] == "no")
        echo "La sleccion de lista es: <b>" . $_REQUEST["ciclo"] . "</b><br>";

    // Checks
    if ((count($_REQUEST['checks']) <= 3) && (count($_REQUEST['checks']) >= 1)) {
        echo "Las aficiones son:<br>";

        foreach ($_POST["checks"] as $value) {
            echo "&nbsp;&nbsp;&nbsp;<b>-" . $value . "</b><br>";
        }
    }

    // Teléfono        
    if (!empty($_REQUEST['telefono']))
        echo "El telefono es: <b>" . $_REQUEST["telefono"] . "</b><br>";

    // Email
    if (!empty($_REQUEST['email']))
        echo "El email es: <b>" . $_REQUEST["email"] . "</b><br>";

    // Pass
    if (!empty($_REQUEST['pass']))
        echo "La contraseña es: <b>" . $_REQUEST["pass"] . "</b><br>";

    // Archivo
    muestraArchivo();
}

?>