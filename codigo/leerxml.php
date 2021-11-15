<?php
    $rutafichero = "./ficheros/ficheroXML.xml";

    if(file_exists($rutafichero)){
        //Transforma el xml en un objeto de tipo simplexml
        $xml = simplexml_load_file($rutafichero);
        echo "<pre>";
        print_r($xml);
        echo "</pre>";

    }else{
        exit;
    }

    foreach($xml as $departamento){
        echo "Codigo: " . $departamento->children()[0]
        .": Descripcion : ".$departamento->children()[1];
    }

    echo "<br>";
    echo "<br>";
    echo "<br>";

    foreach($xml as $departamento){
        echo "Codigo: " . $departamento->children()[0]
        .": Descripcion : ".$departamento->children()[1],
        "<br>Profesor:";
        foreach($departamento->children()[2] as $profesores)
        echo "<br>". $profesores;
    }

    $rutafichero2 = "./ficheros/ficheroXML2.xml";

    if(file_exists($rutafichero2)){
        //Transforma el xml en un objeto de tipo simplexml
        $xml2 = simplexml_load_file($rutafichero2);
        echo "<pre>";
        print_r($xml2);
        echo "</pre>";

    }else{
        exit;
    }    
    echo "<br>";
    echo "<br>";
    echo "<br>";

    foreach($xml2 as $departamento){
        echo "Codigo: " . $departamento->children()[0]
        .": Descripcion : ".$departamento->children()[1],
        "<br>Profesor:";
        foreach($departamento->children()[2] as $profesor)
        echo "<br>id: ".$profesor['id']." nombre:". $profesor;
    }
?>