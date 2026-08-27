<?php
// includes/footer.php
// Pie de página y carga de scripts comunes.
?>
<!-- Botón scroll to top -->
<button id="btn-scroll-top" title="Volver arriba"
    style="display:none;position:fixed;bottom:30px;right:30px;width:46px;height:46px;
           border-radius:50%;background:linear-gradient(135deg,#6b3f2a,#3d2016);
           border:none;color:white;font-size:1.1rem;cursor:pointer;
           align-items:center;justify-content:center;z-index:999;
           box-shadow:0 4px 15px rgba(0,0,0,0.3);transition:all 0.3s;">
    ↑
</button>

<footer class="footer">
    <div class="container">
        <div class="footer-grid">

            <!-- Columna 1: Marca -->
            <div>
                <span class="footer-brand">🍰 Dulce Aroma</span>
                <p>Tu cafetería artesanal de confianza en San Lorenzo, Ecuador. Postres, cafés y momentos especiales desde 2022.</p>
                <p style="margin-top:10px;">
                    <a href="mailto:dulcearoma@gmail.com"
                       style="color:rgba(255,255,255,0.7);text-decoration:none;">
                       ✉️ dulcearoma@gmail.com
                    </a>
                </p>
            </div>

            <!-- Columna 2: Navegación -->
            <div>
                <h4>Navegación</h4>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <li><a href="carrito.php">🛒 Carrito</a></li>
                </ul>
            </div>

            <!-- Columna 3: Información -->
            <div>
                <h4>Horario</h4>
                <p>📅 Lunes – Viernes<br>7:00 AM – 8:00 PM</p>
                <p style="margin-top:10px;">📅 Sábados y Domingos<br>8:00 AM – 6:00 PM</p>
                <p style="margin-top:10px;">📞 099 999 9999</p>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© <?= date('Y') ?> Dulce Aroma &mdash; Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Script personalizado -->
<script src="assets/js/script.js"></script>
</body>
</html>
