// =============================================
// DULCE AROMA - Script Principal
// =============================================

document.addEventListener('DOMContentLoaded', () => {

    // ---- Navbar: resaltar enlace activo ----
    const currentPage = window.location.pathname.split('/').pop() || 'index.php';
    document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (href && currentPage === href) {
            link.classList.add('active');
        }
    });

    // ---- Animación de entrada para tarjetas ----
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -30px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.card-producto').forEach((card, i) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(25px)';
        card.style.transition = `opacity 0.5s ease ${i * 0.07}s, transform 0.5s ease ${i * 0.07}s`;
        observer.observe(card);
    });

    // ---- Validación del formulario de contacto ----
    const formContacto = document.getElementById('form-contacto');
    if (formContacto) {
        formContacto.addEventListener('submit', (e) => {
            let valido = true;

            // Limpiar errores previos
            document.querySelectorAll('.campo-error').forEach(el => el.remove());
            document.querySelectorAll('.form-control.error').forEach(el => el.classList.remove('error'));

            // Nombre
            const nombre = document.getElementById('nombre');
            if (!nombre || nombre.value.trim().length < 2) {
                mostrarError(nombre, 'El nombre debe tener al menos 2 caracteres.');
                valido = false;
            }

            // Email
            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailRegex.test(email.value.trim())) {
                mostrarError(email, 'Por favor, ingresa un correo electrónico válido.');
                valido = false;
            }

            // Mensaje
            const mensaje = document.getElementById('mensaje');
            if (!mensaje || mensaje.value.trim().length < 10) {
                mostrarError(mensaje, 'El mensaje debe tener al menos 10 caracteres.');
                valido = false;
            }

            if (!valido) {
                e.preventDefault();
                // Scroll al primer error
                const primerError = document.querySelector('.campo-error');
                if (primerError) {
                    primerError.previousElementSibling.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });
    }

    function mostrarError(campo, mensaje) {
        if (!campo) return;
        campo.classList.add('error');
        const span = document.createElement('span');
        span.className = 'campo-error';
        span.style.cssText = 'color:#e74c3c;font-size:0.82rem;display:block;margin-top:4px;font-weight:600;';
        span.textContent = mensaje;
        campo.parentNode.appendChild(span);
    }

    // ---- Confirmación para eliminar producto del carrito ----
    document.querySelectorAll('.btn-eliminar-producto').forEach(btn => {
        btn.addEventListener('click', (e) => {
            if (!confirm('¿Deseas eliminar este producto del carrito?')) {
                e.preventDefault();
            }
        });
    });

    // ---- Confirmación para vaciar carrito ----
    const btnVaciar = document.getElementById('btn-vaciar-carrito');
    if (btnVaciar) {
        btnVaciar.addEventListener('click', (e) => {
            if (!confirm('¿Estás seguro de que deseas vaciar el carrito?')) {
                e.preventDefault();
            }
        });
    }

    // ---- Feedback visual al agregar al carrito ----
    document.querySelectorAll('.btn-agregar-carrito').forEach(btn => {
        btn.addEventListener('click', function () {
            const textoOriginal = this.textContent;
            this.textContent = '✓ Agregado';
            this.style.background = 'linear-gradient(135deg, #27ae60, #1e8449)';
            this.disabled = true;
            setTimeout(() => {
                this.textContent = textoOriginal;
                this.style.background = '';
                this.disabled = false;
            }, 1500);
        });
    });

    // ---- Scroll suave hacia arriba (botón flotante) ----
    const btnTop = document.getElementById('btn-scroll-top');
    if (btnTop) {
        window.addEventListener('scroll', () => {
            btnTop.style.display = window.scrollY > 300 ? 'flex' : 'none';
        });
        btnTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

});