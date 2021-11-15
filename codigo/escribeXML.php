<?php
    $XML = new DOMDocument("1.0","utf-8");
    $XML->formatOutput = true;

    //Deportes
    //Elemento
    $ElementoRaiz = $XML->createElement("Deportes");

    //añadimos la raiz
    $raiz = $XML->appendChild($ElementoRaiz);

    //guardamos el fichero
    $XML->save("./ficheros/deportes.xml");
?>