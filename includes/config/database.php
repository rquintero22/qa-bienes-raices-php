<?php 

function conectarDB(): mysqli {
    $db = new mysqli('localhost', 'root', '', 'bienesraices');

    if (!$db) {
        echo 'Error al conectar al servidor';
        exit;
    } 
    
    return $db;
}