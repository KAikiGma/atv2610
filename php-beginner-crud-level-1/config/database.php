<?php
// used to connect to the database
// usado para conectar no banco de dados
$host = "localhost";
$db_name = "php-beginner-crud-level-1";
$username = "root";
$password = "";
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
// show error
// mostrar erros
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>