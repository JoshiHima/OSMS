<?php

// Check if session is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Destroy the session to log out
session_destroy();

echo "<script>location.href='index.php'</script>";



?>