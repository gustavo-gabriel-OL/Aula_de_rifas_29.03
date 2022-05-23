<?php
//inclusão do BD
include('../../conexao/conn.php');

//coleta do id a ser excluído no banco de dados que esstá sendo enviado pelo FORM
$ID = $_REQUEST['ID'];

//gero a query para interação com o BD
$sql = "DELETE FROM TIPO WHERE ID = $ID";

//executar nossa query 
$resultado = $pdo->query($sql);

//testar o retorno do resultado da nossa query
if($resultado){
    $dados = array(
        'tipo' => 'success',
        'mensagem' => 'Registro excluído com sucesso!'
    );
} else{
    $dados = array(
        'tipo' => 'error',
        'mensagem' => 'Não foi possível excluir o registro.',
    );
}

echo json_encode($dados);