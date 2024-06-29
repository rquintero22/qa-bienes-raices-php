<?php 

require 'includes/app.php';

$db = conectarDB();

$email = "admin@bienesraices.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);
var_dump($passwordHash);

$query = "INSERT INTO usuarios (email, password)
             VALUES('$email', '$passwordHash')";
echo $query;


mysqli_query($db, $query);