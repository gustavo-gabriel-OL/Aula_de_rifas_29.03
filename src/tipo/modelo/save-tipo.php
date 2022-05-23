<?php 

    //obter a conexão com o banco de dados
    include('../../conexao/conn.php');

    //obter os dados enviados do formulário enviado via $_REQUEST
    $requestData = $_REQUEST;

    //verificação de campos obrigatórios do formulário
    if(empty($requestData['NOME'])){
        //caso a variável venha vazia, retorno de erro:
        $dados = array(
            "tipo" => 'error',
            "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
        )
    } else {
        //caso não exista campo em vazio, vamos gerar a requisição
        $ID = isset($requestData['ID']) ? $requestData['ID'] : '';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao']: '';

        //verifica se é para cadastra um novo registro
        if($operacao == 'insert'){
            //prepara o comando INSERT para ser executado
            try{
                $stmt = $pdo->prepare('INSERT INTO TIPO (NOME) VALUES (:a)');
                $tmt->execute(array(
                    ':a' => utf8_decode($requestData['NOME'])
                ));
                $dados = array(
                    "tipo" => 'success',
                    "mensagem" => 'Registro salvo com sucesso.'
                );
            } catch(PDOException $e){
                $dados = array(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível efetuar o cadastro do curso.'
                );
            }
        } else{
            //Se minha variável opereção estiver vazia então devo gerar os scripts de update
            try{
                $stmt = $pdo->prepare('UPDATE TIPO SET NOME = :a WHERE ID = :id');
                $stmt->execute(array(
                    ':id' => $ID,
                    ':a' => utf8_decode($requestData['NOME'])

                ));

            } catch (PDOException $e){
                $dados = arry(
                    "tipo" => 'error',
                    "mensagem" => 'Não foi possível efetuar a alteração do registro.'
                );
            }
        }
    }

    //converter um array ded dados para a representação JSON
    echo json_encode($dados);
?>