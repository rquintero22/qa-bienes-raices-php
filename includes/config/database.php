<?php 

function conectarDB(): mysqli {
    $db = mysqli_connect('localhost', 'root', '', 'bienesraices');

    if (!$db) {
        echo 'Error al conectar al servidor';
        exit;
    } 
    
    return $db;
}