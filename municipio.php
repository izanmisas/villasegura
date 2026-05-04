<?php 
$page_title = "El Municipio";
require_once 'includes/header.php'; 
?>

<main class="container page-municipio">
    <div class="page-header">
        <span class="subtitle">CONOCE VILLASEGURA</span>
        <h1>El Municipio</h1>
    </div>

    <section class="history-section">
        <div class="history-text">
            <h2>Historia y tradición</h2>
            <p>Villasegura es un municipio de interior con más de <strong>800 años de historia</strong>, documentado por
                primera vez en 1187 como enclave defensivo. Su castillo medieval, restaurado en varias ocasiones, sigue
                siendo el símbolo del pueblo.</p>
            <p>Hoy Villasegura combina su patrimonio histórico con una economía local basada en la agricultura, la
                gastronomía y un creciente turismo rural.</p>
        </div>
        <div class="history-image">
            <img src="assets/img/castillo.jpg" alt="Castillo de Villasegura">
        </div>
    </section>

    <section class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-landmark">
                    <line x1="3" x2="21" y1="22" y2="22"></line>
                    <line x1="6" x2="6" y1="18" y2="11"></line>
                    <line x1="10" x2="10" y1="18" y2="11"></line>
                    <line x1="14" x2="14" y1="18" y2="11"></line>
                    <line x1="18" x2="18" y1="18" y2="11"></line>
                    <polygon points="12 2 20 7 4 7"></polygon>
                </svg>
            </div>
            <h3>Patrimonio</h3>
            <p>Castillo del S.XII, iglesia románica y murallas.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-trees" >
                    <path d="M10 10v.2A3 3 0 0 1 8.9 16H5a3 3 0 0 1-1-5.8V10a3 3 0 0 1 6 0Z"></path>
                    <path d="M7 16v6"></path>
                    <path d="M13 19v3"></path>
                    <path
                        d="M12 19h8.3a1 1 0 0 0 .7-1.7L18 14h.3a1 1 0 0 0 .7-1.7L16 9h.2a1 1 0 0 0 .8-1.7L13 3l-1.4 1.5">
                    </path>
                </svg></div>
            <h3>Naturaleza</h3>
            <p>Rutas senderistas y el parque natural del valle.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-mountain">
                    <path d="m8 3 4 8 5-5 5 15H2L8 3z"></path>
                </svg></div>
            <h3>Paisaje</h3>
            <p>Entornos de sierra con vistas privilegiadas.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-utensils" aria-hidden="true" x-file-name="Municipio" x-line-number="33"
                    x-column="28" x-component="icon" x-id="Municipio_33_28" x-dynamic="false">
                    <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"></path>
                    <path d="M7 2v20"></path>
                    <path d="M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"></path>
                </svg></div>
            <h3>Gastronomía</h3>
            <p>Queso artesano, miel y asados tradicionales.</p>
        </div>
    </section>

    <section class="stats-banner">
        <div class="stat-item">
            <span class="stat-number">1.240</span>
            <span class="stat-label">Habitantes</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">42 km&sup2;</span>
            <span class="stat-label">Extensión</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">890 m</span>
            <span class="stat-label">Altitud</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">1187</span>
            <span class="stat-label">Fundación documental</span>
        </div>
    </section>

</main>

<?php require_once 'includes/footer.php'; ?>