<?php

    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'db_empresa'
    );

    if (isset($conn)){
        echo 'Conectado';
    }
    
?>