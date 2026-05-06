<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

require_once './includes/config.php'; 

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim(isset($_POST['usuario']) ? $_POST['usuario'] : '');
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($usuario) || empty($password)) {
        $error = "Por favor, introduce usuario y contraseña.";
    } else {
        try {
            $sql = "SELECT id, usuario, password_hash, rol FROM usuarios_admin WHERE usuario = :usuario LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->execute();
            
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                session_regenerate_id(true);
                
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_user'] = $user['usuario'];
                $_SESSION['admin_rol'] = $user['rol'];

                $update = $pdo->prepare("UPDATE usuarios_admin SET ultimo_acceso = NOW() WHERE id = :id");
                $update->execute(array(':id' => $user['id']));

                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Usuario o contraseña incorrectos.";
            }
        } catch (PDOException $e) {
            error_log("Error en login: " . $e->getMessage());
            $error = "Ocurrió un error en el sistema. Inténtalo más tarde.";
        }
    }
}

$page_title = "Acceso Administración";
require_once 'includes/header.php'; 
?>

    <main class="container page-login">
        
        <div class="login-header-centered">
            <span class="subtitle"><i class="fas fa-shield-alt"></i> ÁREA RESTRINGIDA</span>
            <h1>Panel de administración</h1>
        </div>

        <div class="login-card">
            
            <div class="login-card-header">
                <div class="login-card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-log-in">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" x2="3" y1="12" y2="12"></line>
                    </svg> 
                </div>
                <div>
                    <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.2rem;">Acceso interno</h3>
                    <p style="font-size: 0.9rem; color: var(--text-gray);">Personal autorizado del ayuntamiento</p>
                </div>
            </div>

            <form action="login.php" method="POST">
                
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" autocomplete="username">
                </div>

                <div class="form-group" style="margin-bottom: 2rem;">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" autocomplete="current-password">
                </div>

                <p>
                    <?php echo $error; ?>
                </p>

                <button type="submit" class="btn-submit-full">
                    Entrar
                </button>
                
            </form>

            <div class="demo-note">
                <strong>Demo:</strong> admin / admin123
            </div>

        </div>

    </main>

<?php require_once 'includes/footer.php'; ?>