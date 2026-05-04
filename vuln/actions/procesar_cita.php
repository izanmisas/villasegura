<?php
// procesar_cita.php
require_once '../includes/config.php'; // Archivo que contiene la conexión PDO a la BBDD

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitización de entradas
    $nombre   = htmlspecialchars(strip_tags(trim($_POST['nombre'] ?? '')), ENT_QUOTES, 'UTF-8');
    $dni      = htmlspecialchars(strip_tags(trim($_POST['dni'] ?? '')), ENT_QUOTES, 'UTF-8');
    $email    = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars(strip_tags(trim($_POST['telefono'] ?? '')), ENT_QUOTES, 'UTF-8');
    $servicio = htmlspecialchars(strip_tags(trim($_POST['servicio'] ?? '')), ENT_QUOTES, 'UTF-8');
    $fecha    = htmlspecialchars(strip_tags(trim($_POST['fecha'] ?? '')), ENT_QUOTES, 'UTF-8');
    $notas    = htmlspecialchars(strip_tags(trim($_POST['notas'] ?? '')), ENT_QUOTES, 'UTF-8');

    // Validación básica
    $errores = [];
    if (empty($nombre) || empty($dni) || empty($telefono) || empty($servicio) || empty($fecha)) {
        $errores[] = "Por favor, rellena todos los campos obligatorios.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }

    // Insertar en Base de Datos si no hay errores
    if (empty($errores)) {
        try {
            $sql = "INSERT INTO citas_previas (nombre_completo, dni_nie, email, telefono, servicio, fecha_preferida, notas) 
                    VALUES (:nombre, :dni, :email, :telefono, :servicio, :fecha, :notas)";
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':servicio', $servicio);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':notas', $notas);

            if ($stmt->execute()) {
                // Redirigir con mensaje de éxito
                header("Location: cita_previa.php?status=success");
                exit;
            } else {
                header("Location: cita_previa.php?status=error");
                exit;
            }
        } catch (PDOException $e) {
            error_log("Error al procesar cita: " . $e->getMessage());
            header("Location: cita_previa.php?status=error");
            exit;
        }
    } else {
        echo "Error: " . implode("<br>", $errores);
    }
} else {
    header("Location: ../cita_previa.php");
    exit;
}
?>