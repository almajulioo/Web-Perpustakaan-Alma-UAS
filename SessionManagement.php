<?php
// Memulai session
session_start();


function storeUserState() {
    // Ambil informasi browser, IP, dan referer
    $browser = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    $ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
    $referer = $_SERVER['HTTP_REFERER'] ?? 'Direct Access';
    $accessTime = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME'] ?? time());

    // Simpan ke session sebagai state
    $_SESSION['user_state'] = [
        'browser' => $browser,
        'ip' => $ipAddress,
        'referer' => $referer,
        'access_time' => $accessTime,
        'access_count' => ($_SESSION['user_state']['access_count'] ?? 0) + 1 // Increment access count
    ];
}

function getState($key) {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
}

function removeState($key) {
    if (isset($_SESSION['state'][$key])) {
        unset($_SESSION['state'][$key]);
    }
}

function clearAllState() {
    unset($_SESSION['state']);
}

?>
