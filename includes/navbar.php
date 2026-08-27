<?php
// includes/navbar.php
// Barra de navegación reutilizable.

// Obtener página actual para resaltar enlace activo
$paginaActual = basename($_SERVER['PHP_SELF']);
function estaActivo($pagina, $actual) {
    return ($actual === $pagina) ? 'active' : '';
}
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-dulce">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                🍰 Dulce Aroma
            </a>

            <!-- Toggler para móvil -->
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#menuPrincipal"
                    aria-controls="menuPrincipal" aria-expanded="false"
                    aria-label="Abrir menú">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú -->
            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link <?= estaActivo('index.php', $paginaActual) ?>"
                           href="index.php">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= estaActivo('productos.php', $paginaActual) ?>"
                           href="productos.php">Productos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= estaActivo('nosotros.php', $paginaActual) ?>"
                           href="nosotros.php">Nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= estaActivo('contacto.php', $paginaActual) ?>"
                           href="contacto.php">Contacto</a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a class="nav-link nav-carrito <?= estaActivo('carrito.php', $paginaActual) ?>"
                           href="carrito.php">
                            🛒 Carrito
                            <?php if ($totalCarritoItems > 0): ?>
                                <span class="carrito-badge"><?= $totalCarritoItems ?></span>
                            <?php endif; ?>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
