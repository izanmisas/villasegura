<?php 
// 1. Cargamos la configuración de la BD
require_once 'includes/config.php'; 

// 2. Consulta a la base de datos
try {
    $stmt = $pdo->query("SELECT * FROM noticias ORDER BY fecha_publicacion DESC");
    $noticias_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    error_log("Error al cargar noticias: " . $e->getMessage());
    $noticias_db = [];
}

// 3. Función para formatear la fecha como en tu imagen (DD/MM/YYYY)
function formatearFechaCorta($fecha_sql) {
    return date('d/m/Y', strtotime($fecha_sql));
}

$page_title = "Noticias";
require_once 'includes/header.php'; 
?>

<main class="container page-noticias">

    <div class="page-header" style="margin-bottom: 3rem;">
        <span class="subtitle">ACTUALIDAD</span>
        <h1 style="font-size: 3.2rem; margin-top: -0.5rem;">Noticias</h1>
        <p class="header-desc" style="max-width: 600px; margin-top: 1rem; color: var(--text-gray); font-size: 1.05rem;">
            Últimas novedades del municipio de Villasegura.</p>
    </div>

    <section class="grid-3" style="margin-bottom: 5rem;">

        <?php if(count($noticias_db) > 0): ?>

        <?php foreach($noticias_db as $noti): 
                    $nombre_imagen = str_replace('ruta-', '', htmlspecialchars($noti['imagen_ruta']));
                    $url_imagen = 'assets/img/' . $nombre_imagen;
                ?>

        <a href="noticia.php?id=<?php echo $noti['id']; ?>" class="news-card card-hover-shadow"
            style="text-decoration: none; display: block; color: inherit;">
            <div class="news-img" style="background-image: url('<?php echo $url_imagen; ?>');"></div>
            <div class="news-content">
                <div class="news-meta">
                    <span class="tag-pill"><?php echo htmlspecialchars($noti['categoria']); ?></span>
                    <span class="date"> <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar">
                            <path d="M8 2v4"></path>
                            <path d="M16 2v4"></path>
                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                            <path d="M3 10h18"></path>
                        </svg>
                        <?php echo formatearFechaCorta($noti['fecha_publicacion']); ?></span>
                </div>
                <h3><?php echo htmlspecialchars($noti['titulo']); ?></h3>
                <p><?php echo htmlspecialchars($noti['extracto']); ?></p>
            </div>
        </a>

        <?php endforeach; ?>

        <?php else: ?>

        <div
            style="grid-column: 1 / -1; padding: 4rem; text-align: center; background: #f8fafc; border-radius: 12px; border: 1px dashed var(--border-color);">
            <p style="color: var(--text-gray); font-size: 1.1rem;">Aún no hay noticias publicadas.</p>
        </div>

        <?php endif; ?>

    </section>

</main>

<?php require_once 'includes/footer.php'; ?>