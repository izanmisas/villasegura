<?php 
$page_title = "Cita Previa";
require_once 'includes/header.php'; 
?>

    <main class="container page-cita">
        
        <div class="page-header" style="margin-bottom: 2.5rem; max-width: 800px; margin: auto; margin-bottom: 30px;">
            <span class="subtitle">                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
 SEDE ELECTRÓNICA</span>
            <h1 style="font-size: 3.2rem;">Cita previa</h1>
            <p class="header-desc" style="margin: inherit;">Solicita tu turno para atención presencial en el ayuntamiento.</p>
        </div>

        <div class="cita-form-card">
            <form action="actions/procesar_cita.php" method="POST" id="formCita">
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI / NIE</label>
                        <input type="text" id="dni" name="dni" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="servicio">Servicio</label>
                    <select id="servicio" name="servicio" required>
                        <option value="padron_tramites">Padrón: alta / baja / cambio</option>
                        <option value="padron_certificado">Certificado de empadronamiento</option>
                        <option value="tributos">Tributos: IBI, basuras, vados</option>
                        <option value="licencia_obras_menores">Licencia de obras menores</option>
                        <option value="urbanismo_informes">Urbanismo: informes</option>
                        <option value="servicios_sociales">Servicios Sociales</option>
                        <option value="registro_general">Registro general</option>
                        <option value="otros">Otros trámites</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha preferida</label>
                    <input type="date" id="fecha" name="fecha" required>
                </div>

                <div class="form-group">
                    <label for="notas">Notas (opcional)</label>
                    <textarea id="notas" name="notas" rows="4"></textarea>
                </div>

                <button type="submit" class="btn-submit-full">
                    Solicitar cita
                </button>
                
            </form>
        </div>

    </main>

<?php require_once 'includes/footer.php'; ?>