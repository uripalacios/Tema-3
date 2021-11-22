<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <style>
        *,
        input {
            margin: 10px;
        }
    </style>
    <?php
    //array dado.
    $array = array(
        "1DAM" => array("ENDE", "BD", "LM", "SI", "FOL"),
        "2DAM" => array("DI", "SGE", "ACDA", "EIE", "PSP"),
        "2DAW" => array("DWES", "DWEC", "DIW", "EIE")
    );
    //php de validacion
    require_once("./validaExamen2.php");

    if(validaFormulario()){

    }else{

    ?>
    <form action="./examen2.php" method="post">
        <label for="nombre">Nombre y apellidos:</label> <input type="text" name="nombre" id="nombre" value="<?php
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('nombre');
            ?>">
            <?php

            // En caso de que esté vacío, se muestra un error
            imprimeError("nombre",'nombre',"Debe introducir un nombre y apellidos");
            
            // Valida el nombre mediante un patrón
            if(! validaNombre(true))
                imprimeErrorRelleno("nombre","Debe introducir un formato adecuado");
            ?>
        <br> <label for="exp">Expediente</label> <input type="text" name="exp" id="exp" value="<?php
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('exp');
            ?>">
            <?php

            // En caso de que esté vacío, se muestra un error
            imprimeError("exp",'exp',"Debe 2 digitos, 3 letras/ 2 digitos");

            // Valida el nombre mediante un patrón
            if(!validaNombre(true))
            imprimeErrorRelleno("exp","Debe 2 digitos, 3 letras/ 2 digitos");
            ?>
        <br> <label for="curso">Curso:</label> <select name="curso" id="curso">
            <option value="no">Selecione una opcion</option>
            
        </select>
        <input type="hidden" name="curso" value="">
        <br><input type="submit" name="Enviado" value="Enviar">
    </form>
    <?php
    } 
    ?>


</body>

</html>