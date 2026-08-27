<?php
// procesar_contacto.php
// Recibe y valida el formulario de contacto por POST.

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Solo aceptar método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contacto.php');
    exit;
}

// ---- Sanitización de datos ----
$nombre   = htmlspecialchars(trim($_POST['nombre']   ?? ''));
$email    = htmlspecialchars(trim($_POST['email']    ?? ''));
$telefono = htmlspecialchars(trim($_POST['telefono'] ?? ''));
$asunto   = htmlspecialchars(trim($_POST['asunto']   ?? ''));
$mensaje  = htmlspecialchars(trim($_POST['mensaje']  ?? ''));

$errores = [];

// ---- Validaciones ----
if (strlen($nombre) < 2) {
    $errores[] = 'El nombre debe tener al menos 2 caracteres.';
}

if (!filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL)) {
    $errores[] = 'Por favor ingresa un correo electrónico válido.';
}

if (strlen($mensaje) < 10) {
    $errores[] = 'El mensaje debe tener al menos 10 caracteres.';
}

// ---- Respuesta ----
if (!empty($errores)) {
    // Guardar errores y datos para mostrar en el formulario
    $_SESSION['contacto_error'] = implode(' | ', $errores);
    $_SESSION['contacto_datos'] = [
        'nombre'   => $nombre,
        'email'    => $email,
        'telefono' => $telefono,
        'asunto'   => $asunto,
        'mensaje'  => $mensaje,
    ];
    header('Location: contacto.php');
    exit;
}

// ---- Procesamiento exitoso ----
// En un servidor real con mail() habilitado, aquí se podría enviar el correo.
// Por ahora, simplemente registramos el éxito en sesión.

// Ejemplo de envío de correo (comentado, activar si el servidor lo soporta):
/*
$asuntoEmail = "Nuevo mensaje de contacto - Dulce Aroma";
$cuerpo  = "Nombre: $nombre\n";
$cuerpo .= "Email: $email\n";
$cuerpo .= "Teléfono: $telefono\n";
$cuerpo .= "Asunto: $asunto\n\n";
$cuerpo .= "Mensaje:\n$mensaje";
mail('dulcearoma@gmail.com', $asuntoEmail, $cuerpo, "From: $email");
*/

$_SESSION['contacto_exito'] = "¡Gracias, {$nombre}! Tu mensaje ha sido recibido. Nos pondremos en contacto contigo pronto.";
header('Location: contacto.php');
exit;
