<?php
// index.php - Página principal de Dulce Aroma

$pageTitle = 'Dulce Aroma | Repostería & Cafetería Artesanal';
$pageDesc  = 'Bienvenidos a Dulce Aroma, tu cafetería artesanal en San Lorenzo, Ecuador. Disfruta de postres únicos, cafés especiales y momentos memorables.';

require 'includes/header.php';
require 'includes/navbar.php';
require 'data/productos.php';

// Productos destacados (primeros 3 con destacado = true)
$destacados = array_filter($productos, fn($p) => $p['destacado']);
$destacados = array_slice($destacados, 0, 3);
?>

<!-- ===================== HERO ===================== -->
<section id="inicio" class="hero">
    <div class="hero-content">
        <div class="hero-badge">☕ Repostería &amp; Cafetería Artesanal</div>
        <h1>Bienvenidos a <span>Dulce Aroma</span></h1>
        <p>El lugar perfecto para disfrutar un buen café, deliciosos postres y momentos que perduran.</p>
        <div style="display:flex;gap:15px;justify-content:center;flex-wrap:wrap;">
            <a href="productos.php" class="btn-dulce">Ver Productos</a>
            <a href="contacto.php" class="btn-outline">Contáctanos</a>
        </div>
    </div>
</section>

<!-- ===================== PRODUCTOS DESTACADOS ===================== -->
<section id="destacados" class="section section-beige">
    <div class="container">

        <div class="section-title">
            <span class="label">Lo mejor de nuestra cocina</span>
            <h2>Productos Destacados</h2>
            <p>Una selección de nuestras preparaciones más queridas por nuestros clientes.</p>
        </div>

        <div class="grid-productos">
            <?php foreach ($destacados as $producto): ?>
            <div class="card-producto fade-in">
                <div class="card-img-wrap">
                    <img src="<?= htmlspecialchars($producto['imagen']) ?>"
                         alt="<?= htmlspecialchars($producto['nombre']) ?>"
                         loading="lazy">
                    <span class="card-categoria"><?= htmlspecialchars($producto['categoria']) ?></span>
                </div>
                <div class="card-body">
                    <h3><?= htmlspecialchars($producto['nombre']) ?></h3>
                    <p><?= htmlspecialchars($producto['descripcion']) ?></p>
                    <div class="card-footer-prod">
                        <span class="precio">$<?= number_format($producto['precio'], 2) ?></span>
                        <form method="POST" action="carrito.php" style="margin:0;">
                            <input type="hidden" name="accion" value="agregar">
                            <input type="hidden" name="id"     value="<?= (int)$producto['id'] ?>">
                            <button type="submit" class="btn-rosa btn-agregar-carrito">
                                🛒 Agregar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align:center;margin-top:45px;">
            <a href="productos.php" class="btn-dulce">Ver todos los productos</a>
        </div>

    </div>
</section>

<!-- ===================== SOBRE NOSOTROS ===================== -->
<section id="nosotros" class="section">
    <div class="container">
        <div class="nosotros-grid">

            <!-- Imagen -->
            <div>
                <img src="assets/images/cheesecake.jpg"
                     alt="Interior de Dulce Aroma"
                     class="nosotros-img">
            </div>

            <!-- Texto -->
            <div class="nosotros-text">
                <span class="label" style="font-size:0.8rem;letter-spacing:3px;text-transform:uppercase;color:#d4728f;font-weight:700;display:block;margin-bottom:10px;">Nuestra Historia</span>
                <h2>Un aroma que te hace volver</h2>
                <p>En <strong>Dulce Aroma</strong> creemos que los mejores momentos siempre van acompañados de algo delicioso. Nuestra cafetería nació del amor por la repostería artesanal y el café de calidad.</p>
                <p>Cada producto es elaborado con ingredientes frescos y naturales, combinando recetas tradicionales con un toque moderno para ofrecerte una experiencia única.</p>

                <div class="nosotros-valores">
                    <div class="valor-item">
                        <span class="icono">🌿</span>
                        <span>Ingredientes Naturales</span>
                    </div>
                    <div class="valor-item">
                        <span class="icono">👨‍🍳</span>
                        <span>Recetas Artesanales</span>
                    </div>
                    <div class="valor-item">
                        <span class="icono">❤️</span>
                        <span>Elaborado con Amor</span>
                    </div>
                    <div class="valor-item">
                        <span class="icono">☕</span>
                        <span>Café de Calidad</span>
                    </div>
                </div>

                <div style="margin-top:28px;">
                    <a href="nosotros.php" class="btn-dulce">Conoce más sobre nosotros</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===================== BANNER CTA ===================== -->
<section class="banner-cta">
    <div class="container">
        <h2>¿Tienes un evento especial?</h2>
        <p>Creamos tortas y postres personalizados para bodas, cumpleaños y toda ocasión especial.</p>
        <a href="contacto.php" class="btn-outline">Solicitar pedido personalizado</a>
    </div>
</section>

<?php require 'includes/footer.php'; ?>
