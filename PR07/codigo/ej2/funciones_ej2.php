<!-- FICHERO QUE CONTIENE LAS FUNCIONES -->

<!-- PHP -->
<?php

    // Funcion que genera números aleatorios en un array
    function generaAleatorioArray($array,$numMin,$numMax,$numValores,$repetirse)
    {


        // Si se pueden repetir
        if($repetirse == true)
        {
            for($i = 0; $i < $numValores; $i++)
            {  
                $aleatorio = generaAleatorio($numMin,$numMax);

                $array[$i] = $aleatorio;
            }
        }
        // Si no...
        else if($repetirse == false)
        {

            for($i = 0; $i < $numValores; $i++)
            {  
                // Si existe...
                if(isset($array[$i]))
                {

                }
                // Si no...
                else
                {

                }
                
                $aleatorio = generaAleatorio($numMin,$numMax);

                $array[$i] = $aleatorio;
            }

        }
        

        return $array;

    }

    // Función que devuelve un nº aleatorio entre 0 y el valor dado
    function generaAleatorio($min,$max)
    {
        return rand($min,$max);
    }

    // Funcion que comprueba si un valor está repetido en un array
    function compruebaRepe($valor, $array)
    {


    }

?>
