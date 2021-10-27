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
        <h2>Autovalidado</h2>
    </header>
    <main>
        <?php
            require_once("./funcionesBonitas.php");
            //1º opcion ver si hay algo en $_POST
            // if(count($_POST)>0)
            // {
            //     p("El formulario ha sido enviado");
            // }
            if(isset($_POST['Enviado'])){
                p("El formulario ha sido enviado");
                if(!empty($_POST['nombre'])){
                    p("El nombre es ".$_POST['nombre']);
                }
                if(!empty($_POST['pass'])){
                    p("La contraseña es ".$_POST['pass']);
                }
                if(isset($_POST['genero'])){
                    p("Ha pulsado el genero ".$_POST['genero']);
                }
                if($_POST['ciclo']=="no"){
                    p("Debe seleccionar un ciclo");
                }
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
            <br>
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="pass">
            <br>
            <label>Genero:</label>
            <input type="radio" name="genero" id="masculino" value="masculino"><label for="masculino">masculino</label>
            <input type="radio" name="genero" id="femenino" value="femenino"><label for="femenino">femenino</label>
            <br>
            <label for="ciclo">Ciclo: </label>
            <select name="ciclo" id="ciclo">
                <option value="no">Selecciona una opcion</option>
                <option value="DAM">DAM</option>
                <option value="DAW">DAW</option>
            </select>
            <br>
            <label>Aficiones: </label>
            <input type="checkbox" name="aficiones[]" id="futbol" value="futbol">
            <label for="futbol">futbol</label>
            <input type="checkbox" name="aficiones[]" id="bar" value="bar">
            <label for="bar">bar</label>
            <input type="checkbox" name="aficiones[]" id="padel" value="padel">
            <label for="padel">padel</label>
            <input type="checkbox" name="aficiones[]" id="dormir" value="dormir">
            <label for="dormir">dormir</label>
            <br>
            <input type="submit" value="Enviar" name="Enviado">
            <input type="reset" value="Limpiar">
        </form>
    </main>
    <br>
    <a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>
    <footer>&copy urielpalacios</footer> 

</body>
</html>