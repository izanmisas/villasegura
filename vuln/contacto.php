<?php 
$page_title = "Contacto";
require_once 'includes/header.php'; 
?>

<main class="container page-contacto">

    <div class="page-header">
        <span class="subtitle">ATENCIÓN CIUDADANA</span>
        <h1>Contacto</h1>
    </div>

    <section class="contacto-grid">

        <div class="contacto-info">

            <div class="contacto-card card-hover-blue">
                <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                        height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                        <path
                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                        </path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg></div>
                <div class="contacto-card-text">
                    <h3>Dirección</h3>
                    <p>Plaza Mayor, 1<br>45790 Villasegura</p>
                </div>
            </div>

            <div class="contacto-card card-hover-blue">
                <div class="icon-box"><i class="fas fa-phone-alt"></i></div>
                <div class="contacto-card-text">
                    <h3>Teléfono</h3>
                    <p>900 123 456<br>Fax: 925 123 456</p>
                </div>
            </div>

            <div class="contacto-card card-hover-blue">
                <div class="icon-box"><i class="far fa-envelope"></i></div>
                <div class="contacto-card-text">
                    <h3>Email</h3>
                    <p>info@villasegura.es</p>
                </div>
            </div>

            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d62676.363293762464!2d2.4368766116279206!3d42.09488144909698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1776961718393!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>

        <div class="contacto-form-container">
            <form action="actions/procesar_contacto.php" method="POST" id="formContacto">

                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input type="text" id="asunto" name="asunto" required>
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="6" required></textarea>
                </div>

                <button type="submit" class="btn-primary btn-icon">
                    <i class="far fa-paper-plane"></i> Enviar mensaje
                </button>

            </form>
        </div>

    </section>

</main>

<?php require_once 'includes/footer.php'; ?>