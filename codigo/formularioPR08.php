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
        <h1>Formulario de Registro</h1>        
    </header>
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="formulario" enctype="multipart/form-data">
            <label for="alfabetico">Alfabetico</label>
            <input type="text" name="alfabetico" id="alfabetico" placeholder="Nombre">
            <br>
            <label for="alfabeticoOpcional">Alfabetico Opcional</label>
            <input type="text" name="alfabeticoOpcional" id="alfabeticoOpcional" placeholder="Nombre">
            <br>
            <label for="alfanumerico">Alfanumerico</label>
            <input type="text" name="alfanumerico" id="alfanumerico" placeholder="Apellido">
            <br>
            <label for="alfanumericoOpcional">Alfanumerico Opcional</label>
            <input type="text" name="alfanumericoOpcional" id="alfanumericoOpcional" placeholder="Apellido">
            <br>
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha">
            <br>
            <label for="fechaOpcional">Fecha Opcional</label>
            <input type="date" name="fechaOpcional" id="fechaOpcional">
            <br>
            <label>Radio Obligatorio:</label>
            <br>
            <input type="radio" name="radio" id="opcion1" value="opcion1"><label for="opcion1">Opcion1</label>
            <input type="radio" name="radio" id="opcion2" value="opcion2"><label for="opcion2">Opcion2</label>
            <input type="radio" name="radio" id="opcion3" value="opcion3"><label for="opcion3">Opcion3</label>
            <br>
            <label for="combo">Elige una opcion: </label>
            <select name="combo" id="combo">
                <option value="no">Seleccione</option>
                <option value="combo1">combo1</option>
                <option value="combo2">combo2</option>
            </select>
            <br>
            <label>Elige al menos 1 y maximo 3: </label>
            <br>
            <input type="checkbox" name="check[]" id="check1" value="check1">
            <label for="check1">check1</label>
            <input type="checkbox" name="check[]" id="check2" value="check2">
            <label for="check2">check2</label>
            <input type="checkbox" name="check[]" id="check3" value="check3">
            <label for="check3">check3</label>
            <input type="checkbox" name="check[]" id="check4" value="check4">
            <label for="check4">check4</label>
            <input type="checkbox" name="check[]" id="check5" value="check5">
            <label for="check5">check5</label>
            <input type="checkbox" name="check[]" id="check6" value="check6">
            <label for="check6">check6</label>
            <br>
            <br>
            <label for="telefono">Nº Telefono</label>
            <input type="tel" name="telefono" id="telefono" placeholder="654987321">
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <br>
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="pass">
            <br>
            <label for="archivo">Subir documento</label>
            <input type="file" name="archivo" id="archivo">
            <br>
            <br>
            <input type="submit" value="Enviar" class="btn btn-danger">
        </form>
    </main>    