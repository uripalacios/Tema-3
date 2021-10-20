<?php
//Recogo el  valor pasado por url
$lado=$_GET['lado'];
echo "El tamaño de la matriz introducido por el usuario es: " . $lado;
$matriz = array();
// Recorro el array
for($i = 0; $i < $lado; $i++)
{
$ultVal = 1;
// Por cada fila creo un array

$matriz[$i] = array();

for ($j=0; $j < $lado; $j++)
{
    // Si se encuentra en la primera fila...

    if(($j == 0)||($i == 0))
    {
        // Se establece el valor 1 por defecto
        $matriz[$i][$j] = 1;
    }
    // Si no...
    else
    {
        // Coge los valores anteriores
        $matriz[$i][$j] = $matriz[$i - 1][$j] + $matriz[$i][$j - 1];
    }
}
}
?>
<table>
<?php
echo "<br>";
foreach ($matriz as $key1 => $value1) {
      echo "<tr>";  
    foreach ($value1 as $key2 => $value2) {
        echo "<th> ".$value2." </th>";
    }
    echo"</tr>";
}




?>
</table>
<br>
<a href="codigo.php?paginaPHP=<?$pagina = basename($_SERVER['SCRIPT_FILENAME']);echo $pagina;?>">Ver el codigo</a>