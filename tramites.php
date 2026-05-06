<?php 
require_once 'includes/config.php'; 

$page_title = "Trámites";
require_once 'includes/header.php'; 

// Capturamos los filtros de la URL
$query_busqueda = isset($_GET['q']) ? htmlspecialchars(strip_tags(trim($_GET['q'])), ENT_QUOTES, 'UTF-8') : '';
$filtro_cat = isset($_GET['cat']) ? htmlspecialchars($_GET['cat'], ENT_QUOTES, 'UTF-8') : 'todos';

try {
    // Construimos la consulta dinámica
    $sql = "SELECT * FROM tramites WHERE 1=1";
    $params = array();

    if (!empty($query_busqueda)) {
        $sql .= " AND (titulo LIKE :q1 OR extracto LIKE :q2)";
        $term = '%' . $query_busqueda . '%';
        $params[':q1'] = $term;
        $params[':q2'] = $term;
    }

    if ($filtro_cat !== 'todos') {
        $sql .= " AND categoria = :cat";
        $params[':cat'] = $filtro_cat;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    error_log("Error: " . $e->getMessage());
    $resultados = array();
}
?>

<main class="container page-tramites">
    <div class="page-header" style="margin-bottom: 3rem;">
        <span class="subtitle">SEDE ELECTRÓNICA</span>
        <h1 style="font-family: var(--font-heading); font-size: 3.2rem;">Trámites</h1>
        
        <form action="tramites.php" method="GET" class="search-form-tramites">
            <div class="search-icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search text-slate-400 flex-shrink-0"><path d="m21 21-4.34-4.34"></path><circle cx="11" cy="11" r="8"></circle></svg></div>
            <input type="text" name="q" placeholder="Buscar trámite..." value="<?php echo $query_busqueda; ?>">
            <?php if($filtro_cat != 'todos'): ?>
                <input type="hidden" name="cat" value="<?php echo $filtro_cat; ?>">
            <?php endif; ?>
            <button type="submit" class="btn-search">Buscar</button>
        </form>

        <div class="filters-container">
            <a href="tramites.php?cat=todos" class="filter-btn <?php echo $filtro_cat == 'todos' ? 'active' : ''; ?>">Todos</a>
            <a href="tramites.php?cat=atencion" class="filter-btn <?php echo $filtro_cat == 'atencion' ? 'active' : ''; ?>">Atención</a>
            <a href="tramites.php?cat=padron" class="filter-btn <?php echo $filtro_cat == 'padron' ? 'active' : ''; ?>">Padrón</a>
            <a href="tramites.php?cat=tributos" class="filter-btn <?php echo $filtro_cat == 'tributos' ? 'active' : ''; ?>">Tributos</a>
            <a href="tramites.php?cat=urbanismo" class="filter-btn <?php echo $filtro_cat == 'urbanismo' ? 'active' : ''; ?>">Urbanismo</a>
            <a href="tramites.php?cat=deportes" class="filter-btn <?php echo $filtro_cat == 'deportes' ? 'active' : ''; ?>">Deportes</a>
            <a href="tramites.php?cat=servicios" class="filter-btn <?php echo $filtro_cat == 'servicios' ? 'active' : ''; ?>">Servicios Sociales</a>
        </div>
    </div>

    <section class="grid-3 tramites-grid">
        <?php if(count($resultados) > 0): ?>
            <?php foreach($resultados as $fila): ?>
                <a class="tramite-card card-hover-blue">
                    <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg></div>
                    <span class="tag-label"><?php echo strtoupper($fila['categoria']); ?></span>
                    <h3 style="font-family: var(--font-heading);"><?php echo htmlspecialchars($fila['titulo']); ?></h3>
                    <p style="font-family: var(--font-body);"><?php echo htmlspecialchars($fila['extracto']); ?></p>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="grid-column: 1/-1; text-align: center; padding: 4rem;">
                <p>No se han encontrado trámites con esos criterios.</p>
                <a href="tramites.php" class="btn-primary">Ver todos</a>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>