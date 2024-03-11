<?php
    $user = 'andrii';
    $password = 'hN1tD3cB5d';

    $pdo = new PDO(
    'mysql:host=127.0.0.1;port=3310;dbname=to_do_notes',
    $user,
    $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);