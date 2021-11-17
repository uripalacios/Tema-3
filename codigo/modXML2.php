<?php
    $rutafichero = "./ficheros/deportes.xml";

    if(file_exists($rutafichero)){
        //Transforma el xml en un objeto de tipo simplexml
        $xml = simplexml_load_file($rutafichero);
        
    }else{
        exit;
    } 

    $dom = dom_import_simplexml($xml)->ownerDocument;

    $etiquetasNombre = $dom->getElementsByTagName("Nombre");

    foreach ($etiquetasNombre as $NombreDeporte) {
       if($NombreDeporte->nodeValue == "Tenis"){
        $aux = $NombreDeporte;
        do
            $aux = $aux->nextSibling;
        while ($aux->nodeName != "Jugadores");   
        $aux->nodeValue = 1;
        $aux->setAttribute("Modificado","True");
       }
    }


    $dom->save($rutafichero);

?>