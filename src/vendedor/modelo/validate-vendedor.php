<?php

    session_start();

    echo $_SESSION['NOME'];

    if(!isset($_SESSION['NOME']) && !isset($_SESSION['TIPO'])){

        $dados = array(
            'tipo' => 'error',
            'mensagem' => 'Você não está autenticado.'
        );

    }else{
        $dados = array(
            'tipo' => 'success',
            'mensagem' => 'Seja bem vindo'.$_SESSION ['NOME']
        );
    }

    echo json_encode($dados);