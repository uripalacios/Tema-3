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
            <h1>Editar</h1>        
        </header>
        <main>
            <form action="EligeFichero.php" method="post">
                <input type="hidden" name="fi" value="<?php echo $_REQUEST['fi']?>">
                <label for="fi">Contenido de fichero:</label>    
                <br>            
                <textarea name="texto" id="texto" cols="30" rows="10" value=""></textarea>
                <br>
                <input type="submit" name="boton" value="Editar">
                <a href="EligeFichero.php">Volver</a>                
            </form>
        </main>
        <?php
            $rutaArchivo = "./ficheros/".$_REQUEST['fi'];
            $rutaficheroTemp = "./ficheros/temp.txt";
            $ftemp = $_REQUEST['texto'];
            fwrite($rutaficheroTemp,$ftemp,strlen($ftemp));

            if(!$finicial = fopen($rutaArchivo,'r'))
            {
                echo "Ha habido un error al abrir el fichero";
                exit;
            }

            if(!$ftemp = fopen($rutaficheroTemp,'w'))
            {
                echo "Ha habido un error al abrir el fichero";
                exit;
            }

            fclose($finicial);
            fclose($ftemp);
            
            unlink($rutaArchivo);//borrar archivo
            rename($rutaficheroTemp,$rutaArchivo);

            // if($_REQUEST['boton'] == 'Editar'){
            //     header('Location: Editar.php');
            // }  
        ?>
    </body> 
</html> 