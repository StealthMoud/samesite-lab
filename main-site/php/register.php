<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Save user credentials in a basic JSON file (for simplicity)
    $usersFile = __DIR__ . '/users.json';
    $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

    if (isset($users[$username])) {
        echo "Username already exists. Please <a href='../public/register.html'>try again</a>.";
        exit;
    }

    $users[$username] = $password;
    file_put_contents($usersFile, json_encode($users));

    echo "Registration successful. Please <a href='../public/login.html'>login</a>.";
}
