<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'db_connection.php';

    if (isset($_POST['note_id'])) {
        $note_id = $_POST['note_id'];

        $stmt = $pdo->prepare("DELETE FROM notes WHERE note_id = ?");
        $stmt->execute([$note_id]);
        exit;
    } 
}
