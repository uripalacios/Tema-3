<?php
require_once("./funcionesBonitas.php");

function validaFormulario(){
    if(isset($_POST['Enviado'])){
        p("El formulario ha sido enviado");
        if(!empty($_POST['alfabetico'])){
            p("El nombre es ".$_POST['alfabetico']);
        }else{

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
        if(!isset($_POST['aficiones'])){
            p("No ha elegido ninguna aficion");
        }elseif(count($_POST['aficiones'])>3){
            p("Debe elegir como mucho 3");
        }
    }
}

?>