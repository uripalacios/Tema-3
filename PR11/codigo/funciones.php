<?php
// Función que comprueba si existe el fichero
function existeFichero($nombreFicheroYRuta)
{

    if(file_exists($nombreFicheroYRuta))
    {
        $correcto = true;
    }
    else
    {
        $correcto = false;
    }

    return $correcto;

}

// Funcion que imprime un mensaje de error en el caso de que no exista el fichero
function imprimeError($mensaje)
{
    ?>
    <label style="color:red;"><?php echo $mensaje ?></label>
    <?php
}

// Función que transforma el fichero 'notas.csv' y crea un fichero .xml (notas.xml)
function transformaFichero()
{
    // Fichero a leer
    $rutaFichero = "../ficheros/notas.csv";

    // Si no se puede abrir el fichero...
    if(!$ficheroNotas = fopen($rutaFichero,"r"))
    {
        imprimeError("Error al abrir el fichero.");

        // Cierro el fichero
        fclose($ficheroNotas);
    }
    // En caso contrario...
    else
    {

        // Contador de líneas/filas
        $contadorLineas = 0;

        // Array que contendrá las filas
        $arrayFilas = array();

        // Mientras lea una línea...
        while($linea = fgets($ficheroNotas, filesize($rutaFichero)))
        {

            // Array que contiene los valores de cada fila
            $arrayFila = explode(";",$linea);   // explode() para separar por ';'

            // Guardo cada fila en el arrayFilas
            for ($i = 0; $i < sizeof($arrayFila) ; $i++) 
            {     
                $arrayFilas[$contadorLineas][$i] = $arrayFila[$i];  
            }
            
            // Incremento el contador (nº de fila)
            $contadorLineas++;
        }

        // XML
        $xml = new DOMDocument("1.0", "utf-8");

        // Para que lo se formatee bonito el xml
        $xml->formatOutput = true;

        // Creo un objeto 'elemento' que será la etiqueta principal 
        $ElementoRaiz = $xml->createElement("Notas");

        // Le añado la raiz al dom
        $raiz = $xml->appendChild($ElementoRaiz);

        // Recorro el 'arrayFilas' , que contiene los datos del csv leído
        foreach($arrayFilas as $fila => $datosFila)
        {

            // Hijo -> Alumno
            $alumno = $xml->createElement('Alumno');
            $ElementoRaiz->appendChild($alumno);

            $contador = 0;
            
            foreach($datosFila as $celda => $dato)
            {
                // Le quito los espacios al dato (para evitar que forme mal la última etiqueta)
                $dato = trim($dato);

                if($contador == 0)
                {
                    $nombre = $xml->createElement("Nombre");
                    $texto = $xml->createTextNode(strval($dato));
                }
                else if($contador == 1)
                {
                    $nombre = $xml->createElement("Nota1");
                    $texto = $xml->createTextNode(strval($dato));
                }
                else if($contador == 2)
                {
                    $nombre = $xml->createElement("Nota2");
                    $texto = $xml->createTextNode(strval($dato));
                }
                else if($contador == 3)
                {
                    $nombre = $xml->createElement("Nota3");
                    $texto = $xml->createTextNode(strval($dato));
                }

                // Añado el texto al nodo
                $nombre->appendChild($texto);

                // Añado el nodo al alumno
                $alumno->appendChild($nombre);

                // Incremento el contador
                $contador++;
            }

        }
        
        // Se guarda (y crea) el fichero .xml
        $xml->save("../ficheros/notas.xml");

        // Cierro el fichero .csv
        fclose($ficheroNotas);
    }

}

// Función que muestra la tabla con las notas (leyendo 'notas.xml')
function muestraTabla()
{
    // Fichero a leer
    $rutaFichero = "../ficheros/notas.xml";

    // Compruebo que existe el fichero
    if(!existeFichero($rutaFichero))
    {
        imprimeError("El fichero adjuntado no existe");
    }
    else
    {

        // Si no se puede abrir el fichero...
        if(!$ficheroNotas = fopen($rutaFichero,"r"))
        {
            imprimeError("Error al abrir el fichero.");

            // Cierro el fichero
            fclose($ficheroNotas);
        }
        // En caso contrario...
        else
        {

            // Tabla
            echo "<table border='1'>";
            echo "<thead>";

            // Primera Fila
            echo "<td><b>Alumnos</b></td>";
            echo "<td><b>Nota 1ª evaluación</b></td>";
            echo "<td><b>Nota 2ª evaluación</b></td>";
            echo "<td><b>Nota 3ª evaluación</b></td>";
            echo "<td><b>Modificar la nota</b></td>";

            echo "</thead>";

            // Leo el XML //
            // Transforma el xml en un objeto de tipo simplexml
            $xml = simplexml_load_file($rutaFichero);

            // Lo recorro...
            // Por cada 'Alumno'
            foreach($xml as $alumno)
            {

                $alumno;

                echo "<tr>";

                // Recojo el nombre del alumno en cuestión
                $nombreAlumno = $alumno->children()[0];

                // Por cada dato del alumno
                foreach($alumno as $datos)
                {
                    //$nombreAlumno = $datos[0];
                    echo "<td>";
                    echo $datos;
                    echo "</td>";
                }

                echo "<td><a href='modificaFicheroXML.php?nombreAlumno=" . $nombreAlumno ."&nombreFichero=" . $rutaFichero . "' title='Edita las notas de " . $nombreAlumno . "'>Editar Notas</a></td>";
                echo "</tr>";
                
            }

        }

            // Fin de la tabla        
            echo"</table>";
            echo "<br><br>";

            // Cierro el fichero
            fclose($ficheroNotas);

    }
    
}

// Funcion que lee el fichero e imprime una determinada Nota
function leeNota($nombreAlumno,$numNota)
{

    // Fichero a leer
    $rutaFichero = $_REQUEST['nombreFichero'];

    // Compruebo que existe el fichero
    if(!existeFichero($rutaFichero))
    {
        imprimeError("El fichero adjuntado no existe");
    }
    else
    {

        // Si no se puede abrir el fichero...
        if(!$ficheroNotas = fopen($rutaFichero,"r"))
        {
            imprimeError("Error al abrir el fichero.");

            // Cierro el fichero
            fclose($ficheroNotas);
        }
        // En caso contrario...
        else
        {

            // Leo el XML //
            // Transforma el xml en un objeto de tipo simplexml
            $xml = simplexml_load_file($rutaFichero);

            // Lo recorro...
            // Por cada 'Alumno'
            foreach($xml as $alumno)
            {
                // Si el alumno que estoy buscando coincide con el actual...
                if($nombreAlumno == $alumno->children()[0])
                {
                    // Imprimo la nota en función de la solicitada
                    switch ($numNota) {
                        case 1:
                            echo $alumno->children()[1];
                            break;
    
                        case 2:
                            echo $alumno->children()[2];
                            break;
                    
                        case 3:
                            echo $alumno->children()[3];
                            break;
                    
                        default:
                            
                            break;
                    }
                }
                
            }

        }

        // Cierro el fichero
        fclose($ficheroNotas);

    }

}

?>