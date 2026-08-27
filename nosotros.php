<?php
// nosotros.php - Página Sobre Nosotros

$pageTitle = 'Sobre Nosotros | Dulce Aroma';
$pageDesc  = 'Conoce la historia de Dulce Aroma, nuestra misión, valores y el equipo detrás de cada preparación artesanal.';

require 'includes/header.php';
require 'includes/navbar.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <h1>❤️ Sobre Nosotros</h1>
        <p>La historia y el amor detrás de cada preparación artesanal.</p>
    </div>
</section>

<!-- HISTORIA -->
<section class="section">
    <div class="container">
        <div class="nosotros-grid">

            <div>
                <img src="assets/images/latte.jpg"
                     alt="Preparando café en Dulce Aroma"
                     class="nosotros-img">
            </div>

            <div class="nosotros-text">
                <span class="label" style="font-size:0.8rem;letter-spacing:3px;text-transform:uppercase;color:#d4728f;font-weight:700;display:block;margin-bottom:10px;">Nuestra Historia</span>
                <h2>Nació del amor por los sabores</h2>
                <p><strong>Dulce Aroma</strong> es una cafetería artesanal ubicada en San Lorenzo, Ecuador, fundada en 2022 por un grupo de emprendedores apasionados por la repostería y el buen café.</p>
                <p>Todo comenzó con recetas familiares que pasaron de generación en generación. Hoy, llevamos esa tradición a cada taza, cada pastel y cada galleta que preparamos con ingredientes frescos y locales.</p>
                <p>Nuestro espacio fue diseñado para que te sientas como en casa: cálido, acogedor y lleno del aroma que nos da nombre.</p>
            </div>

        </div>
    </div>
</section>

<!-- MISIÓN Y VALORES -->
<section class="section section-beige">
    <div class="container">

        <div class="section-title">
            <span class="label">Lo que nos guía</span>
            <h2>Misión &amp; Valores</h2>
            <p>Comprometidos con la calidad, la autenticidad y el bienestar de nuestra comunidad.</p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:25px;">

            <?php
            $valores = [
                ['icono' => '🌿', 'titulo' => 'Ingredientes Naturales',  'desc' => 'Usamos productos frescos y naturales, priorizando proveedores locales de Ecuador.'],
                ['icono' => '👨‍🍳', 'titulo' => 'Artesanal',              'desc' => 'Cada preparación es hecha a mano, con dedicación y respeto por las recetas tradicionales.'],
                ['icono' => '❤️', 'titulo' => 'Con Amor',                'desc' => 'Creemos que la comida preparada con amor sabe diferente. Ese es nuestro ingrediente secreto.'],
                ['icono' => '🌍', 'titulo' => 'Comunidad',               'desc' => 'Apoyamos a productores locales y nos esforzamos por ser un lugar de encuentro comunitario.'],
            ];
            foreach ($valores as $v): ?>
            <div style="background:#fff;border-radius:16px;padding:30px;text-align:center;box-shadow:0 5px 20px rgba(107,63,42,0.1);transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size:2.5rem;margin-bottom:14px;"><?= $v['icono'] ?></div>
                <h3 style="font-family:'Playfair Display',serif;color:var(--cafe);font-size:1.15rem;margin-bottom:10px;">
                    <?= htmlspecialchars($v['titulo']) ?>
                </h3>
                <p style="color:#7a5c4a;font-size:0.9rem;"><?= htmlspecialchars($v['desc']) ?></p>
            </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>

<!-- EQUIPO -->
<section class="section">
    <div class="container">

        <div class="section-title">
            <span class="label">Las personas detrás</span>
            <h2>Nuestro Equipo</h2>
            <p>Un equipo apasionado y comprometido con ofrecerte siempre lo mejor.</p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:25px;text-align:center;">
            <?php
            $equipo = [
                ['nombre' => 'Ana Moreno',    'rol' => 'Chef Pastelera',       'emoji' => '👩‍🍳'],
                ['nombre' => 'Carlos Ruiz',   'rol' => 'Barista Principal',    'emoji' => '☕'],
                ['nombre' => 'Sofía Pérez',   'rol' => 'Repostera Artesanal',  'emoji' => '🎂'],
                ['nombre' => 'Luis Méndez',   'rol' => 'Atención al Cliente',  'emoji' => '😊'],
            ];
            foreach ($equipo as $miembro): ?>
            <div style="background:var(--beige);border-radius:16px;padding:30px 20px;transition:transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size:3.5rem;margin-bottom:12px;"><?= $miembro['emoji'] ?></div>
                <h3 style="font-family:'Playfair Display',serif;color:var(--cafe);font-size:1.1rem;margin-bottom:5px;">
                    <?= htmlspecialchars($miembro['nombre']) ?>
                </h3>
                <span style="font-size:0.85rem;color:#7a5c4a;font-weight:700;">
                    <?= htmlspecialchars($miembro['rol']) ?>
                </span>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- CTA -->
<section class="banner-cta">
    <div class="container">
        <h2>¿Quieres visitarnos?</h2>
        <p>Estamos en San Lorenzo, Ecuador. Te esperamos de lunes a domingo.</p>
        <a href="contacto.php" class="btn-outline">Contáctanos</a>
    </div>
</section>

<?php require 'includes/footer.php'; ?>
