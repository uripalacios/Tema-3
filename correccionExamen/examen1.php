<?php

//xml
$ruta = "./ips.xml";
//si existe

if(file_exists($ruta)){
    //leer y ver si tengo que modificar y añadir
    $xmlsimple = simplexml_load_file($ruta);
    $XML = dom_import_simplexml($xmlsimple)->ownerDocument;
    $XML->formatOutput = true;
    //busca si has ips
    $ips =$XML->getElementByTagName("ip");
    $existeIP = false;
    foreach ($ips as $value) {
        # code...
        echo "Ip: " . $value->nodeValue. " veces: " . $value->getAttribute("veces") . " fechas: " . $value->getAttribute("fecha")."<br>";
        //si la ip se corresponde con la conexion suma la fecha y modifica la fecha
        if($_SERVER["REMOTE_ADDR"]==$value->nodeValue){
            $veces = $value->getAttribute("veces")+1;
            $value->setAttribute("veces",$veces);
            $value->setAttribute("fecha",date(DATE_RFC822));

        }
    }
    if(!existeIP){
        $raiz = $XML->firstChild;
        $conexion = $raiz->appendeChild($XML->createElement("Conexiones"));
        $ip = $XML->createElememt("ip",$_SERVER["REMOTE_ADDR"]);
    
        $ip->setAttribute("veces",1);
        $ip->setAttribute("fecha",date(DATE_RFC822));
        $conexion->appendChild($ip); 
    }
}else{
    //crear un xml y añadir la primera linea
    echo "No hay datos aun";
    $XML = new DOMDocumet("1.0","utf-8");
    $XML->formatOutput = true;
     
    //raiz
    $raiz = $XML->appendeChild($XML->createElement("Conexiones"));
    $conexion = $raiz->appendeChild($XML->createElement("Conexiones"));
    $ip = $XML->createElememt("ip",$_SERVER["REMOTE_ADDR"]);

    $ip->setAttribute("veces",1);
    $ip->setAttribute("fecha",date(DATE_RFC822));
    $conexion->appendChild($ip);
}

$XML->save( "./ips.xml");
?>