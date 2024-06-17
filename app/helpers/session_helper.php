<?php

function startSession($timeout = 3600) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['login_time'])) {
        $_SESSION['login_time'] = time();
    }

    if ((time() - $_SESSION['login_time']) > $timeout) {
        session_unset();
        session_destroy();
        return false; // Session timed out
    }

    // Reset login time on activity
    $_SESSION['login_time'] = time();
    return true; // Session active
}
?>
