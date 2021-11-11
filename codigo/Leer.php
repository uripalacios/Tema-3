<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Tema 3</title>
    </head>
    <body>
        <header>
            <h1>Lectura</h1>        
        </header>
        <main>
            <form action="EligeFichero.php" method="post">
                <input type="hidden" name="">
                <label for="fi">Contenido de fichero:</label>    
                <br>            
                <textarea name="fi" id="fi" cols="30" rows="10"></textarea>
                <br>
                <input type="submit" name="boton" value="Modificar">                
            </form>
        </main>
        <?php

       /*     if(sizeof($_REQUEST) > 0){
                if($_REQUEST['boton'] == 'Editar'){
                    header('Location: Editar.php?fi='.$_REQUEST['fi']);
                }
                if($_REQUEST['boton'] == 'Leer'){
                    header('Location: Leer.php?fi='.$_REQUEST['fi']);
                }
            }*/
        ?>
    </body> 
</html> 