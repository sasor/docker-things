<?php

$dns = 'mysql:host=db;dbname=test';
$user = 'root';
$password = 'root';  // same with MYSQL_ROOT_PASSWORD var defined in docker-compose.yml file.
$pdo = null;

try {
    $pdo = new PDO($dns, $user, $password);
    echo 'SUCCESS: Conectado';
} catch (PDOException $e) {
    die("ERROR: {$e->getMessage()}");
}
