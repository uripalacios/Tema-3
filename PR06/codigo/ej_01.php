<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>

    <!-- Enlace al css -->
    <link rel="stylesheet" href="../webroot/css/style.css">

    <!-- @author - Ismael Maestre Carracedo  -->
</head>
<body>
    
    <!-- Ejercicio 1 -->
    <h1>Ejercicio 1</h1>

    <!-- Enlace que accede a otra pagina php que muestra/imprime el codigo de la misma -->
    <!-- Incluir en todos los .php -->
    <a target="_blank" id="idVerCodigo" title="Vér el código PHP" href="codigoPHP.php?paginaPHP=<?
        $pagina = basename($_SERVER['SCRIPT_FILENAME']);
        echo $pagina;?>"
    >
        <img src="../img/icono_ver_codigo.png" alt="suu" width="35px" height="35px"></img>
    </a>

    <!-- Enunciado -->
    <h2>Genera un array multidimensional y asociativo donde:

        <ul>
            <li>Los nombres de los equipos locales deben ser índices del array que contiene los
                subarrays con el equipo visitante y a su vez un subarray con:

                <ul>
                    <li>Resultado, roja, amarilla y penalti que son índices de los anterioes.</li>
                </ul>
            </li>
        </ul>

        <p>El script lo único que debe hacer es mostrar una tabla similar a la de abajo, recogiendo los
        datos del array multidimensional que habéis creado</p>
    </h2>

    <!-- PHP -->
    <?php

        // Creo el array manualmente
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

        /*
        // Imprimo el array
        echo '<pre>';
        print_r($liga);
        echo '<pre>';

        echo "<br><br><br>";
        echo "";
        */

        ////// SE CREA LA TABLA /////
        // Array que contendrá los equipos locales
        $equiposLocales = array();

        echo "<table border='1'>";
        echo "<thead>";
        echo "<td style='background-color: red;'><b>Equipos</b></td>";

        $equiposLocales = array();
        
        // Se recorre el array dinamicamente para crear la tabla
        foreach ($liga as $key => $value) 
        {
            // Se guarda cada equipo local en el array creado previamente
            array_push($equiposLocales,$key);

            //echo "<b>" . $key . "</b><br>";

            echo "<td><b>";
                    // Muestro los equipos locales (fila horizontal)
                    echo $key;
            echo"</b></td>";

        }

        echo "</thead>";

       
        // Se recorre el array dinamicamente para crear la tabla
        foreach ($liga as $equipoLocal => $arrayVisitantes) 
        {
            
            echo "<tr>";
                // Muestro los equipos locales (fila vertical)
                echo"<td><b>",$equipoLocal,"</b></td>" ;


            // Contador de posicion del equipo visitante
            $pos = 0;
           
            foreach ($arrayVisitantes as $equipoVisitante => $datosPartido) 
            {

                if($equiposLocales[$pos] == $equipoLocal)
                {
                    
                    echo"<td>";
                    echo "</td>"; 

                }
                    echo"<td>";
                    
                    
                $contadorDatos = 0;

                echo "<div style='text-align:center;'>";

                // Recorro los datos del partido
                foreach ($datosPartido as $variables => $value) 
                {

                    
                    if($contadorDatos == 0)
                    {
                        echo "<div style='display:block;background-color:green;';>";
                        echo $value . "";
                        echo "</div>";

                    }
                    else if($contadorDatos == 1)
                    {
                        echo "<div style='display:inline-block;background-color:red;padding:3%'>";
                        echo $value . "";
                        echo "</div>";
                    }
                    else if($contadorDatos == 2)
                    {
                        echo "<div style='display:inline-block;background-color:yellow;padding:3%'>";
                        echo $value . "";
                        echo "</div>";
                    }
                    else if($contadorDatos == 3)
                    {
                        echo "<div style='display:inline-block;background-color:orange;padding:3%'>";
                        echo $value . "";
                        echo "</div>";
                    }
                    
                    $contadorDatos++;
                }

                echo "</div>";

                echo "</td>" ;
                
                // Por cada equipo visitante, incremento el contador
                $pos++;
                
            }
            
            echo "</tr>"; 

        }
        
        echo"</table>";

        echo "<br><br>";


        ///  Se muestra todo sin ser tabla
        /*
        // Se recorre el array dinamicamente para crear la tabla
        foreach($liga as $key => $value) 
        {
            // Se guarda cada equipo local en el array creado previamente
            $equiposLocales[$key] = $value;

            echo "<b>" . $key . "</b><br>";

            $partidosLocal = array();

            // Recorro cada equipoLocal
            foreach ($liga[$key] as $clave => $valor) 
            {
                // Guardo los partidos (rivales) que tiene este local
                $partidosLocal[$clave] = $valor;

                echo "<i>" . $clave . "</i><br>";

                // Recorro los equipos visitantes de este equipo local
                foreach ($partidosLocal[$clave] as $key => $value) 
                {
                    echo "&nbsp;&nbsp;&nbsp;" . $key . ": " . $value . "<br>";
                }

                echo "<br>";

            }
            
        }
        */

        
 
    ?>

    <!-- Footer informativo -->
    <footer>&copy Ismael Maestre</footer>

</body>
</html>