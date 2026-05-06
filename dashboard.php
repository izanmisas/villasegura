<?php
session_start();
// Proteger la página
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

require_once './includes/config.php';

// --- LÓGICA DE DATOS ---
$citas = $pdo->query("SELECT * FROM citas_previas ORDER BY fecha_preferida ASC LIMIT 20")->fetchAll();
$mensajes = $pdo->query("SELECT * FROM mensajes_contacto ORDER BY fecha_envio DESC LIMIT 20")->fetchAll();
$noticias = $pdo->query("SELECT * FROM noticias ORDER BY fecha_publicacion DESC LIMIT 20")->fetchAll();
$usuarios = $pdo->query("SELECT * FROM usuarios_admin ORDER BY id ASC")->fetchAll();

$page_title = "Panel de Administración";
require_once 'includes/header.php'; 
?>

<main class="container page-admin">

        <div class="admin-header-flex">
            <div>
                <span class="subtitle"><i class="fas fa-shield-alt"></i> ÁREA RESTRINGIDA</span>
                <h1 style="font-size: 3.2rem; margin-top: 0.2rem;">Panel de administración</h1>
            </div>
            <div style="display: flex; gap: 1rem;">
                <a href="volantes.php" class="btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.2rem; border-radius: 8px; font-size: 0.95rem;">
                    <i class="fas fa-file-pdf"></i> Generador Volantes
                </a>
                
                <a href="actions/logout.php" class="btn-outline">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                </a>
            </div>
        </div>

    <div class="admin-tabs">
        <button class="admin-tab-btn active" data-target="tab-citas"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar">
                <path d="M8 2v4"></path>
                <path d="M16 2v4"></path>
                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                <path d="M3 10h18"></path>
            </svg> Citas</button>
        <button class="admin-tab-btn" data-target="tab-mensajes"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg> Mensajes</button>
        <button class="admin-tab-btn" data-target="tab-noticias"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                <path d="M5 12h14"></path>
                <path d="M12 5v14"></path>
            </svg> Noticias</button>
        <button class="admin-tab-btn" data-target="tab-usuarios"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                <path d="M16 3.128a4 4 0 0 1 0 7.744"></path>
                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                <circle cx="9" cy="7" r="4"></circle>
            </svg> Usuarios</button>
    </div>

    <div id="tab-citas" class="admin-tab-content active">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>FECHA</th>
                    <th>NOMBRE</th>
                    <th>DNI</th>
                    <th>SERVICIO</th>
                    <th>CONTACTO</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($citas as $cita): ?>
                <tr>
                    <td><?php echo date('Y-m-d', strtotime($cita['fecha_preferida'])); ?></td>
                    <td><strong><?php echo htmlspecialchars($cita['nombre_completo']); ?></strong></td>
                    <td><?php echo htmlspecialchars($cita['dni_nie']); ?></td>
                    <td><?php echo htmlspecialchars($cita['servicio']); ?></td>
                    <td class="text-gray" style="font-size: 0.9rem;">
                        <?php echo htmlspecialchars($cita['email']); ?><br>
                        <?php echo htmlspecialchars($cita['telefono']); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div id="tab-mensajes" class="admin-tab-content">

        <?php if(empty($mensajes)): ?>
        <div class="empty-state">
            <div class="empty-icon"><i class="far fa-folder-open"></i></div>
            <h3>Aún no hay mensajes</h3>
            <p>Las consultas de los ciudadanos aparecerán aquí.</p>
        </div>
        <?php else: ?>
        <?php foreach($mensajes as $msg): ?>
        <div class="admin-message-card">
            <div class="message-header">
                <div>
                    <span class="message-name"><?php echo htmlspecialchars($msg['nombre']); ?></span>
                    <span class="message-email"> · <?php echo htmlspecialchars($msg['email']); ?></span>
                </div>
                <div class="message-date">
                    <?php echo date('j/n/Y, H:i:s', strtotime($msg['fecha_envio'])); ?>
                </div>
            </div>
            <div class="message-subject"><?php echo htmlspecialchars($msg['asunto']); ?></div>
            <div class="message-body"><?php echo nl2br(htmlspecialchars($msg['mensaje'])); ?></div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

    </div>

    <div id="tab-noticias" class="admin-tab-content">
        <div class="split-layout">

            <div class="admin-form-col">
                <h3 style="margin-bottom: 1.5rem;">Nueva noticia</h3>
                <form action="dashboard.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" placeholder="Título" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="resumen" placeholder="Resumen" required>
                    </div>
                    <div class="form-group">
                        <textarea name="contenido" placeholder="Contenido (HTML permitido)" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="url_imagen" placeholder="URL imagen">
                    </div>
                    <div class="form-group">
                        <select name="categoria">
                            <option value="General">General</option>
                            <option value="Cultura">Cultura</option>
                            <option value="Institucional">Institucional</option>
                            <option value="Transporte">Transporte</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-submit-full">Publicar</button>
                </form>
            </div>

            <div class="admin-news-list">
                <?php foreach($noticias as $noti): ?>
                <div class="admin-news-card">
                    <div class="admin-news-content">
                        <span class="tag-label" style="font-size: 0.65rem; margin-bottom: 0.5rem; display: block;">
                            <?php echo strtoupper(htmlspecialchars($noti['categoria'])); ?>
                        </span>
                        <h4><?php echo htmlspecialchars($noti['titulo']); ?></h4>
                        <p><?php echo htmlspecialchars(substr($noti['extracto'], 0, 90)) . '...'; ?></p>
                    </div>
                    <button class="btn-delete-news"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 lucide-trash-2"
                            aria-hidden="true" x-file-name="Admin" x-line-number="183" x-column="150"
                            x-component="Trash2" x-id="Admin_183_150" x-dynamic="true" x-source-type="external"
                            x-source-var="items" x-source-editable="false" x-array-var="items" x-array-item-param="n">
                            <path d="M3 6h18"></path>
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                            <line x1="10" x2="10" y1="11" y2="17"></line>
                            <line x1="14" x2="14" y1="11" y2="17"></line>
                        </svg></button>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

    <div id="tab-usuarios" class="admin-tab-content">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>USUARIO</th>
                    <th>ROL</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usr): ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($usr['usuario']); ?></strong></td>
                    <td><span class="badge-rol"><?php echo htmlspecialchars($usr['rol']); ?></span></td>
                    <td><?php echo htmlspecialchars($usr['usuario']); ?>@villasegura.es</td>
                    <td style="color: var(--text-gray); letter-spacing: 2px; font-size: 1.2rem;">••••••••</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>

<?php require_once 'includes/footer.php'; ?>