<?php
session_start();

// Set 'NormalCookie' with SameSite=None
setcookie('NormalCookie', 'normal', [
    'expires' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => true,   // Required for SameSite=None
    'httponly' => false,
    'samesite' => 'None' // Explicitly setting SameSite=None
]);

// Set 'LaxCookie' with SameSite=Lax
setcookie('LaxCookie', 'lax', [
    'expires' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Lax' // Explicitly setting SameSite=Lax
]);

// Set 'StrictCookie' with SameSite=Strict
setcookie('StrictCookie', 'strict', [
    'expires' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict' // Explicitly setting SameSite=Strict
]);

// Redirect to another page
header('Location: /public/set_cookie.html');
exit;
