<?php

$dbuser = "root";
$dbpass = "";
$dns = "mysql:dbname=teste;host=localhost";

try {
    $pdo = new PDO($dns, $dbuser, $dbpass);
    //echo "conectado";
} catch (PDOException $e) {
    echo "Falied: ".$e->getMessage(); exit;
}

?>