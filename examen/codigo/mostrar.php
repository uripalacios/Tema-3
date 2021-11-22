<?php
   
    // Nombre y Apellidos
    if (!empty($_REQUEST['nombre']))
        echo "El nombre es: <b>" . $_REQUEST["nombre"] . "</b><br>";

    // Expediente
    if (!empty($_REQUEST['exp']))
        echo "El expediente es: <b>" . $_REQUEST["exp"] . "</b><br>";
    //Curso
    if (!$_REQUEST['curso'] == "no")
    echo "La sleccion de lista es: <b>" . $_REQUEST["curso"] . "</b><br>";
        
    
    


?>