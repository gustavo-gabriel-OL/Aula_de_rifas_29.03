<?php

$hostname = "sql102.epizy.com";
$dbname = "epiz_31454090_rifas";
$username = "epiz_31454090";
$password = "qsG94BDEfCk";

try{
    $pdo = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo 'Error: '.$e->getMessage();
}