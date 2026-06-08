<?php
// Session start karo taaki hum use destroy kar sakein
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Saare session variables ko khali kar do
$_SESSION = array();

// 2. Agar session cookie use ho rahi hai, toh use bhi delete kar do
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Session ko destroy kar do
session_destroy();

// 4. User ko wapas login page par bhej do
header("Location: login.php");
exit();
?>