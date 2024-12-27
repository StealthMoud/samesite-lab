<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    $usersFile = __DIR__ . '/users.json';
    $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

    if (!isset($users[$username]) || !password_verify($password, $users[$username])) {
        echo "Invalid credentials. Please <a href='../public/login.html'>try again</a>.";
        exit;
    }

    $_SESSION['username'] = $username;

    // Set PHPSESSID cookie
    setcookie(session_name(), session_id(), [
        'expires' => 0,
        'path' => '/',
        'httponly' => false,
        'samesite' => 'Lax',
    ]);

    header('Location: /public/index.html');
    exit;
}