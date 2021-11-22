<!-- FICHERO QUE CONTIENE VARIAS FUNCIONES -->

<!-- PHP -->
<?php

    // Funcion que imprime un salto de línea (<br>)
    function br()
    {
        echo "<br>";
    }

    // Funcion que imprime una cadena dentro de un <h1>
    function h1($cadena)
    {
        echo "<h1>" . $cadena . "</h1>";
    }

    // Funcion que imprime una cadena dentro de un <p>
    function p($cadena)
    {
        echo "<p>" . $cadena . "</p>";
    }

    // Funcion que devuelve el fichero actual
    function funcion_self()
    {
        return $_SERVER['SCRIPT_FILENAME'];
    }

    // Funcion que devuelve la letra que le corresponde a un nº de DNI
    function dni($numeroDNI)
    {
        $resto = $numeroDNI % 23;  
        $palabro = 'TRWAGMYFPDXBNJZSQVHLCKE';  

        return $palabro{$resto};
    }


?>
