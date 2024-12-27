<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $samesite = isset($_POST['samesite']) ? $_POST['samesite'] : 'None';
    $cookieOptions = [
        'expires' => time() + 86400,
        'path' => '/',
        'secure' => false,
        'httponly' => false,
        'samesite' => $samesite,
    ];
    setcookie('user', 'stealthmoud', $cookieOptions);
    echo "Cookie set with SameSite=$samesite.";
} elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
    setcookie('user', '', time() - 3600, '/');
    echo "Cookie deleted.";
} else {
    echo "Current Cookies: ";
    print_r($_COOKIE);
}