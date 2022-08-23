<?php

    session_start()

    session_destroy()

    $dados = array(
        'tipo' => 'success',
        'mesangem' => 'Sessão encerrada.'
    );

    echo json_decode($dados);