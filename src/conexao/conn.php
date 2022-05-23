<?php

$hostname = "sql102.epizy.com";
$dbname = "epiz_31454920_rifadastico_2004";
$username = "epiz_31454920";
$password = "g23VzpiKkzp8Ae8";

try{
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo 'Error: '.$e->getMessage();
}