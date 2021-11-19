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

    //lo separo por un salto de linea los diferentes alumnos
    $contenidoFichero = str_replace("\n","<br>",$contenidoFichero);

    //echo $contenidoFichero;
    
    $alumnosArray= array();
    $alumnosArray = explode("<br>",$contenidoFichero);

    print_r ($alumnosArray);

    //Guardo en una array el contenido del fichero
    $datosCsvArray = array(); 
    $datosCsvArray = explode(";",$contenidoFichero);
/*
    //Comienzo a crear el xml
    $XML = new DOMDocument("1.0","utf-8");
    $XML->formatOutput = true;
    
    //Creo el elemento raiz
    $notas = $XML->createElement("notas");
    //guardo notas
    $XML->appendChild($notas);

    foreach ($datosCsv as $iterador) {
        
    }
    
    $XML->save("./ficheros/notas.xml");*/
?>