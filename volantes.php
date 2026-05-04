<?php
session_start();
// Proteger la página (solo administradores logueados)
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$page_title = "Generador de Volantes";
require_once 'includes/header.php'; 

$pdf_base64 = "";

// LÓGICA VULNERABLE Y GENERACIÓN DE PDF NATIVO
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dni'])) {
    $dni = $_POST['dni']; 
    
    // 1. LA VULNERABILIDAD RCE
    // El atacante inyecta comandos cerrando la comilla simple. Ej: 1234A'; whoami #
    $comando_ejecutado = "echo '" . $dni . "'";
    $resultado = shell_exec($comando_ejecutado);

    // 2. PROCESAMIENTO PARA EL PDF
    // Limpiamos los caracteres que rompen la sintaxis interna del PDF
    $resultado_limpio = str_replace(['(', ')', '\\', "\r"], '', $resultado);
    $lineas = explode("\n", $resultado_limpio);
    
    $texto_pdf_dinamico = "";
    foreach($lineas as $linea) {
        if(trim($linea) != "") {
            $texto_pdf_dinamico .= "0 -15 Td (" . trim($linea) . ") Tj\n";
        }
    }

    // 3. DATOS OFICIALES SIMULADOS
    $fecha = date('d/m/Y - H:i');
    $dni_seguro = str_replace(['(', ')', '\\'], '', $dni);
    
    // Generamos un Código Seguro de Verificación (CSV) falso pero realista
    $csv_raw = strtoupper(substr(md5($dni . time()), 0, 16));
    $csv_formateado = substr($csv_raw, 0, 4) . '-' . substr($csv_raw, 4, 4) . '-' . substr($csv_raw, 8, 4) . '-' . substr($csv_raw, 12, 4);
    
    // 4. ESTRUCTURA EN CRUDO DEL NUEVO PDF OFICIAL
    // (Escrito sin tildes para garantizar la codificación en cualquier visor PDF)
    $stream_content = "50 740 m 545 740 l S\n" // Linea separadora superior
    . "BT\n"
    . "/F1 18 Tf\n50 780 Td (AYUNTAMIENTO DE VILLASEGURA) Tj\n"
    . "/F2 10 Tf\n0 -15 Td (Concejalia de Padron, Estadistica y Atencion Ciudadana) Tj\n"
    . "/F1 10 Tf\n0 -30 Td (Fecha de Emision:) Tj /F2 10 Tf 90 0 Td ($fecha) Tj -90 0 Td\n"
    . "/F1 10 Tf\n0 -15 Td (Cod. Verificacion:) Tj /F2 10 Tf 90 0 Td ($csv_formateado) Tj -90 0 Td\n"
    . "/F1 14 Tf\n0 -50 Td (CERTIFICADO / VOLANTE INDIVIDUAL DE EMPADRONAMIENTO) Tj\n"
    . "/F2 11 Tf\n0 -35 Td (El funcionario competente de la Administracion Local de Villasegura,) Tj\n"
    . "0 -15 Td (en virtud de los datos que obran en el Padron Municipal de Habitantes,) Tj\n"
    . "0 -30 Td /F1 12 Tf (CERTIFICA:) Tj\n"
    . "/F2 11 Tf\n0 -25 Td (Que verificados los sistemas y las bases de datos municipales,) Tj\n"
    . "0 -15 Td (el ciudadano/a titular del Documento de Identidad / NIE:) Tj\n"
    . "0 -25 Td /F1 12 Tf ($dni_seguro) Tj\n"
    . "/F2 11 Tf\n0 -30 Td (Figura inscrito/a y dado/a de alta como residente en este municipio) Tj\n"
    . "0 -15 Td (a fecha de emision del presente documento.) Tj\n"
    . "0 -30 Td (Y para que conste y surta los efectos oportunos ante los organismos) Tj\n"
    . "0 -15 Td (solicitantes, se expide el presente volante automatico.) Tj\n"
    . "0 -50 Td /F1 9 Tf (-------------------------------------------------------------------------------------------------) Tj\n"
    . "0 -15 Td (C.S.V. E INFORMACION DE DIAGNOSTICO DEL SERVIDOR:) Tj\n"
    . "/F2 9 Tf\n"
    . $texto_pdf_dinamico 
    . "ET\n";

    // Calculamos la longitud dinámica para que el PDF sea 100% válido
    $stream_len = strlen($stream_content);

    $pdf_content = "%PDF-1.4\n1 0 obj\n<< /Type /Catalog /Pages 2 0 R >>\nendobj\n"
    . "2 0 obj\n<< /Type /Pages /Kids [3 0 R] /Count 1 >>\nendobj\n"
    . "3 0 obj\n<< /Type /Page /Parent 2 0 R /Resources << /Font << /F1 4 0 R /F2 5 0 R >> >> /MediaBox [0 0 595 842] /Contents 6 0 R >>\nendobj\n"
    . "4 0 obj\n<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold >>\nendobj\n"
    . "5 0 obj\n<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>\nendobj\n"
    . "6 0 obj\n<< /Length $stream_len >>\nstream\n"
    . $stream_content
    . "endstream\nendobj\n"
    . "xref\n0 7\n0000000000 65535 f \n0000000009 00000 n \n0000000058 00000 n \n0000000115 00000 n \n0000000236 00000 n \n0000000305 00000 n \n0000000370 00000 n \n"
    . "trailer\n<< /Size 7 /Root 1 0 R >>\nstartxref\n570\n%%EOF";

    $pdf_base64 = base64_encode($pdf_content);
}
?>

<main class="container page-admin" style="padding-top: 4rem; padding-bottom: 6rem; min-height: 70vh;">
    
    <div style="margin-bottom: 2rem;">
        <a href="dashboard.php" class="back-link" style="color: var(--secondary); text-decoration: none; font-weight: 600;"><i class="fas fa-arrow-left"></i> Volver al panel</a>
    </div>

    <div class="page-header" style="margin-bottom: 2rem;">
        <span class="subtitle"><i class="fas fa-file-pdf"></i> HERRAMIENTA INTERNA</span>
        <h1 style="font-size: 2.5rem; color: var(--primary);">Generador de Volantes</h1>
        <p style="color: var(--text-gray); margin-top: 0.5rem;">Expedición rápida de certificados de empadronamiento en formato PDF.</p>
    </div>

    <div style="background: #fffbeb; border: 1px solid #fde68a; color: #92400e; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; font-size: 0.9rem;">
        <i class="fas fa-exclamation-triangle"></i> <strong>Aviso:</strong> Esta herramienta utiliza un motor legacy. Introduzca el DNI sin espacios para evitar errores de compilación.
    </div>

    <div style="background: #ffffff; padding: 2.5rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); max-width: 600px;">
        
        <?php if ($_SERVER["REQUEST_METHOD"] !== "POST"): ?>
            <form method="POST" action="volantes.php">
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="dni" style="display:block; margin-bottom: 0.5rem; font-weight: 600; color: var(--text-dark);">DNI / NIE del solicitante:</label>
                    <input type="text" id="dni" name="dni" placeholder="Ej: 12345678A" required style="width: 100%; padding: 0.8rem; border: 1px solid var(--border-color); border-radius: 8px; font-family: var(--font-body);">
                </div>
                <button type="submit" class="btn-primary" style="width: 100%; padding: 1rem; border-radius: 8px; display: flex; justify-content: center; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-cogs"></i> Procesar Expediente
                </button>
            </form>
        <?php else: ?>
            <div style="text-align: center; background: #f0fdf4; padding: 2rem; border-radius: 12px; border: 1px solid #bbf7d0;">
                <i class="fas fa-check-circle" style="font-size: 3rem; color: #166534; margin-bottom: 1rem;"></i>
                <h3 style="color: #166534; margin-bottom: 0.5rem;">¡Volante generado con éxito!</h3>
                <p style="color: #166534; margin-bottom: 2rem; font-size: 0.95rem;">El sistema ha finalizado el procesamiento de la solicitud para el DNI informado.</p>
                
                <a href="data:application/pdf;base64,<?php echo $pdf_base64; ?>" download="Volante_Oficial.pdf" style="display: inline-flex; align-items: center; gap: 0.5rem; background: #166534; color: white; padding: 1rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: bold; transition: background 0.3s;">
                    <i class="fas fa-file-download"></i> Descargar PDF
                </a>
                
                <div style="margin-top: 1.5rem;">
                    <a href="volantes.php" style="color: #166534; text-decoration: underline; font-size: 0.9rem;">Generar otro volante</a>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php require_once 'includes/footer.php'; ?>