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

// Función que muestra la tabla de manera dinámica
function muestraTabla()
{
    // Fichero a leer
    $rutaFichero = "./notas.csv";

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

        // Contador de líneas/filas
        $contadorLineas = 0;

        // Array que contendrá las filas
        $arrayFilas;

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


        // Imprimo las filas
        // Por cada alumno...
        foreach($arrayFilas as $fila => $datos)
        {
            echo "<tr>";

            // Por cada par clave/valor de este alumno
            foreach($arrayFilas[$fila] as $clave => $valor)
            {
                // Si es la celda del nombre...
                if($clave == 0)
                {
                // Imprimo la celda en negrita    
                    echo "<td><b>" . $valor . "</b></td>";
                }
                else
                {
                    // Imprimo la celda normal
                    echo "<td>" . $valor . "</td>";

                }
                
            }

            // Celda con el enlace al que se le pasa el nombre del alumno en cuestion
            echo "<td><a href='editaNotas.php?nombreAlumno=" . $arrayFilas[$fila][0] ."' title='Edita las notas de " . $arrayFilas[$fila][0] . "'>Editar Notas</a></td>";
            echo "</tr>";

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
    $rutaFichero = "./notas.csv";

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
        $arrayFilas;

        // Mientras lea una línea...
        while($linea = fgets($ficheroNotas, filesize($rutaFichero)))
        {

            // Le quito el espacio (puede dar error en el ultimo elemento de la línea)
            $linea = trim($linea);

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


        // Imprimo las filas
        // Por cada alumno...
        foreach($arrayFilas as $fila => $datos)
        {
            //echo "<tr>";

            // Por cada par clave/valor de este alumno
            foreach($arrayFilas[$fila] as $clave => $valor)
            {


                // Si el el alumno que estoy buscando
                if($arrayFilas[$fila][0] == $nombreAlumno)
                {

                    // Imprimo la nota en funcion de la evaluacion que sea
                    if($clave == $numNota)
                    {
                        // Imprimo la nota
                        echo $valor;
                    }
                }


            }

            
        }

        // Cierro el fichero
        fclose($ficheroNotas);
    }

}

// Método que guarda las notas modificadas en el fichero
function modificaNotas()
{

    $rutaFicheroInicial = "./notas.csv";
    $rutaFicheroTemporal = "./ficheroTemporal.csv";

    // Fichero inicial
    if(!$ficheroInicial = fopen($rutaFicheroInicial,'r'))
    {
        echo "No se ha podido abrir el fchero";
        exit;
    }

    // Fichero temporal
    if(!$ficheroTemporal = fopen($rutaFicheroTemporal,'w'))
    {
        echo "No se ha podido abrir el fchero";
        exit;
    }

    // Mientras lea una línea...
    while($linea = fgets($ficheroInicial, filesize($rutaFicheroInicial)))
    {

        // Recojo la línea con los nuevos valores
        $lineaModificada = $_REQUEST['inputNombreAlumno'] . ";" . $_REQUEST['nota1'] . ";" . $_REQUEST['nota2'] . ";" . $_REQUEST['nota3'] . " ";

        $lineaAModificar = trim($linea);

        // Array que contiene los valores de cada fila
        $arrayFila = explode(";",$linea);   // explode() para separar por ';'

        // Si la linea en la que estoy es la de dicho alumno...
        if($_REQUEST['inputNombreAlumno'] == $arrayFila[0])
        {

            // Le quito el espacio (puede dar error en el ultimo elemento de la línea)
            $linea = $lineaModificada . "\n";
        }

        // Escribo la línea
        fwrite($ficheroTemporal,$linea,strlen($linea));

    }

    // Cierro los ficheros
    fclose(($ficheroInicial));
    fclose(($ficheroTemporal));

    // reemplazamos el fichero temporal por el incial
    // Para ello, primero borramos su contenido
    unlink($rutaFicheroInicial);

    // Se renombra
    rename($rutaFicheroTemporal,$rutaFicheroInicial);
}

?>