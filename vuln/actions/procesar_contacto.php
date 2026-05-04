<?php
// procesar_contacto.php

require_once '../includes/config.php';

// 2. Verificar que la petición sea POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 3. Sanitización de entradas (Evita XSS eliminando etiquetas HTML y scripts)
    $nombre  = htmlspecialchars(strip_tags(trim($_POST['nombre'] ?? '')), ENT_QUOTES, 'UTF-8');
    $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $asunto  = htmlspecialchars(strip_tags(trim($_POST['asunto'] ?? '')), ENT_QUOTES, 'UTF-8');
    $mensaje = htmlspecialchars(strip_tags(trim($_POST['mensaje'] ?? '')), ENT_QUOTES, 'UTF-8');

    // 4. Validación básica
    $errores = [];
    if (empty($nombre))  $errores[] = "El nombre es obligatorio.";
    if (empty($asunto))  $errores[] = "El asunto es obligatorio.";
    if (empty($mensaje)) $errores[] = "El mensaje no puede estar vacío.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del correo electrónico no es válido.";
    }

    // 5. Procesamiento si no hay errores
    if (empty($errores)) {
        try {
            // Sentencia preparada para evitar Inyección SQL
            $sql = "INSERT INTO mensajes_contacto (nombre, email, asunto, mensaje) VALUES (:nombre, :email, :asunto, :mensaje)";
            $stmt = $pdo->prepare($sql);
            
            // Vinculación de parámetros
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':asunto', $asunto, PDO::PARAM_STR);
            $stmt->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Redirigir con éxito (puedes crear una página de gracias o usar parámetros GET)
                header("Location: /contacto.php?status=success");
                exit;
            } else {
                header("Location: /contacto.php?status=error");
                exit;
            }
        } catch (PDOException $e) {
            // Loguear el error en un archivo privado y mostrar mensaje genérico
            error_log("Error al guardar mensaje de contacto: " . $e->getMessage());
            header("Location: /contacto.php?status=error");
            exit;
        }
    } else {
        // En un caso real, aquí devolveríamos los errores a la vista
        echo implode("<br>", $errores);
    }
} else {
    // Si acceden directamente al archivo por URL, redirigir
    header("Location: /contacto.php");
    exit;
}
?>