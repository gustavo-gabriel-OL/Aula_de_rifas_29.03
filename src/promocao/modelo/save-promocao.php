<?php

include('../../conexao/conn.php');

$requestData = $_REQUEST;

if(empty($requestData['TITULO'])){
    $dados = array(
        "tipo" => 'error',
        "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
    );
} else {
    $ID = isset($requestData['ID']) ? $requestData['ID'] : '';
    $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

    if($operacao == 'insert'){
        try{
            $stmt = $pdo->prepare('INSERT INTO PROMOCAO (TITULO, DESCRICAO, DATA_INICIO, DATA_FIM, DATA_SORTEIO, VALOR_RIFA) VALUES (:a, :b, :c, :d, :e, :f)');
            $stmt->execute(array(
                // ':a' => utf8_decode($requestData['TITULO'])
                ':a' => $requestData['TITULO'],
                ':b' => $requestData['DESCRICAO'],
                ':c' => $requestData['DATA_INICIO'],
                ':d' => $requestData['DATA_FIM'],
                ':e' => $requestData['DATA_SORTEIO'],
                ':f' => $requestData['VALOR_RIFA']
            ));
            $dados = array(
                "tipo" => 'success',
                "mensagem" => 'Registro salvo com sucesso.'
            );
        } catch(PDOException $e) {
            $dados = array(
                "tipo" => 'error',
                "mensagem" => 'Não foi possível efetuar o cadastro do curso.'
            );
        }
    } else {
        try{
            $stmt = $pdo->prepare('UPDATE PROMOCAO SET TITULO = :a, DESCRICAO = :b, DATA_INICIO = :c, DATA_FIM = :d, DATA_SORTEIO = :e, VALOR_RIFA = :f WHERE ID = :id');
            $stmt->execute(array(
                ':id' => $ID,
                // ':a' => utf8_decode($requestData['TITULO'])
                ':a' => $requestData['TITULO'],
                ':b' => $requestData['DESCRICAO'],
                ':c' => $requestData['DATA_INICIO'],
                ':d' => $requestData['DATA_FIM'],
                ':e' => $requestData['DATA_SORTEIO'],
                ':f' => $requestData['VALOR_RIFA']
            ));
            $dados = array(
                "tipo" => 'success',
                "mensagem" => 'Registro atualizado com sucesso.'
            );
        } catch (PDOException $e){
            $dados = array(
                "tipo" => 'error',
                "mensagem" => 'Não foi possível efetuar a alteração do registro.'
            );
        }
    }
}

    echo json_encode($dados);