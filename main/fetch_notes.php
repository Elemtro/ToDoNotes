<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../log_in/log_in.php");
        exit;
    }

    include_once "../models/db_connection.php";

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT note_id, data, date FROM notes WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($notes);
