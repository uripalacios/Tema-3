<?php

    $expN="/^[A-Z][a-z]{2,}\s^[A-Z][a-z]{2,}\s^[A-Z][a-z]{2,}\s$/";
    $expE="/^[0-9]{2}[A-Z]{3}\/[0-9]{2}$/";

    function enviado(){
        if(isset($_REQUEST['Enviado'])){
            return true;
        }else 
            return false;
    }

    function vacioT($texto){
        if(empty($_REQUEST[$texto]))
            return true;
        else
            return false;
    }

    function select(){
        if(enviado())
            if($_REQUEST["curso"]=='no')
            return true;
    }

    function check(){
        if(isset($_REQUEST["enviado2"])){
            
        }
    }

    function recuerda($texto){
        if(enviado()){
            return $_REQUEST[$texto];
        }
    }

    function seleccionada($key){
        if(enviado()){
            
        }
    }
?>