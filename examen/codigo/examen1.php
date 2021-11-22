<?php

    $rutaFichero = "./ficheros/entradas.csv";

    if(!$fp = fopen($rutaFichero,'a'))
    {
        echo "No se ha podido abrir el fichero";
        exit;
    }
 
    echo $fp;



?>