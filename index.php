<?php 
$page_title = "Inicio";
require_once 'includes/header.php'; 
?>

<header class="hero"
    style="background-image: linear-gradient(rgba(11, 33, 62, 0.7), rgba(11, 33, 62, 0.8)), url('assets/img/castillo.jpg');">
    <div class="container hero-container">
        <div class="hero-content">
            <span class="badge"><span class="dot-green"></span> Atención ciudadana activa</span>
            <h1>Bienvenido a<br><span class="highlight">Villasegura</span></h1>
            <p>Tu ayuntamiento, más cerca. Realiza trámites online, consulta información municipal y participa en la
                vida de tu pueblo.</p>

            <form action="actions/buscar.php" method="GET" class="search-form">
                <i class="fas fa-search text-gray"></i>
                <input type="text" name="q" placeholder="Buscar trámite: padrón, IBI, licencia..." required>
                <button type="submit" class="btn-search">Buscar</button>
            </form>
        </div>
    </div>
</header>

<section class="container quick-links-wrapper">
    <div class="quick-links">
        <a href="/cita_previa" class="service-card">
            <div class="icon-box" x-file-name="Home" x-line-number="84" x-column="28" x-component="div"
                x-id="Home_84_28" x-dynamic="false"
                style="background: rgba(11, 61, 145, 0.082); color: rgb(11, 61, 145);"><svg
                    xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-calendar" aria-hidden="true" x-file-name="Home" x-line-number="85"
                    x-column="32" x-component="icon" x-id="Home_85_32" x-dynamic="false">
                    <path d="M8 2v4"></path>
                    <path d="M16 2v4"></path>
                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                    <path d="M3 10h18"></path>
                </svg></div>
            <h3>Cita Previa</h3>
            <p>Reserva tu turno en el ayuntamiento.</p>
            <span class="link-arrow">Acceder &rarr;</span>
        </a>
        <a href="tramites?cat=padron" class="service-card">
            <div class="icon-box" x-file-name="Home" x-line-number="84" x-column="28" x-component="div"
                x-id="Home_84_28" x-dynamic="false"
                style="background: rgba(29, 107, 217, 0.082); color: rgb(29, 107, 217);"><svg
                    xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-file-pen-line" aria-hidden="true" x-file-name="Home" x-line-number="85"
                    x-column="32" x-component="icon" x-id="Home_85_32" x-dynamic="false">
                    <path d="m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2">
                    </path>
                    <path
                        d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z">
                    </path>
                    <path d="M8 18h1"></path>
                </svg></div>
            <h3>Padrón</h3>
            <p>Alta, baja y certificados.</p>
            <span class="link-arrow">Acceder &rarr;</span>
        </a>
        <a href="tramites?cat=padron" class="service-card">
            <div class="icon-box" x-line-number="84" x-column="28" x-component="div" x-id="Home_84_28" x-dynamic="false"
                style="background: rgba(47, 154, 223, 0.082); color: rgb(47, 154, 223);"><svg
                    xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-receipt" aria-hidden="true" x-file-name="Home" x-line-number="85" x-column="32"
                    x-component="icon" x-id="Home_85_32" x-dynamic="false">
                    <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"></path>
                    <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path>
                    <path d="M12 17.5v-11"></path>
                </svg></div>
            <h3>Pago de Impuestos</h3>
            <p>IBI, basuras y tasas.</p>
            <span class="link-arrow">Acceder &rarr;</span>
        </a>
        <a href="transparencia" class="service-card">
            <div class="icon-box" style="background: rgba(11, 61, 145, 0.082); color: rgb(11, 61, 145);"><svg
                    xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-landmark" aria-hidden="true">
                    <line x1="3" x2="21" y1="22" y2="22"></line>
                    <line x1="6" x2="6" y1="18" y2="11"></line>
                    <line x1="10" x2="10" y1="18" y2="11"></line>
                    <line x1="14" x2="14" y1="18" y2="11"></line>
                    <line x1="18" x2="18" y1="18" y2="11"></line>
                    <polygon points="12 2 20 7 4 7"></polygon>
                </svg></div>
            <h3>Transparencia</h3>
            <p>Presupuestos y contratos.</p>
            <span class="link-arrow">Acceder &rarr;</span>
        </a>
    </div>
</section>

<section class="container section-spacing">
    <div class="section-header">
        <div>
            <span class="subtitle">ACTUALIDAD</span>
            <h2>Noticias recientes</h2>
        </div>
        <a href="/noticias" class="link-blue-arrow">Ver todas &gt;</a>
    </div>

    <div class="grid-3">
        <a href="/noticia.php?id=1" class="news-card">
            <div class="news-img" style="background-image: url('assets/img/castillo.jpg');"></div>
            <div class="news-content">
                <div class="news-meta">
                    <span class="tag tag-cultura">Cultura</span>
                    <span class="date">28 de noviembre de 2025</span>
                </div>
                <h3>El castillo de Villasegura reabre al público tras su restauración</h3>
                <p>Después de 18 meses de obras, la fortaleza medieval del siglo XII vuelve a abrir sus puertas c...</p>
            </div>
        </a>
        <a href="/noticia.php?id=2" class="news-card">
            <div class="news-img" style="background-image: url('assets/img/balanza.jpg');"></div>
            <div class="news-content">
                <div class="news-meta">
                    <span class="tag tag-institucional">Institucional</span>
                    <span class="date">25 de noviembre de 2025</span>
                </div>
                <h3>Aprobados los presupuestos municipales para 2026</h3>
                <p>El pleno ha aprobado unos presupuestos centrados en servicios sociales, educación y eficiencia...</p>
            </div>
        </a>
        <a href="/noticia.php?id=3" class="news-card">
            <div class="news-img" style="background-image: url('assets/img/autobus.jpg');"></div>
            <div class="news-content">
                <div class="news-meta">
                    <span class="tag tag-transporte">Transporte</span>
                    <span class="date">20 de noviembre de 2025</span>
                </div>
                <h3>Nueva línea de autobús rural conecta Villasegura con la capital</h3>
                <p>A partir del 15 de diciembre, una nueva línea de transporte mejorará la movilidad de vecinos y...</p>
            </div>
        </a>
    </div>
</section>

<section class="events-bg">
    <div class="container section-spacing">
        <div class="section-header">
            <div>
                <span class="subtitle">AGENDA</span>
                <h2>Próximos eventos</h2>
            </div>
        </div>

        <div class="grid-4">
            <div class="event-card">
                <div class="event-content">
                    <div class="event-date-box">
                        <span class="day">20</span>
                        <span class="month">DIC</span>
                    </div>
                    <div class="event-info">
                        <span class="event-tag">CULTURAL</span>
                        <h4>Mercado Medieval de Navidad</h4>
                        <p class="event-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                </path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg> Plaza Mayor
                        </p>
                    </div>
                </div>
                <div class="event-description">
                    <p class="event-desc">Dos días de mercado artesanal, cetrería y música en vivo en la plaz...</p>
                </div>
            </div>
            <div class="event-card">
                <div class="event-content">
                    <div class="event-date-box">
                        <span class="day">22</span>
                        <span class="month">DIC</span>
                    </div>
                    <div class="event-info">
                        <span class="event-tag">MÚSICA</span>
                        <h4>Concierto de Navidad del Coro Municipal</h4>
                        <p class="event-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                </path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Iglesia de San Miguel
                        </p>
                    </div>
                </div>
                <div class="event-description">
                    <p class="event-desc">El coro municipal ofrece su tradicional concierto navideño en la...</p>
                </div>
            </div>
            <div class="event-card">
                <div class="event-content">
                    <div class="event-date-box">
                        <span class="day">5</span>
                        <span class="month">ENE</span>
                    </div>
                    <div class="event-info">
                        <span class="event-tag">TRADICIÓN</span>
                        <h4>Cabalgata de Reyes Magos</h4>
                        <p class="event-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                </path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Calles del centro
                        </p>
                    </div>
                </div>
                <div class="event-description">
                    <p class="event-desc">Recorrido tradicional por las calles del municipio con reparto de...</p>
                </div>
            </div>
            <div class="event-card">
                <div class="event-content">
                    <div class="event-date-box">
                        <span class="day">10</span>
                        <span class="month">ENE</span>
                    </div>
                    <div class="event-info">
                        <span class="event-tag">INFANTIL</span>
                        <h4>Taller infantil de cerámica ibérica</h4>
                        <p class="event-location">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                </path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Museo Arqueológico
                        </p>
                    </div>
                </div>
                <div class="event-description">
                    <p class="event-desc">Actividad gratuita para niños de 6 a 12 años en el Museo Arqueológico.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container section-spacing faq-section">
    <div class="section-header text-center">
        <span class="subtitle">AYUDA</span>
        <h2>Preguntas frecuentes</h2>
        <p class="header-desc">Resolvemos las dudas más habituales sobre trámites.</p>
    </div>

    <div class="faq-container">
        <div class="faq-item">
            <button class="faq-header">¿Cómo puedo empadronarme en Villasegura? <i
                    class="fas fa-chevron-down"></i></button>
            <div class="faq-content">
                <p>Debes solicitar cita previa y acudir al Ayuntamiento con tu DNI/NIE, un contrato de alquiler o
                    escritura de propiedad, y el último recibo de suministros.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-header">¿Dónde pago el IBI y otros impuestos municipales? <i
                    class="fas fa-chevron-down"></i></button>
            <div class="faq-content">
                <p>Puedes realizar el pago en la pasarela de pagos de la Sede Electrónica o de forma presencial en las
                    entidades bancarias colaboradoras.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-header">¿Cómo solicito un certificado de empadronamiento? <i
                    class="fas fa-chevron-down"></i></button>
            <div class="faq-content">
                <p>El certificado se puede solicitar de forma instantánea a través de la Sede Electrónica con
                    certificado digital o presencialmente pidiendo cita previa.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-header">¿Cuál es el horario de atención al ciudadano? <i
                    class="fas fa-chevron-down"></i></button>
            <div class="faq-content">
                <p>El horario general es de lunes a viernes de 9:00 a 14:00 horas. Los martes y jueves también abrimos
                    por la tarde de 16:30 a 18:30 horas.</p>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>