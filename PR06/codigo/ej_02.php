<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>
    
    <!-- Ejercicio 2 -->
    <h1>Ejercicio 2</h1>

    <!-- Enlace que accede a otra pagina php que muestra/imprime el codigo de la misma -->
    <!-- Incluir en todos los .php -->
    <a target="_blank" id="idVerCodigo" title="Vér el código PHP" href="codigoPHP.php?paginaPHP=<?
        $pagina = basename($_SERVER['SCRIPT_FILENAME']);
        echo $pagina;?>"
    >
        <img src="../img/icono_ver_codigo.png" alt="suu" width="35px" height="35px"></img>
    </a>

    <!-- Enunciado -->
    <h2>Genera otra table que sea clasificación.

        <ul>
            <li>De tal forma que, por partido ganado se sumará tres puntos y por partido empatado 1</li>
            <li>Goles a favor</li>
            <li>Goles en contra</li>
        </ul>
    </h2>

    <!-- PHP -->
    <?php

        // Creo el array
        $liga = array(

            // Zamora vs ...
            "Zamora" => array(

                // Salamanca
                "Salamanca" => array("Resultado" => "3-2","Tarj_Rojas" => 1,"Tarj_Amarillas" => 0,"Penaltis" => 0),

                // Ávila
                "Ávila" => array("Resultado" => "4-1","Tarj_Rojas" => 0,"Tarj_Amarillas" => 0,"Penaltis" => 0),

                // Valladolid
                "Valladolid" => array("Resultado" => "1-2","Tarj_Rojas" => 1,"Tarj_Amarillas" => 1,"Penaltis" => 1)

            ),

            // Salamanca vs ...
            "Salamanca" => array(

                // Zamora
                "Zamora" => array("Resultado" => "3-2","Tarj_Rojas" => 1,"Tarj_Amarillas" => 0,"Penaltis" => 0),

                // Ávila
                "Ávila" => array("Resultado" => "4-1","Tarj_Rojas" => 0,"Tarj_Amarillas" => 0,"Penaltis" => 0),

                // Valladolid
                "Valladolid" => array("Resultado" => "1-2","Tarj_Rojas" => 1,"Tarj_Amarillas" => 2,"Penaltis" => 1)

            ),

            // Ávila vs ...
            "Ávila" => array(

                // Zamora
                "Zamora" => array("Resultado" => "3-2","Tarj_Rojas" => 1,"Tarj_Amarillas" => 0,"Penaltis" => 2),

                // Salamanca
                "Salamanca" => array("Resultado" => "1-3","Tarj_Rojas" => 1,"Tarj_Amarillas" => 3,"Penaltis" => 0),

                // Valladolid
                "Valladolid" => array("Resultado" => "1-3","Tarj_Rojas" => 1,"Tarj_Amarillas" => 0,"Penaltis" => 1)

            ),

            // Valladolid vs ...
            "Valladolid" => array(

                // Zamora
                "Zamora" => array("Resultado" => "3-2","Tarj_Rojas" => 1,"Tarj_Amarillas" => 0,"Penaltis" => 0),

                // Salamanca
                "Salamanca" => array("Resultado" => "3-1","Tarj_Rojas" => 0,"Tarj_Amarillas" => 0,"Penaltis" => 0),

                // Ávila
                "Ávila" => array("Resultado" => "1-2","Tarj_Rojas" => 1,"Tarj_Amarillas" => 1,"Penaltis" => 2)

            )
        );

        // Imprimo la 1ª fila horizontal
        echo "<table border='1'";
        echo "<thead>";
        echo "<td><b>Equipos</b></td>";
        echo "<td><b>Puntos</b></td>";
        echo "<td><b>Goles a favor</b></td>";
        echo "<td><b>Goles en contra</b></td>";

        $equiposLocales = array();
        
         // Se recorre el array dinamicamente para crear la tabla
         foreach ($liga as $key => $value) 
         {
             // Se guarda cada equipo local en el array creado previamente
             array_push($equiposLocales,$key);
         }
 
         echo "</thead>";
 
        
         // Se recorre el array dinamicamente para crear la tabla
         // Por cada equipo local...
         foreach ($liga as $equipoLocal => $arrayVisitantes) 
         {
             
            echo "<tr>";
            // Muestro los equipos locales (fila vertical)
            echo"<td>",$equipoLocal,"</td>" ;
 

            // Datos
            $golesFavorEquipo[$equipoLocal] = 0;
            $golesContraEquipo[$equipoLocal] = 0;
            $puntosEquipo[$equipoLocal] = 0;

            // Contador de posicion del equipo visitante
            $pos = 0;
            
            // Por cada equipo visitante...
            foreach ($arrayVisitantes as $equipoVisitante => $datosPartido) 
            {

                $golesFavorEquipo[$equipoVisitante] = 0;
                $golesContraEquipo[$equipoVisitante] = 0;
                $puntosEquipo[$equipoVisitante] = 0;
                
                //echo"<td>";
                        
                // Array que contendrá todos los datos de un partido
                $array_datos = array();
                    
                // Recorro los datos del partido
                foreach ($datosPartido as $variables => $value) 
                {

                // Guardo los datos de este partido en el array
                    array_push($array_datos,$value);

                }
                
                //echo "</td>" ;

                // Guardo el resultado de este partido en una cadena
                $cadenaDatos = $array_datos[0];

                // Separo los goles de este partido
                $array_goles = explode("-",$cadenaDatos);

                $golAfavor = $array_goles[0];
                $golEnContra = $array_goles[1];

                $puntosLocal = 0;
                $puntosVisitante = 0;
                
                // Reparto de puntos
                // Si se gana...
                if($golAfavor > $golEnContra)
                {
                    $puntosLocal += 3;
                    $puntosVisitante += 0;
                }
                // Si se empata...
                elseif ($golAfavor == $golEnContra) 
                {
                    $puntosLocal += 1;
                    $puntosVisitante += 1;
                }
                // Si se pierde...
                elseif ($golAfavor < $golEnContra) 
                {
                    // No se hace nada (simplemente lo hago para entenderme)
                    $puntosLocal += 0;
                    $puntosVisitante += 3;
                }
                
                $golesFavorEquipo[$equipoLocal] += $golAfavor;
                $golesContraEquipo[$equipoLocal] += $golEnContra;
                $puntosEquipo[$equipoLocal] += $puntosLocal;

                $golesFavorEquipo[$equipoVisitante] += $golEnContra;
                $golesContraEquipo[$equipoVisitante] += $golAfavor;
                $puntosEquipo[$equipoVisitante] += $puntosVisitante;


                // Por cada equipo visitante, incremento el contador
                $pos++;
                
            }

            ///////

            $pos2 = 0;

            foreach ($arrayVisitantes as $equipoVisitante => $datosPartido) 
            {
            
                echo"<td>";

                if($pos2 == 0)
                {
                    echo $puntosEquipo[$equipoLocal];
                }

                if($pos2 == 1)
                {
                    echo $golesFavorEquipo[$equipoLocal];
                }
                        
                if($pos2 == 2)
                {
                    echo $golesContraEquipo[$equipoLocal];
                }

                echo "</td>" ;

                // Por cada equipo visitante, incremento el contador
                $pos2++;
                
            }
             
            echo "</tr>"; 
 
        }
         
        echo"</table>";

    ?>

    <!-- Footer informativo -->
    <footer>&copy Ismael Maestre</footer>

</body>
</html>