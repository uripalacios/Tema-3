<?php
    $XML = new DOMDocument("1.0","utf-8");
    $XML->formatOutput = true;

    //Deportes
    //Elemento
    $ElementoRaiz = $XML->createElement("Deportes");

    //añadimos la raiz
    $raiz = $XML->appendChild($ElementoRaiz);
    //creado etiqueta deporte
    $deporte = $XML->createElement("Deporte");
    //añadido
    $ElementoRaiz->appendChild($deporte);
    //creado etiqueta nombre
    $nombre = $XML->createElement("Nombre");
    //creo texto
    $texto = $XML->createTextNode("Futbol");
    $nombre->appendChild($texto);
    $deporte->appendChild($nombre);
    
    //creado etiqueta nombre
    $jug = $XML->createElement("Jugadores","11");
    $deporte->appendChild($jug);

    $deporte = $XML->createElement("Deporte");
    //añadido
    $ElementoRaiz->appendChild($deporte);
    //creado etiqueta nombre
    $nombre = $XML->createElement("Nombre");
    //creo texto
    $texto = $XML->createTextNode("Tenis");
    $nombre->appendChild($texto);
    $deporte->appendChild($nombre);
    
    //creado etiqueta nombre
    $jug = $XML->createElement("Jugadores","1");
    $deporte->appendChild($jug);
    //guardamos el fichero
    $XML->save("./ficheros/deportes.xml");
?>