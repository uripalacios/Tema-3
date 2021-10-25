<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR07</title>
</head>
<body>
    <header>
        <h1>Funciones</h1>
    </header>
    <main>
   
       
        <p>1.Crea tu propio fichero de php que tenga las funciones de:</p>
        <ol type="a">
            <li>br() Pinta un br</li>
            <li>h1(cadena) Pinta la cadena entre dos h1</li>
            <li>p(cadena) Pinta la cadena entre cadenas</li>
            <li>self() Devuelve el fichero actual</li>
            <li>letraDni() Se introduce el dni y devuelve la letra que le corresponde</li>
            <li>Realiza una página que utilice estas funciones</li>
        
        </ol>

    <?php
        require_once("./funcionesBonitas.php");
        echo "A continuacion usamos la funcion br en 3 ocasiones";
        br();
        br();
        br();
        echo "Funcion que me imprime en h1";
        

    ?>
    
    </main>
    <footer>&copy urielpalacios</footer> 

</body>
</html>