<?php
$servidor="localhost"; // la ip del servidor
$basededato="cementerio";
$usuario="root";
$contraseña="";

try{
    $conexion=new PDO("mysql:host=$servidor;dbname=$basededato",$usuario,$contraseña);
}catch(Exception $ex){
    echo $ex-> getMessage();
}
?>