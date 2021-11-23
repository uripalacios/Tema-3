<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <style>
        *,
        input {
            margin: 10px;
        }
    </style>
    <?php
    $array = array(
        "1DAM" => array("ENDE", "BD", "LM", "SI", "FOL"),
        "2DAM" => array("DI", "SGE", "ACDA", "EIE", "PSP"),
        "2DAW" => array("DWES", "DWEC", "DIW", "EIE")
    );

    ?>
    <form action="./Examenhtml.php" method="post">
        <label for="nombre">Nombre y apellidos:</label> <input type="text" name="nombre" id="nombre" value="">
        <?php  if(vacioT("nombre"))
                    echo "Debe introducir un nombre";
                elseif(!vacioT("nombre"))
                    echo "Debe introducir un nombre";
        ?>
        <br> <label for="exp">Expediente</label> <input type="text" name="exp" id="exp" value="">
        <br> <label for="curso">Curso:</label> <select name="curso" id="curso">
            <option value="no">Selecione una opcion</option>
            <?php
                foreach ($array as $key => $value) {
                    # code...
                    echo "<option value='".$key."'>".$key."</option>";
                }
            ?>
        </select>
        <?php
            if($primeraValidacion){

                echo '<input type="hidden" name="curso" value="">';
                foreach ($array[$_REQUEST["curso"]] as $asig) {
                    echo "<input type='checkbox' name='asig[]'>".$asig;
                }
            }
        ?>
        <br><input type="submit" name="Enviado" value="Enviar">
    </form>



</body>

</html>