<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'db_connection.php';

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // validate email
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    } else if (strlen($email) > 100) {
        $errors['email'] = 'Too much characters, is your email really that big?';
    }
    // validate password
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } else if (strlen($password) < 6) {
        $errors['password'] = 'Password must be at least six characters long';
    } else if (strlen($password) > 50) {
        $errors['password'] = 'Password must be no more than fifty characters long';
    }
    // getting an email from database
    $stmt = $pdo->prepare("SELECT email FROM users WHERE email=?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() == 0) {
        $errors['email'] = 'This email is not registered';
    }

    if (count($errors) === 0) {
        $stmt = $pdo->prepare("SELECT password FROM users WHERE email=?");
        $stmt->execute([$email]);
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashed_password = $array['password'];
        if (!password_verify($password, $hashed_password)) {
            $errors['password'] = 'Incorrect password';
        }
    } 
    
    if (count($errors) === 0) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $id = $stmt->fetchColumn();

        session_start();
        $_SESSION['user_id'] = $id;
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('errors' => $errors));
        exit;
    }
}
