<?php
    //Leemos el fichero notas.csv
    //Guardamos la ruta del fichero en una variable
    $rutaFicheroCsv = "./ficheros/notas.csv";

    // Leer el fichero //
    if(!$fp = fopen($rutaFicheroCsv,'r'))
    {
        echo "No se ha podido abrir el fichero";
        exit;
    }
 
    //guardo el contenido de fichero en una variable
    $contenidoFichero = fread($fp,filesize($rutaFicheroCsv));

    //Guardo en una array el contenido del fichero 
    $datosCsvArray = explode(";",$contenidoFichero);

    //Comienzo a crear el xml
    $XML = new DOMDocument("1.0","utf-8");
    $XML->formatOutput = true;
    
    //Creo el elemento raiz
    $notas = $XML->createElement("notas");
    //guardo notas
    $XML->appendChild($notas);

    foreach ($datosCsv as $iterador) {
        
    }
    
?>