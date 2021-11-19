<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../webroot/css/style.css">
    <title>Ejercicio 1</title>
</head>
<body>   
    <h1>Ejercicio 1</h1>   
    <?php        
    $liga =
        array(
            "Zamora" =>  array(
                "Salamanca" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
                )
            ),
            "Salamanca" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
                )
            ),
            "Avila" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
                ),
                "Salamanca" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
                ),
                "Valladolid" => array(
                    "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
                )
            ),
            "Valladolid" =>  array(
                "Zamora" => array(
                    "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                ),
                "Salamanca" => array(
                    "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                ),
                "Avila" => array(
                    "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
                )
            ),
        );

        // Array para los equipos locales
        $equiposLocales = array();

        echo "<table border='1'>";
        echo "<thead>";
        echo "<td style='background-color: red;'><b>Equipos</b></td>";        
        
        
        foreach ($liga as $key => $value){
            array_push($equiposLocales,$key);        
            echo "<td><b>";
            // Fila de encabezado de equipos
            echo $key;
            echo"</b></td>";
        }
        echo "</thead>";

       
        //Crear la tabla
        foreach ($liga as $equipoLocal => $arrayVisitantes){            
            echo "<tr>";
            // Columna de encabezado equipos
            echo"<td><b>",$equipoLocal,"</b></td>" ;

            // Contador de posicion del equipo visitante
            $contvist = 0;
           
            foreach ($arrayVisitantes as $equipoVisitante => $datosPartido){
                if($equiposLocales[$pos] == $equipoLocal){
                    echo"<td>";
                    echo "</td>"; 
                }
                    echo"<td>";
                // Datos del partido
                foreach ($datosPartido as $variables => $value){
                    echo $value . "|";
                }
                echo "</td>" ;
                // incremento del contador por equipo visitante
                $contvist++;
            }
            echo "</tr>"; 
        }
        echo"</table>";
        echo "<br><br>";
        echo "<h2>Ejercicio 2</h2>";

        //Imprimo la fila de equipos
        echo "<table border='1'>";
        echo "<thead>";
        echo "<td><b>Equipos</b></td>";
        echo "<td><b>Puntos</b></td>";
        echo "<td><b>Goles a favor</b></td>";
        echo "<td><b>Goles en contra</b></td>";

        $equiposLocales = array();
        
        foreach ($liga as $key => $value){
             array_push($equiposLocales,$key);
         }
         echo "</thead>";

         foreach ($liga as $equipoLocal => $arrayVisitantes){
            echo "<tr>";
            echo"<td>",$equipoLocal,"</td>" ;
 
            $golesFavorEquipo[$equipoLocal] = 0;
            $golesContraEquipo[$equipoLocal] = 0;
            $puntosEquipo[$equipoLocal] = 0;

            $contvist= 0;
            //Para cada equipo visitante
            foreach ($arrayVisitantes as $equipoVisitante => $datosPartido){

            $golesFavorEquipo[$equipoVisitante] = 0;
            $golesContraEquipo[$equipoVisitante] = 0;
            $puntosEquipo[$equipoVisitante] = 0;
                    
            $array_datos = array();
                
            // Recorro los datos del partido
            foreach ($datosPartido as $variables => $value){
                array_push($array_datos,$value);
            }
            
            $cadenaDatos = $array_datos[0];

            $array_goles = explode("-",$cadenaDatos);

            $golAfavor = $array_goles[0];
            $golEnContra = $array_goles[1];

            $puntosLocal = 0;
            $puntosVisitante = 0;
            
            //Puntuaciones
            //Gana
            if($golAfavor > $golEnContra){
                $puntosLocal += 3;
                $puntosVisitante += 0;
            }
            //Empate
            elseif ($golAfavor == $golEnContra){
                $puntosLocal += 1;
                $puntosVisitante += 1;
            }
            //Pierde
            elseif ($golAfavor < $golEnContra){
                $puntosLocal += 0;
                $puntosVisitante += 3;
            }
            
            $golesFavorEquipo[$equipoLocal] += $golAfavor;
            $golesContraEquipo[$equipoLocal] += $golEnContra;
            $puntosEquipo[$equipoLocal] += $puntosLocal;
            $golesFavorEquipo[$equipoVisitante] += $golEnContra;
            $golesContraEquipo[$equipoVisitante] += $golAfavor;
            $puntosEquipo[$equipoVisitante] += $puntosVisitante;

            $contvist++;
                
            }

            $pos2 = 0;

            foreach ($arrayVisitantes as $equipoVisitante => $datosPartido){
                echo"<td>";
                if($pos2 == 0){
                    echo $puntosEquipo[$equipoLocal];
                }
                if($pos2 == 1){
                    echo $golesFavorEquipo[$equipoLocal];
                }
                if($pos2 == 2){
                    echo $golesContraEquipo[$equipoLocal];
                }
                echo "</td>";
                $pos2++;                
            }             
            echo "</tr>"; 
        }         
        echo"</table>"; 
    ?>

    <br>
    <a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>

</body>
</html>