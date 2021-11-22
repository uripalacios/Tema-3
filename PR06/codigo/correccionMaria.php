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
?>
<table class="table-bordered">

    <?php
    $equipos = array();
    $contador = 0;
    //Genera la cabecera de equipos que juegan
    foreach ($liga as $equipol => $value) {
        $equipos[$contador] = $equipol;
        $contador++;
    }
    //var_dump($equipos);


    echo "<tr>";
    echo "<td class = 'equi rojo '> Equipos </td>";
    //Escribe la cabecera
    foreach ($equipos as $equiposl) {
        echo "<td class = 'equi'>" . $equiposl . "</td>";
    }
    echo "</tr>";
    $contador = 0;
    foreach ($liga as $equipol => $value) {
        echo "<tr>";
        echo "<td class = 'equi'>" . $equipol . "</td>";

        foreach ($value as $equipov => $valor) {

            if ($equipos[$contador] == $equipol) {
                //echo "<td>".$equipos[$contador]."vs".$equipol. "</td>";     
                echo "<td></td>";
            }

            echo "<td>";
            //echo $equipol."vs".$equipov;
            foreach ($valor as $dato => $numero) {
                switch ($dato) {
                    case "Resultado":
                        echo "<p class='verde'>" .  $numero . "</p>";
                        break;
                    case "Roja":
                        echo "<p><span class='rojo'>" .  $numero . "</span> ";
                        break;
                    case "Amarilla":
                        echo "<span class='amarillo'>" .  $numero . "</span> ";
                        break;
                    case "Penalti":
                        echo "<span class='naranja'>" .  $numero . "</span></p> ";
                        break;
                }
            }
            echo "</td>";
            $contador++;
        }
        //echo "<td>" . $equipos[$contador]. "</td>";
        $contador = 0;
        if ($equipol == $equipos[3])
            echo "<td></td>";
        echo "</tr>";
    }


    //iniciamos el array
    $resultados = array();
    foreach ($liga as $equipolocal => $arraysecundario) {
        $resultados[$equipolocal] = array();
        $resultados[$equipolocal]["Puntos"] = 0;
        $resultados[$equipolocal]["Favor"] = 0;
        $resultados[$equipolocal]["Contra"] = 0;
        //for y crear puntos, favor, contra
    };
    echo "<pre>";
    print_r($resultados);
    echo "</pre>";

    foreach ($liga as $equipolocal => $arraysecundario) {
        foreach ($arraysecundario as $visitante => $valores) {
            $datos = explode("-", $valores["Resultado"]);


            if ($datos[0] > $datos[1])
                //añado a local 3 puntos
                $resultados[$equipolocal]["Puntos"] += 3;
            elseif ($datos[0] == $datos[1]) {
                $resultados[$equipolocal]["Puntos"] += 1;
                $resultados[$visitante]["Puntos"] += 1;
            } else
                $resultados[$visitante]["Puntos"] += 3;

            //local suma datos0 y visitante datos1 a favor 
            // contra al contrario
            $resultados[$equipolocal]["Favor"] += $datos[0];
            $resultados[$equipolocal]["Contra"] += $datos[1];
            $resultados[$visitante]["Favor"] += $datos[1];
            $resultados[$visitante]["Contra"] += $datos[0];
        }
    };

    echo "<pre>";
    print_r($resultados);
    echo "</pre>";



    ?>

    <table border="1">
        <thead>
            <th>Equipo</th>
            <th>Puntos</th>
            <th>Favor</th>
            <th>Contra</th>
        </thead>
        <tbody>
            <?php
            foreach ($resultados as $key => $value) {
                echo "<tr>";
                echo "<td>";
                echo $key;
                echo "</td>";
                foreach ($value as $dato) {
                    echo "<td>";
                    echo $dato;
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>