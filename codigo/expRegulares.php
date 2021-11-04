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

        ?>
    </main>
    <br>
    <a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>
    <footer>&copy urielpalacios</footer> 

</body>
</html>