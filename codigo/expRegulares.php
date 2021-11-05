<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3</title>
</head>
<body>
    <header>
        <h1>Tema 3</h1>
    </header>
    <main>
        <?php
             require_once("./funcionesBonitas.php");
            $patron = '/maria/';
            //coincidencia de patron.
            echo preg_match($patron,"maria es mi profe favorita");
            br();
            echo preg_match($patron,"Hola que tal");
            br();

            p("Punto comodin");
            $exp = '/log./';
            //coincidencia de patron.
            echo preg_match($exp,"log");
            br();
            echo preg_match($exp,"log3");
            br();
            echo preg_match($exp,"log11");
            br();
            echo preg_match($exp,"loga");
            br();

            p("\ especial probar \s espacio");
            $exp = '/a\sa/';
            //coincidencia de patron.
            echo preg_match($exp,"maria a casa");
            br();
            echo preg_match($exp,"aa");
            br();

            p("\ especial probar \. punto");
            $exp = '/a\.a/';
            //coincidencia de patron.
            echo preg_match($exp,"maria a casa");
            br();
            echo preg_match($exp,"a.a");
            br();
            
            p("Conjuntos [ ]");
            $exp = '/[abcd][xyz]/';
            //coincidencia de patron.
            echo preg_match($exp,"ax");
            br();
            echo preg_match($exp,"aa");
            br();
            echo preg_match($exp,"dz");
            br();
            echo preg_match($exp,"d z");
            br();

            p(" | or Me vale noviembre en ingles y en español");
            $exp = '/Nov(iembre|ember)/';
            //coincidencia de patron.
            echo preg_match($exp,"Nov");
            br();
            echo preg_match($exp,"Noviembre");
            br();
            echo preg_match($exp,"November");
            br();

            p(" $ es el final del string");
            $exp = '/21$/';
            //coincidencia de patron.
            echo preg_match($exp,"10/12/2021");
            br();
            echo preg_match($exp,"21/12/20");
            br();
            
            p("^ es el principio de string Ej nº IBAN");
            $exp = '/^ES/';
            //coincidencia de patron.
            echo preg_match($exp,"6542 6542 6542 6525");
            br();
            echo preg_match($exp,"ES52 3353 6643 6543");
            br();

            p("^ Tambien sirve para que no contenga si esta dentro de corchetes");
            $exp = '/log[^AS]/';
            //coincidencia de patron.
            echo preg_match($exp,"log ");
            br();
            echo preg_match($exp,"loga");
            br();
            echo preg_match($exp,"logA");
            br();
            echo preg_match($exp,"logs");
            br();

            p("Buscar cualquiera de las etiquetas de cierre html");
            //tambien se podria hacer de la siguiente manera con conjuntos
            $exp = '/<\/([a-z][0-9])+>/';
            $exp = '/<\/(.)+>/';//la "\" es para decir que es caractar especial y no nos cierre antes de tiempo el contenido a buscar
            //tambien se podria hacer de la siguiente manera con conjuntos
            //$exp = '/<\/([a-z][0-9])+>/';
            //coincidencia de patron.
            echo preg_match($exp,"<h1>Tema 3</h1>");
            br();

            p("Buscar cualquiera de las etiquetas de cierre html y mostrarlas en array");
            $exp = '/<\/([a-z]+[0-9]?)+>/';
            //la primera parte del array no sabemos porque devuelve eso lo explica el proximo dia
            //en la segunda se muestra las coincidencias con el patron
            preg_match_all($exp,
            "<h1>Tema 3</h1>
            <p>Tema 3</p>
            <i>Tema 3</i>
            <p>Tema 3</p>",
            $array);
            echo "<pre>";
            print_r($array);
            echo "</pre>";
            br();

            p("buscar coincidencias y cuales son");
            $exp = '/a./';
            preg_match_all($exp,"abc aj al",
            $array);
            echo "<pre>";
            print_r($array);
            echo "</pre>";
            br();

            p("Numero de cuenta valido");
            //con los corchetes expecificamos el numero de numeros en este caso que 
            //obligatoriamente tiene que tener
            $exp = '/^ES[0-9]{2}\s[0-9]{4}\s[0-9]{4}\s[0-9]{2}\s[0-9]{10}/';
            echo preg_match($exp,"ES87 4251 3285 21 1324567895");
            br();
            echo preg_match($exp,"ES87 4251 3285 2851 1324567895");            
            br();

            p("Numeros validos desde el 0 al 999");
            $exp = '/^[0-9]{1,3}$/';
            echo preg_match($exp,"9999");
            br();
            echo preg_match($exp,"99");            
            br();
            echo preg_match($exp,"");            
            br();

            p("Para sustituir[0-9] y [a-z]");
            // d cualquier numero
            // D cualquier letra

            $exp = '/D/';
            echo preg_match($exp,"1");
            br();
            echo preg_match($exp,"b3");            
            br();
            echo preg_match($exp,"1B");            
            br();
        ?>
    </main>
    <br>
    <a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>
    <footer>&copy urielpalacios</footer> 

</body>
</html>