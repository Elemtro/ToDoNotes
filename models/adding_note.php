<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'db_connection.php';

    // Check if "taskInput" key exists in $_POST array
    if (isset($_POST["taskInput"])) {
        $text = htmlspecialchars($_POST["taskInput"]);

        // validate input
        if (empty($text)) {
            $errors['taskInput'] = 'Field is empty';
        }
    } else {
        $errors['taskInput'] = 'Input field is not set'; // Handle case where taskInput is not set
    }

    session_start();
    $user_id = $_SESSION['user_id'];

    if (count($errors) === 0) {
        $stmt = $pdo->prepare("INSERT INTO notes (note_id, user_id, data) VALUES (?, ?, ?)");
        $note_id = GenerateID();
        $stmt->execute([$note_id, $user_id, $text]);
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('errors' => $errors));
        exit;
    }
}

function GenerateID(){
    include 'db_connection.php';
    while (true) {
        $id = bin2hex(random_bytes(10));
        try {
            // Check if the generated ID already exists in the database
            $stmt = $pdo->prepare("SELECT note_id FROM notes WHERE note_id = ?");
            $stmt->execute([$id]);
            $existing_id = $stmt->fetchColumn();

            if (!$existing_id) {
                return $id; // Return the unique ID
            }
        } catch (PDOException $e) {
            // Handle query execution error
            error_log("Query execution failed: " . $e->getMessage());
            return false;
        }
    }
}