<?php
require_once("./funcionesBonitas.php");

function validaFormulario(){
    if(isset($_POST['Enviado'])){
        p("El formulario ha sido enviado");
        compruebaAlfabetico();
        compruebaAlfanumerico();

        compruebaRadio();
        
        
        
        // if(!isset($_POST['aficiones'])){
        //     p("No ha elegido ninguna aficion");
        // }elseif(count($_POST['aficiones'])>3){
        //     p("Debe elegir como mucho 3");
        // }
    }
}

function compruebaAlfabetico(){
    if(!empty($_POST['alfabetico'])){
        p("El nombre es ".$_POST['alfabetico']);
    }
}

function compruebaAlfanumerico(){
    if(!empty($_POST['alfanumerico'])){
        p("El apellido es ".$_POST['alfanumerico']);
    }
}

function compruebaContraseña(){
    if(!empty($_POST['pass'])){
        p("La contraseña es ".$_POST['pass']);
    }
}

function compruebaRadio(){
    if(isset($_POST['radio'])){
        p("Ha elegido ".$_POST['radio']);
    }
}

function guardaAlfabetico(){
    if(isset($_POST['Enviado']) && !empty($_POST['alfabetico'])){
        echo $_POST['$alfabetico'];
      }
}

function incompletoAlfabetico(){
    if(isset($_POST['Enviado'])&&empty($_POST['alfabetico'])){
        echo "<label for='alfabetico' style='color:red;'>Debe introducir un nombre</label>";
    }
}

function guardaAlfanumerico(){
    if(isset($_POST['Enviado']) && !empty($_POST['alfanumerico'])){
        echo $_POST['alfanumerico'];
      }
}

function incompletoAlfanumerico(){
    if(isset($_POST['Enviado'])&&empty($_POST['alfanumerico'])){
        echo "<label for='alfanumerico' style='color:red;'>Debe introducir un apellido</label>";
    }
}

function incompletoCheck(){
    if(!isset($_POST['check'])){
        p("No ha elegido ninguna aficion");
    }elseif(count($_POST['aficiones'])>3){
        p("Debe elegir como mucho 3");
    }
}

function incompletoCombo(){
    if(isset($_POST['Enviado'])&&($_POST['ciclo']=="no")){
        echo "<label for='combo' style='color:red;'>Debe elegir una opcion</label>";
    }
}

?>