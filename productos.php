<?php
// productos.php - Catálogo completo de productos

$pageTitle = 'Productos | Dulce Aroma';
$pageDesc  = 'Explora nuestro catálogo de cafés, postres y repostería artesanal en Dulce Aroma.';

require 'includes/header.php';
require 'includes/navbar.php';
require 'data/productos.php';

// Obtener categorías únicas
$categorias = array_unique(array_column($productos, 'categoria'));

// Filtro por categoría (GET)
$categoriaFiltro = isset($_GET['categoria']) ? trim($_GET['categoria']) : '';
if ($categoriaFiltro && in_array($categoriaFiltro, $categorias)) {
    $productosMostrar = array_filter($productos, fn($p) => $p['categoria'] === $categoriaFiltro);
} else {
    $productosMostrar = $productos;
    $categoriaFiltro  = '';
}
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <h1>🍰 Nuestros Productos</h1>
        <p>Cafés especiales, postres artesanales y mucho más.</p>
    </div>
</section>

<!-- FILTROS -->
<section style="background:var(--beige);padding:25px 0;border-bottom:2px solid #e8d5c4;">
    <div class="container" style="display:flex;gap:10px;flex-wrap:wrap;align-items:center;">
        <span style="font-weight:700;color:var(--cafe);margin-right:5px;">Filtrar por:</span>
        <a href="productos.php"
           class="<?= $categoriaFiltro === '' ? 'btn-dulce' : 'btn-rosa' ?>"
           style="font-size:0.85rem;padding:7px 18px;">
           Todos
        </a>
        <?php foreach ($categorias as $cat): ?>
        <a href="productos.php?categoria=<?= urlencode($cat) ?>"
           class="<?= $categoriaFiltro === $cat ? 'btn-dulce' : 'btn-rosa' ?>"
           style="font-size:0.85rem;padding:7px 18px;">
           <?= htmlspecialchars($cat) ?>
        </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- CATÁLOGO -->
<section class="section">
    <div class="container">

        <?php if (empty($productosMostrar)): ?>
            <p style="text-align:center;color:var(--cafe);font-size:1.1rem;">
                No hay productos en esta categoría.
            </p>
        <?php else: ?>

        <!-- Mensaje de éxito al agregar -->
        <?php if (isset($_SESSION['msg_carrito'])): ?>
            <div class="alerta alerta-exito" style="max-width:500px;margin:0 auto 30px;">
                ✅ <?= htmlspecialchars($_SESSION['msg_carrito']) ?>
            </div>
            <?php unset($_SESSION['msg_carrito']); ?>
        <?php endif; ?>

        <div class="grid-productos">
            <?php foreach ($productosMostrar as $producto): ?>
            <div class="card-producto">
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
                            <input type="hidden" name="accion"  value="agregar">
                            <input type="hidden" name="id"      value="<?= (int)$producto['id'] ?>">
                            <input type="hidden" name="redirigir" value="productos.php">
                            <button type="submit" class="btn-rosa btn-agregar-carrito">
                                🛒 Agregar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php endif; ?>

    </div>
</section>

<?php require 'includes/footer.php'; ?>
