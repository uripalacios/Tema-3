<?php

    //modificar un fichero
    //bucar a canales y lo vamos a cambiar por david que quiere jugar en el betis
    $rutaficheroInicial = "./ficheros/fichero1.txt";
    $rutaficheroTemp = "./ficheros/temp.txt";

    if(!$finicial = fopen($rutaficheroInicial,'r'))
    {
        echo "Ha habido un error al abrir el fichero";
        exit;
    }

    //Creamos el fichero en el que vamos a guardar los datos

    if(!$ftemp = fopen($rutaficheroTemp,'w'))
    {
        echo "Ha habido un error al abrir el fichero";
        exit;
    }

    //fgets lee linea a linea hasta que se acabe el fichero
    //Mientras que el fichero tenga lineas.
    //$c para comprobar
    $c = 0;
    while($linea = fgets($finicial, filesize($rutaficheroInicial))){
        // echo $c .":". $linea."<br>";
        // $c++;
        if(trim($linea) == 'canales')
            $linea = "david\n";
        fwrite($ftemp, $linea, strlen($linea));
    }

    fclose($finicial);
    fclose($ftemp);

    //reemplazamos el fichero inicial
    //primero borramos el incial y luego renombramos el fichero temporal

    unlink($rutaficheroInicial);//borrar archivo
    rename($rutaficheroTemp,$rutaficheroInicial);//renombrar
?>