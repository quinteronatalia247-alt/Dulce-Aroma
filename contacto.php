<?php
// contacto.php - Formulario de Contacto

$pageTitle = 'Contacto | Dulce Aroma';
$pageDesc  = 'Contáctanos en Dulce Aroma. Estamos en San Lorenzo, Ecuador. Escríbenos, llámanos o visítanos.';

require 'includes/header.php';
require 'includes/navbar.php';

// Recuperar mensaje de procesar_contacto.php si existe
$msgExito = $_SESSION['contacto_exito'] ?? '';
$msgError = $_SESSION['contacto_error'] ?? '';
$datosAnteriores = $_SESSION['contacto_datos'] ?? [];
unset($_SESSION['contacto_exito'], $_SESSION['contacto_error'], $_SESSION['contacto_datos']);
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <h1>📬 Contáctanos</h1>
        <p>Estamos listos para atenderte. Escríbenos o visítanos en nuestra cafetería.</p>
    </div>
</section>

<!-- CONTACTO CONTENIDO -->
<section class="section">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1.2fr;gap:50px;align-items:start;">

            <!-- Información de Contacto -->
            <div class="info-contacto">
                <h3>¡Nos encantaría saber de ti!</h3>
                <p>Escríbenos para pedidos especiales, preguntas o simplemente para saludar.</p>

                <div class="info-item">
                    <span class="info-icono">📍</span>
                    <div>
                        <h4>Dirección</h4>
                        <p>San Lorenzo, Esmeraldas, Ecuador</p>
                    </div>
                </div>

                <div class="info-item">
                    <span class="info-icono">📞</span>
                    <div>
                        <h4>Teléfono</h4>
                        <p>099 999 9999</p>
                    </div>
                </div>

                <div class="info-item">
                    <span class="info-icono">✉️</span>
                    <div>
                        <h4>Correo Electrónico</h4>
                        <p>dulcearoma@gmail.com</p>
                    </div>
                </div>

                <div class="info-item">
                    <span class="info-icono">🕐</span>
                    <div>
                        <h4>Horario de Atención</h4>
                        <p>Lun – Vie: 7:00 AM – 8:00 PM<br>Sáb – Dom: 8:00 AM – 6:00 PM</p>
                    </div>
                </div>

            </div>

            <!-- Formulario -->
            <div class="form-section">
                <h2 style="font-family:'Playfair Display',serif;color:var(--cafe);margin-bottom:6px;font-size:1.7rem;">
                    Envíanos un Mensaje
                </h2>
                <p style="color:#7a5c4a;margin-bottom:25px;font-size:0.92rem;">
                    Todos los campos marcados con <span style="color:#d4728f;font-weight:700;">*</span> son obligatorios.
                </p>

                <!-- Alertas -->
                <?php if ($msgExito): ?>
                    <div class="alerta alerta-exito">✅ <?= htmlspecialchars($msgExito) ?></div>
                <?php endif; ?>
                <?php if ($msgError): ?>
                    <div class="alerta alerta-error">⚠️ <?= htmlspecialchars($msgError) ?></div>
                <?php endif; ?>

                <form id="form-contacto" method="POST" action="procesar_contacto.php" novalidate>

                    <div class="form-group">
                        <label for="nombre">Nombre completo <span>*</span></label>
                        <input type="text" id="nombre" name="nombre"
                               class="form-control"
                               placeholder="Tu nombre completo"
                               value="<?= htmlspecialchars($datosAnteriores['nombre'] ?? '') ?>"
                               maxlength="100" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico <span>*</span></label>
                        <input type="email" id="email" name="email"
                               class="form-control"
                               placeholder="tucorreo@ejemplo.com"
                               value="<?= htmlspecialchars($datosAnteriores['email'] ?? '') ?>"
                               maxlength="120" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono <small style="font-weight:400;color:#999;">(opcional)</small></label>
                        <input type="tel" id="telefono" name="telefono"
                               class="form-control"
                               placeholder="09X XXX XXXX"
                               value="<?= htmlspecialchars($datosAnteriores['telefono'] ?? '') ?>"
                               maxlength="20">
                    </div>

                    <div class="form-group">
                        <label for="asunto">Asunto</label>
                        <input type="text" id="asunto" name="asunto"
                               class="form-control"
                               placeholder="Ej: Pedido personalizado, consulta..."
                               value="<?= htmlspecialchars($datosAnteriores['asunto'] ?? '') ?>"
                               maxlength="150">
                    </div>

                    <div class="form-group">
                        <label for="mensaje">Mensaje <span>*</span></label>
                        <textarea id="mensaje" name="mensaje"
                                  class="form-control"
                                  placeholder="Escribe tu mensaje aquí (mínimo 10 caracteres)..."
                                  rows="5" maxlength="1000" required><?= htmlspecialchars($datosAnteriores['mensaje'] ?? '') ?></textarea>
                    </div>

                    <button type="submit" class="btn-dulce" style="width:100%;padding:14px;">
                        ✉️ Enviar Mensaje
                    </button>

                </form>
            </div>

        </div>
    </div>
</section>

<?php require 'includes/footer.php'; ?>

<style>
/* Responsive para la sección de contacto */
@media (max-width: 768px) {
    .section .container > div[style*="grid-template-columns:1fr 1.2fr"] {
        grid-template-columns: 1fr !important;
    }
}
</style>
