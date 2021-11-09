<?php
function validaNombre(){
    $nombre = $_POST['alfabetico'];
    $exp = '/\D{3-50}/';
    preg_match($exp,"$nombre");
}


?>