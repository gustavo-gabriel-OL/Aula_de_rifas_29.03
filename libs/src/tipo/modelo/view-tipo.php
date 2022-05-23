<?php
//inclusão do BD
include('../../conexao/conn.php');

//executo a recepção do id a ser buscado no banco
$ID = $_REQUEST['ID'];

//gero a query de consulta no BD
$sql = "SELECT * FROM TIPO WHERE ID = $ID";

//executar nossa query de consulta ao BD
$resultado = $pdo->query($sql);

//testar a minha consulta de BD
if($resultado){
    $dadosEixo = array();
    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
        $dadosEixo = array_map('utf8_encode', $row);
    }
    $dados = array(
        'tipo' => 'success',
        'mensagem' => '',
        'dados' => $dadosEixo
    );
} else{
    $dados = array(
        'tipo' => 'error',
        'mensagem' => 'Não foi possível obter o registro solicitado.',
        'dados' => array()
    );
}

echo json_encode($dados);