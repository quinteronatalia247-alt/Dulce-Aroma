# 🍰 Dulce Aroma

## Descripción

**Dulce Aroma** es una aplicación web de repostería y cafetería artesanal desarrollada en PHP puro. Permite a los usuarios explorar el catálogo de productos, agregarlos a un carrito de compras administrado con sesiones de PHP, conocer la historia del negocio y ponerse en contacto a través de un formulario validado.

El proyecto fue desarrollado como trabajo grupal práctico, con enfoque en PHP, HTML5, CSS3 y JavaScript vanilla, sin dependencias de frameworks como React, Vue o Angular.

---

## Tecnologías

| Tecnología | Uso |
|---|---|
| **PHP 7.4+** | Lógica del servidor, sesiones, plantillas, validaciones |
| **HTML5** | Estructura semántica de las páginas |
| **CSS3** | Estilos modernos, responsive design, animaciones |
| **JavaScript** | Interacciones, validaciones del lado del cliente |
| **Bootstrap 5** | Grid responsive y componentes de navbar |
| **Google Fonts** | Tipografías Playfair Display y Lato |

---

## Funcionalidades

- 🛍️ **Catálogo de productos** – 10 productos generados dinámicamente con PHP
- 🔍 **Filtro por categoría** – Filtra el catálogo por Cafés, Postres, Bebidas Frías y Panadería
- 🛒 **Carrito de compras** – Basado en sesiones PHP (`$_SESSION`)
  - Agregar productos desde cualquier página
  - Actualizar cantidades
  - Eliminar productos individuales
  - Vaciar el carrito completo
  - Cálculo automático de subtotales y total
- 📬 **Formulario de contacto** – Con validación en PHP y JavaScript
- 📱 **Diseño responsive** – Compatible con móvil, tablet y escritorio
- 🧭 **Navegación modular** – Componentes reutilizables con `include`/`require`

---

## Estructura del Proyecto

```
Dulce-Aroma/
│
├── assets/
│   ├── css/
│   │   └── style.css          # Estilos globales de la aplicación
│   ├── js/
│   │   └── script.js          # JavaScript para interacciones y validaciones
│   └── images/
│       └── *.jpg              # Imágenes de los productos
│
├── includes/
│   ├── header.php             # <head> HTML, Bootstrap, Google Fonts, sesión
│   ├── navbar.php             # Barra de navegación reutilizable
│   └── footer.php            # Pie de página y carga de scripts
│
├── data/
│   └── productos.php          # Array PHP con todos los productos
│
├── index.php                  # Página de inicio
├── productos.php              # Catálogo completo con filtros
├── nosotros.php               # Historia, valores y equipo
├── contacto.php               # Formulario de contacto
├── procesar_contacto.php      # Procesamiento POST del formulario
├── carrito.php                # Gestión completa del carrito (sesiones)
└── README.md                  # Este archivo
```

---

## Requisitos

- Servidor compatible con **PHP 7.4 o superior**
- Módulo de sesiones PHP habilitado (`session_start`)
- No requiere base de datos
- Conexión a internet para cargar Bootstrap y Google Fonts desde CDN (o se pueden descargar localmente)

---

## Ejecución Local

### Opción 1: Servidor PHP integrado (más sencillo)

```bash
# Desde la carpeta raíz del proyecto
php -S localhost:8000
```

Luego abre tu navegador en:

```
http://localhost:8000
```

### Opción 2: XAMPP

1. Instala [XAMPP](https://www.apachefriends.org/)
2. Copia la carpeta `Dulce-Aroma` dentro de `C:\xampp\htdocs\`
3. Inicia Apache desde el Panel de Control de XAMPP
4. Abre en tu navegador:
   ```
   http://localhost/Dulce-Aroma/
   ```

### Opción 3: Laragon

1. Instala [Laragon](https://laragon.org/)
2. Copia la carpeta en `C:\laragon\www\Dulce-Aroma\`
3. Abre en tu navegador:
   ```
   http://dulce-aroma.test/
   ```

---

## Cómo Probar el Carrito

1. Abre el proyecto en tu servidor local.
2. Ve a **Productos** (`productos.php`).
3. Haz clic en **"Agregar"** en cualquier producto.
4. Verás el número de ítems en el ícono del carrito (🛒) en el navbar.
5. Ve a **Carrito** (`carrito.php`) para:
   - Ver los productos seleccionados
   - Cambiar cantidades
   - Eliminar productos
   - Vaciar el carrito
   - Ver el total actualizado

---

## Despliegue en Hosting Gratuito

### Opción 1: InfinityFree (recomendado)

1. Crea una cuenta en [infinityfree.net](https://infinityfree.net/)
2. Crea un nuevo hosting gratuito
3. Accede al **File Manager** o usa FTP con FileZilla
4. Sube todos los archivos del proyecto al directorio `htdocs/`
5. Accede a tu dominio gratuito (ej: `tudominio.epizy.com`)

### Opción 2: 000webhost

1. Crea una cuenta en [000webhost.com](https://www.000webhost.com/)
2. Crea un sitio web
3. Usa el **File Manager** para subir los archivos
4. Tu sitio estará disponible en `tudominio.000webhostapp.com`

### Opción 3: Hostinger (plan gratuito limitado)

1. Regístrate en [hostinger.com](https://www.hostinger.com/)
2. Sube los archivos vía FTP o File Manager

### Notas Importantes para el Despliegue

- Las sesiones de PHP funcionan en todos los hostings PHP estándar.
- Verifica que el hosting soporte **PHP 7.4+**.
- Las rutas de imágenes son relativas; funcionan sin cambios.
- Si el hosting requiere una carpeta `public_html`, sube todos los archivos ahí.

---

## Pasos Finales para Obtener el Enlace Público

1. ✅ Sube todos los archivos al hosting.
2. ✅ Verifica que `index.php` cargue correctamente.
3. ✅ Prueba el carrito y el formulario de contacto.
4. ✅ Comparte la URL pública con tu equipo o profesor.

---

## Créditos

Proyecto desarrollado como trabajo grupal práctico de desarrollo web con PHP.  
**Dulce Aroma** – San Lorenzo, Ecuador © 2026