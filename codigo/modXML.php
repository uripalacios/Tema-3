<?php
    $rutafichero = "./ficheros/deportes.xml";

    if(file_exists($rutafichero)){
        //Transforma el xml en un objeto de tipo simplexml
        $xml = simplexml_load_file($rutafichero);
        
    }else{
        exit;
    }  

    $dom = dom_import_simplexml($xml)->ownerDocument;

    $deportes = $dom->firstChild;

    foreach ($deportes->childNodes as $deporte) {
        
        //print_r ($deporte);
        if($deporte->nodeName == "Deporte"){
            foreach ($deporte->childNodes as $hijos) {
                # code...
                if($hijos->nodeName == "Nombre"){
                    if($hijos->nodeValue == "Tenis"){
                        $aux = $hijos;
                        do
                            $aux = $aux->nextSibling->nextSibling;
                        while (!$aux->nodeName == "Jugadores");   
                        $aux->nodeValue = 2;
                    }
                }
            }
        }
    }

    $dom->save($rutafichero);
?>