<?php 

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

        // Nombre y apellidos
        // Si el campo nombre está vacío o no cumple el patrón...
        if (empty($_REQUEST['nombre'])||(validaNombre(false) == false))
        {
            $correcto = false;
        }

        // Expediente
        // Si el campo expediente está vacío o no cumple el patrón...
        if (empty($_REQUEST['exp'])||(validaExpediente(false) == false))
        {
            $correcto = false;
        }
        
    } else{
        $correcto = false;
    }

    return $correcto;
}
//Valida que se ha enviado el formulario
function validaEnviado(){
    //$enviado = $_REQUEST['Enviado'];

    if (isset($_REQUEST['Enviado']))
    {
        $correcto = true;
    }
    else
    {
        $correcto = false;
    }

    return $correcto;
}

//Valida si está vacío un campo
function validaSiVacio($campo){

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


function imprimeError($idCampo, $campo, $mensaje)
{
    if (isset($_REQUEST['Enviado']) && empty($_REQUEST[$campo])) 
    {
        ?>
        <label for="<?php echo $idCampo ?>" style="color:red;"><?php echo $mensaje ?></label>
        <?php
    }
}

function imprimeErrorRelleno($idCampo, $mensaje)
{
    ?>
        <label for="<?php echo $idCampo ?>" style="color:red;"><?php echo $mensaje ?></label>
        <?php
}

function validaNombre($validando)
{
    // La primera letra en mayúscula
    // Patrón
    $patron = '/([A-Z]{1}[a-z]{2}){3}/';

    $correcto = false;

    if(((isset($_REQUEST["nombre"])&& (isset($_REQUEST['Enviado'])&&(!empty($_REQUEST["nombre"])))))) 
    {
        $nombre = $_REQUEST["nombre"];

        // Si cumple el patrón...
        if(preg_match($patron, $nombre) == true)
        {
            $correcto = true;
        }
        // Si no...
        else{
            $correcto = false;

            
        }
    }
    return $correcto;
}

function validaExpediente($validando)
{
    // La primera letra en mayúscula

    // Patrón
    $patron = '/[0-9]{2}[A-Z]{3}\/[0-9]{2}/';

    $correcto = false;

    if(((isset($_REQUEST["exp"])&& (isset($_REQUEST['Enviado'])&&(!empty($_REQUEST["exp"])))))) 
    {
        $nombre = $_REQUEST["exp"];

        // Si cumple el patrón...
        if(preg_match($patron, $nombre) == true)
        {
            $correcto = true;
        }
        // Si no...
        else
        {
            $correcto = false;
            
        }
    }

    return $correcto;
}


function generaComboBox($array){
    foreach ($array as $key => $value) {
        echo "<option value=".$key.">".$key."</option>";
    }
}