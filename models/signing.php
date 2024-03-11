<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'db_connection.php';

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm = trim($_POST["confirm"]);
    
    // validate email
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    } else if (strlen($email) > 100) {
        $errors['email'] = 'Too much characters, is your email really that big?';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } else if (strlen($password) < 6) {
        $errors['password'] = 'Password must be at least six characters long';
    } else if (strlen($password) > 50){
        $errors['password'] = 'Password must be no more than fifty characters long';
    } else if (!preg_match('/^[a-zA-Z0-9!@#$%^&*()\-_=+{};:,<.>\/?~]*$/', $password)) {
        $errors['password'] = 'Password must contain only English letters, numbers, and special characters';
    }

    if (empty($confirm)) {
        $errors['confirm'] = 'Password confirmation is required';
    } else if ($confirm !== $password) {
        $errors['confirm'] = 'Password do not match. Please re-enter';
    }

    $stmt = $pdo->prepare("SELECT email FROM users WHERE email=?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0){
        $errors['email'] = 'This email is already registered. Please use a different email';
    }

    if (count($errors) === 0) {
        $stmt = $pdo->prepare("INSERT INTO users (id, email, password) VALUES (?, ?, ?)");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $id = GenerateID();
        $stmt->execute([$id, $email, $hashed_password]);
        exit;
    }
    else
    {
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
            $stmt = $pdo->prepare("SELECT id FROM users WHERE id = ?");
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
