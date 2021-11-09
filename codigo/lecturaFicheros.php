<?php
    //Ir ejecutando por partes
    // Ruta del fichero
    $rutaFichero = "./ficheros/blocDeNotas.txt";

    // 1º - Abrir el fichero (en modo escritura) //

    /*
    // Si no se puede abrir el fichero...
    // fopen(ruta,modoAcceso)
    if(!$fp = fopen($rutaFichero,'w'))
    {
        echo "No se ha podido abrir el fchero";
        exit;
    }
 
    echo $fp;

    // 2º - Escribir en dicho fichero //
    $texto = "Quiero matar a Ismael";

    // Donde lo escribo (puntero a la ruta), que escribo y su tamaño
    fwrite($fp,$texto,strlen($texto));
    */
    
    /*
    // Escribir al final del fichero //
    // 1º - Abrir el fichero (en modo escritura) //

    // Si no se puede abrir el fichero...
    // fopen(ruta,modoAcceso)
    if(!$fp = fopen($rutaFichero,'a'))
    {
        echo "No se ha podido abrir el fchero";
        exit;
    }
 
    echo $fp;

    // 2º - Escribir en dicho fichero //
    $texto = "\nEscribir al final";

    // Donde lo escribo (puntero a la ruta), que escribo y su tamaño
    fwrite($fp,$texto,strlen($texto));

    // 3º - Cerrar el fichero //
    fclose($fp);
    */


    // Leer el fichero //
    if(!$fp = fopen($rutaFichero,'r'))
    {
        echo "No se ha podido abrir el fichero";
        exit;
    }
 
    $textoLeido = fread($fp,filesize($rutaFichero));

    // 
    $textoLeido = str_replace("\n","<br>",$textoLeido);

    echo $textoLeido;

    // 3º - Cerrar el fichero //
    fclose($fp);
    
    
?>