<?php 
require_once 'includes/config.php'; 

// Coger el ID de la noticia desde la URL
$id_noticia = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_noticia <= 0) {
    header("Location: noticias.php");
    exit;
}

try {
    // Buscar la noticia específica
    $stmt = $pdo->prepare("SELECT * FROM noticias WHERE id = :id");
    $stmt->bindParam(':id', $id_noticia, PDO::PARAM_INT);
    $stmt->execute();
    $noticia = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si no existe, volvemos a la lista
    if (!$noticia) {
        header("Location: /noticias");
        exit;
    }
} catch(PDOException $e) {
    error_log("Error al cargar la noticia: " . $e->getMessage());
    header("Location: /noticias");
    exit;
}

// Función para la fecha
function formatearFechaCorta($fecha_sql) {
    return date('d/m/Y', strtotime($fecha_sql));
}

// Ponemos de título de la página web el título de la noticia
$page_title = htmlspecialchars($noticia['titulo']);
require_once 'includes/header.php'; 

// Ajuste de la imagen
$nombre_imagen = str_replace('ruta-', '', htmlspecialchars($noticia['imagen_ruta']));
$url_imagen = 'assets/img/' . $nombre_imagen;
?>

    <main class="container page-noticia-detalle">
        
        <a href="/noticias" class="back-link"><i class="fas fa-arrow-left"></i> Volver a noticias</a>

        <div class="news-meta" style="margin-top: 2rem;">
            <span class="tag-pill"><?php echo htmlspecialchars($noticia['categoria']); ?></span>
            <span class="date">                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
 <?php echo formatearFechaCorta($noticia['fecha_publicacion']); ?></span>
        </div>

        <h1 class="article-title"><?php echo htmlspecialchars($noticia['titulo']); ?></h1>
        <p class="article-lead"><?php echo htmlspecialchars($noticia['extracto']); ?></p>

        <?php if(!empty($noticia['imagen_ruta'])): ?>
            <img src="<?php echo $url_imagen; ?>" alt="Imagen de la noticia" class="article-image">
        <?php endif; ?>

        <div class="article-content">
            <?php 
                // Imprimimos el contenido. Al permitir HTML desde la BD (para los <p> y <strong>),
                // no usamos htmlspecialchars() aquí.
                echo $noticia['contenido']; 
            ?>
        </div>

    </main>

<?php require_once 'includes/footer.php'; ?>