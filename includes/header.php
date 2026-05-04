<?php
// Si no se ha definido un título en la página, ponemos uno por defecto
$page_title = isset($page_title) ? $page_title . " - Villasegura" : "Ayuntamiento de Villasegura";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

    <div class="topbar">
        <div class="container topbar-container">
            <div class="topbar-left">
                <span><i class="fas fa-phone-alt"></i> 900 123 456</span>
                <span><i class="fas fa-envelope"></i> info@villasegura.es</span>
                <span><i class="far fa-clock"></i> L-V 9:00-14:00</span>
            </div>
            <div class="topbar-right">
                <a href="/tramites">Sede Electrónica</a>
                <a href="/dashboard"><i class="fas fa-shield-alt" style="margin-right: 5px; font-size: 13px;"></i>Acceso interno</a>
            </div>
        </div>
    </div>

    <nav class="navbar">
        <div class="container nav-container">
            <a href="/" class="logo">
                <div class="logo-icon"><img src="/assets/img/logo_villasegura.png" alt="Logo V  illaSegura"></div>
                <div class="logo-text">
                    <strong>Villasegura</strong>
                    <span>AYUNTAMIENTO</span>
                </div>
            </a>
            
            <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
            
            <ul class="nav-links">
                <li><a href="/index" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Inicio</a></li>
                <li><a href="/municipio" class="<?php echo ($current_page == 'municipio.php') ? 'active' : ''; ?>">Municipio</a></li>
                <li><a href="/transparencia" class="<?php echo ($current_page == 'transparencia.php') ? 'active' : ''; ?>">Transparencia</a></li>
                <li><a href="/tramites" class="<?php echo ($current_page == 'tramites.php') ? 'active' : ''; ?>">Trámites</a></li>
                <li><a href="/contacto" class="<?php echo ($current_page == 'contacto.php') ? 'active' : ''; ?>">Contacto</a></li>
            </ul>
            <a href="/cita_previa" class="btn-primary">Pedir cita previa</a>
        </div>
    </nav>