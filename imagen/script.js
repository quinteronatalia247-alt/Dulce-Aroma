// ==========================================
// JAVASCRIPT - DULCE AROMA
// ==========================================

// Mensaje de bienvenida
function mostrarMensaje() {
    alert("☕ ¡Bienvenido a Dulce Aroma! Revisa nuestro delicioso menú.");
}

// ==========================================
// BOTÓN VOLVER ARRIBA
// ==========================================

window.addEventListener("scroll", function () {
    const boton = document.getElementById("btnArriba");

    if (boton) {
        if (window.scrollY > 300) {
            boton.style.display = "block";
        } else {
            boton.style.display = "none";
        }
    }
});

// Función para volver arriba
function volverArriba() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

// ==========================================
// VALIDACIÓN DEL FORMULARIO DE CONTACTO
// ==========================================

function validarFormulario() {
    const nombre = document.getElementById("nombre");
    const correo = document.getElementById("correo");
    const mensaje = document.getElementById("mensaje");

    if (!nombre || !correo || !mensaje) {
        return true;
    }

    if (nombre.value.trim() === "") {
        alert("Por favor, ingresa tu nombre.");
        nombre.focus();
        return false;
    }

    if (correo.value.trim() === "") {
        alert("Por favor, ingresa tu correo.");
        correo.focus();
        return false;
    }

    if (mensaje.value.trim() === "") {
        alert("Por favor, escribe un mensaje.");
        mensaje.focus();
        return false;
    }

    alert("✅ Tu mensaje fue enviado correctamente.");
    return true;
}

// ==========================================
// EFECTO DE CARGA
// ==========================================

window.addEventListener("load", function () {
    console.log("Dulce Aroma cargado correctamente ☕");
});