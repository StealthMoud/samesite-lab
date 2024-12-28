<?php
$cookies = $_COOKIE;
foreach ($cookies as $name => $value) {
    setcookie($name, '', time() - 3600, '/');
}
header('Location: /delete_cookies.html');
exit;