<?php
// carrito.php
// Gestión del carrito de compras mediante sesiones PHP.

$pageTitle = 'Carrito de Compras | Dulce Aroma';
$pageDesc  = 'Revisa y gestiona tu carrito de compras en Dulce Aroma.';

require 'includes/header.php';
require 'data/productos.php';

// ========================================
// LÓGICA DEL CARRITO (ANTES del HTML)
// ========================================

// Inicializar carrito en sesión
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

// ---- AGREGAR PRODUCTO ----
if ($accion === 'agregar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);

    // Buscar el producto en el array
    $productoEncontrado = null;
    foreach ($productos as $p) {
        if ($p['id'] === $id) {
            $productoEncontrado = $p;
            break;
        }
    }

    if ($productoEncontrado) {
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad']++;
        } else {
            $_SESSION['carrito'][$id] = [
                'id'       => $productoEncontrado['id'],
                'nombre'   => $productoEncontrado['nombre'],
                'precio'   => $productoEncontrado['precio'],
                'imagen'   => $productoEncontrado['imagen'],
                'cantidad' => 1,
            ];
        }
        $_SESSION['msg_carrito'] = ""{$productoEncontrado['nombre']}" agregado al carrito.";
    }

    // Redirigir a la página de origen o al carrito
    $redirigir = isset($_POST['redirigir']) ? htmlspecialchars($_POST['redirigir']) : 'carrito.php';
    header("Location: $redirigir");
    exit;
}

// ---- ELIMINAR UN PRODUCTO ----
if ($accion === 'eliminar') {
    $id = (int)($_GET['id'] ?? 0);
    if (isset($_SESSION['carrito'][$id])) {
        unset($_SESSION['carrito'][$id]);
    }
    header('Location: carrito.php');
    exit;
}

// ---- VACIAR CARRITO ----
if ($accion === 'vaciar') {
    $_SESSION['carrito'] = [];
    header('Location: carrito.php');
    exit;
}

// ---- ACTUALIZAR CANTIDAD ----
if ($accion === 'actualizar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = (int)($_POST['id']       ?? 0);
    $cantidad = (int)($_POST['cantidad'] ?? 1);
    if (isset($_SESSION['carrito'][$id])) {
        if ($cantidad <= 0) {
            unset($_SESSION['carrito'][$id]);
        } else {
            $_SESSION['carrito'][$id]['cantidad'] = min($cantidad, 99);
        }
    }
    header('Location: carrito.php');
    exit;
}

// ---- CALCULAR TOTAL ----
$total = 0.0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad'];
}

require 'includes/navbar.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <h1>🛒 Tu Carrito</h1>
        <p>Revisa los productos seleccionados y confirma tu pedido.</p>
    </div>
</section>

<!-- CARRITO CONTENIDO -->
<section class="section">
    <div class="container">

        <?php if (empty($_SESSION['carrito'])): ?>
        <!-- CARRITO VACÍO -->
        <div class="carrito-vacio">
            <span class="icono-grande">🛒</span>
            <h2 style="font-family:'Playfair Display',serif;color:var(--cafe);margin-bottom:10px;">
                Tu carrito está vacío
            </h2>
            <p style="color:#7a5c4a;margin-bottom:25px;">
                ¡Agrega algunos de nuestros deliciosos productos!
            </p>
            <a href="productos.php" class="btn-dulce">Ver Productos</a>
        </div>

        <?php else: ?>

        <!-- TABLA DE PRODUCTOS -->
        <div style="overflow-x:auto;">
            <table class="tabla-carrito">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carrito'] as $item): ?>
                    <tr>
                        <!-- Imagen + Nombre -->
                        <td>
                            <div style="display:flex;align-items:center;gap:14px;">
                                <img src="<?= htmlspecialchars($item['imagen']) ?>"
                                     alt="<?= htmlspecialchars($item['nombre']) ?>"
                                     class="prod-carrito-img">
                                <span style="font-weight:700;">
                                    <?= htmlspecialchars($item['nombre']) ?>
                                </span>
                            </div>
                        </td>

                        <!-- Precio unitario -->
                        <td>$<?= number_format($item['precio'], 2) ?></td>

                        <!-- Cantidad (formulario de actualización) -->
                        <td>
                            <form method="POST" action="carrito.php" style="display:flex;align-items:center;gap:6px;margin:0;">
                                <input type="hidden" name="accion" value="actualizar">
                                <input type="hidden" name="id"     value="<?= (int)$item['id'] ?>">
                                <input type="number" name="cantidad"
                                       value="<?= (int)$item['cantidad'] ?>"
                                       min="0" max="99"
                                       style="width:60px;padding:5px 8px;border:2px solid #e8d5c4;
                                              border-radius:8px;text-align:center;font-size:0.95rem;
                                              font-family:inherit;color:var(--cafe);">
                                <button type="submit" title="Actualizar"
                                        style="background:none;border:none;font-size:1rem;cursor:pointer;
                                               color:var(--cafe);padding:2px 4px;" class="btn-success-dulce">
                                    ✓
                                </button>
                            </form>
                        </td>

                        <!-- Subtotal -->
                        <td style="font-weight:700;">
                            $<?= number_format($item['precio'] * $item['cantidad'], 2) ?>
                        </td>

                        <!-- Eliminar -->
                        <td>
                            <a href="carrito.php?accion=eliminar&id=<?= (int)$item['id'] ?>"
                               class="btn-peligro btn-eliminar-producto">
                                🗑️ Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- RESUMEN Y ACCIONES -->
        <div class="resumen-carrito">
            <table>
                <tr>
                    <td>Subtotal:</td>
                    <td style="text-align:right;">$<?= number_format($total, 2) ?></td>
                </tr>
                <tr>
                    <td style="font-size:0.85rem;color:#7a5c4a;">Envío:</td>
                    <td style="text-align:right;font-size:0.85rem;color:#7a5c4a;">A coordinar</td>
                </tr>
                <tr class="total-fila">
                    <td>Total:</td>
                    <td style="text-align:right;">$<?= number_format($total, 2) ?></td>
                </tr>
            </table>

            <div class="acciones-carrito" style="margin-top:22px;">
                <a href="productos.php" class="btn-rosa">
                    ← Seguir comprando
                </a>
                <a href="carrito.php?accion=vaciar"
                   id="btn-vaciar-carrito"
                   class="btn-peligro"
                   style="padding:11px 22px;">
                    🗑️ Vaciar carrito
                </a>
                <a href="contacto.php" class="btn-dulce">
                    ✅ Confirmar pedido
                </a>
            </div>

            <p style="font-size:0.82rem;color:#999;margin-top:14px;text-align:center;">
                * Los pedidos se confirman por WhatsApp o correo electrónico.
            </p>
        </div>

        <?php endif; ?>

    </div>
</section>

<?php require 'includes/footer.php'; ?>
