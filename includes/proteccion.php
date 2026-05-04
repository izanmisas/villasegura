<?php
// proteccion.php
session_start();

// Verificar si no hay una sesión activa o no es válida
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirigir al login
    header("Location: login.php");
    exit;
}
?>