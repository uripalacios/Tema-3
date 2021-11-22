<?php

// Funcion que invoca al resto de funciones que van validando el formulario
function validaFormulario()
{
    /*
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
    */

    // Si se ha enviado el formulario
    if (validaEnviado() == true) 
    {
        $correcto = true;

        // Nombre del Fichero
        // Si el campo nombre está vacío o no cumple el patrón...
        if (empty($_REQUEST['nombreFichero'])||(validaNombreFichero(false) == false))
        {
            $correcto = false;
        }
        
    } else 
    {
        $correcto = false;
    }

    return $correcto;
}

// Función que valida que se ha enviado el formulario
function validaEnviado()
{
    //$enviado = $_REQUEST['Enviado'];

    if (isset($_REQUEST['boton']))
    {
        $correcto = true;
    }
    else
    {
        $correcto = false;

    }

    return $correcto;
}

// Funcion que valida si está vacío un campo
function validaSiVacio($campo)
{

    if (validaEnviado()) {
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
    if (isset($_REQUEST['Leer'])&&isset($_REQUEST['Editar'])&& empty($_REQUEST[$campo])) 
    {
        ?>
        <label for="<?php echo $idCampo ?>" style="color:red;"><?php echo $mensaje ?></label>
        <?php
    }
}


// Función que muestra los datos del formulario
function muestraDatosFormulario()
{
    // nombre
    if (!empty($_REQUEST['nombreFichero']))
        echo "El nombre del fichero es: <b>" . $_REQUEST["nombre"] . "</b><br>";

}

// Funcion que valida el nombre del fichero con un patrón
function validaNombreFichero($validando)
{
    // Patrón que valida que sea un fichero con extension .txt
    $patron = '/.\.txt/';

    $correcto = false;

    if(((isset($_REQUEST["nombreFichero"])&& (isset($_REQUEST['boton'])&&(!empty($_REQUEST["nombreFichero"]))))))
    {
        $nombreFichero = $_REQUEST["nombreFichero"];

        // Si cumple el patrón...
        if(preg_match($patron, $nombreFichero) == true)
        {
            $correcto = true;
        }
        // Si no...
        else
        {
            $correcto = false;

            if($validando)
            {
                ?>
                <label for="<?php echo "idNombreFichero" ?>" style="color:red;"><?php echo "Debe introducir un nombre de fichero válido (nombreFichero.txt)." ?></label>
                <?php
            }
            
        }
    }

    return $correcto;
}


////// EDITAR FICHERO //////

// Funcion que lee un fichero e imprime su contenido
function leeFichero($nombreFichero)
{

    $rutaFichero = "./" . $nombreFichero;

    // Leer el fichero //
    // Si el fichero no existe y no lo puede leer...
    if(file_exists($rutaFichero))
    {

        if(!$fp = @fopen($rutaFichero,'r'))
        {
        //echo "No se ha podido abrir el fichero";

        fclose($fp);
        
        }
        else
        {
        
            // Mientras lea una línea
            // Recojo el valor del texto
            if(filesize($rutaFichero) > 0)
            {
                while($textoLeido = fread($fp,filesize($rutaFichero)))
                {
                    // Imprimo la línea
                    return $textoLeido; 
                }
            }
            else
            {
                return "";
            }
            
        }

    }

   
}

// Funcion que modifica los datos de un fichero
function modificaFichero($nombreFichero)
{

    $rutaFicheroInicial = "./" . $nombreFichero;
    $rutaFicheroTemporal = "./ficheroTemporal.txt";

    // Fichero inicial
    if(!$ficheroInicial = fopen($rutaFicheroInicial,'r'))
    {
        echo "No se ha podido abrir el fchero";
        exit;
    }

    // Fichero temporal
    if(!$ficheroTemporal = fopen($rutaFicheroTemporal,'w'))
    {
        echo "No se ha podido abrir el fchero";
        exit;
    }

    // Leo el textArea linea a linea
    $contenidoTextArea = trim($_REQUEST['contenidoFichero']);

    fwrite($ficheroTemporal, $contenidoTextArea, strlen(($contenidoTextArea)));


    // Cierro los ficheros
    fclose(($ficheroInicial));
    fclose(($ficheroTemporal));

    // reemplazamos el fichero temporal por el incial
    // Para ello, primero borramos su contenido
    unlink($rutaFicheroInicial);

    // Se renombra
    rename($rutaFicheroTemporal,$rutaFicheroInicial);

}

// Función que comprueba si existe el fichero
function existeFichero($nombreFichero)
{
    $rutaFichero = "./" . $nombreFichero;

    if(file_exists($rutaFichero))
    {
        $correcto = true;
    }
    else
    {
        $correcto = false;
    }

    return $correcto;

}

// LeeFichero.php //

// Funcion que muestra el contenido del fichero en un textArea no editable
function muestraContenidoFichero($fichero)
{

    

}
?>