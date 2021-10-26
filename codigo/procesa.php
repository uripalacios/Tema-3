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
        <h1>Formulario</h1>
    </header>
    <main>
        
        <?php
            require_once("./funcionesBonitas.php");
            //print_r($_POST);
            p("La variable de nombre es: ".$_POST['nombre']);
            p("La variable de password es: ".$_POST['pass']);
            p("El genero es: ".$_POST['genero']);
            p("El ciclo es: ".$_POST['ciclo']);
            p("Las aficiones son: ");
            foreach ($_POST['aficiones'] as $value) {
                p($value);
            }
        ?>

    </main>
    <br>
    <a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>
    <footer>&copy urielpalacios</footer> 

</body>
</html>