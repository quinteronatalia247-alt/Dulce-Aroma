<?php
// includes/header.php
// Inicia sesión y escribe el <head> HTML común a todas las páginas.

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Determinar cuántos ítems hay en el carrito
$totalCarritoItems = 0;
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        $totalCarritoItems += (int)$item['cantidad'];
    }
}

// $pageTitle y $pageDesc deben definirse ANTES de hacer include del header
if (!isset($pageTitle)) $pageTitle = 'Dulce Aroma | Repostería & Cafetería';
if (!isset($pageDesc))  $pageDesc  = 'Descubre Dulce Aroma, tu cafetería artesanal favorita. Postres, cafés y momentos especiales en San Lorenzo, Ecuador.';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Playfair Display + Lato) -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
