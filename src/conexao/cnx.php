<?php

$hostname = "sql102.epizy.com";
$database = "epiz_31454920_rifadastico_2004";
$username = "epiz_31454920";
$password = "g23VzpiKkzp8Ae8";

if($conecta = mysqli_connect($hostname, $username, $password, $database)){
    echo 'Conectado ao banco de dados ✅ | nome do banco de dados'.$database
}else{
    echo 'Erro: '.mysqli_connect_error();
}