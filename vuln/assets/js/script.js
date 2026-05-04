document.addEventListener('DOMContentLoaded', () => {
    // Lógica para los filtros de Trámites
    const filterBtns = document.querySelectorAll('.filter-btn');
    const tramiteCards = document.querySelectorAll('.tramite-card');

    if(filterBtns.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // 1. Quitar clase active de todos y ponerla al clickeado
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                // 2. Obtener el filtro seleccionado
                const filterValue = btn.getAttribute('data-filter');

                // 3. Mostrar/Ocultar tarjetas
                tramiteCards.forEach(card => {
                    if (filterValue === 'todos' || card.getAttribute('data-category') === filterValue) {
                        card.style.display = 'flex';
                        // Pequeña animación de entrada
                        card.style.animation = 'fadeIn 0.5s ease forwards';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }
});

// Añade esta animación CSS a tu style.css o inyéctala
const style = document.createElement('style');
style.innerHTML = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);

document.addEventListener('DOMContentLoaded', () => {
    const accordions = document.querySelectorAll('.accordion-header');

    accordions.forEach(acc => {
        acc.addEventListener('click', function() {
            // Cierra los demás acordeones abiertos
            accordions.forEach(otherAcc => {
                if (otherAcc !== this) {
                    otherAcc.classList.remove('active');
                    otherAcc.nextElementSibling.style.maxHeight = null;
                    otherAcc.querySelector('i').style.transform = 'rotate(0deg)';
                }
            });

            // Alterna el estado del actual
            this.classList.toggle('active');
            const content = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.style.transform = 'rotate(180deg)';
                icon.style.transition = 'transform 0.3s ease';
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    // Sistema de Preguntas Frecuentes (Acordeón)
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const header = item.querySelector('.faq-header');
        
        header.addEventListener('click', () => {
            const isActive = item.classList.contains('active');

            // Cerrar todos primero
            faqItems.forEach(otherItem => {
                otherItem.classList.remove('active');
                otherItem.querySelector('.faq-content').style.maxHeight = null;
            });

            // Si no estaba activo, abrirlo (esto activa el borde azul vía CSS)
            if (!isActive) {
                item.classList.add('active');
                const content = item.querySelector('.faq-content');
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    // --- Lógica de Pestañas (Admin Dashboard) ---
    const adminTabs = document.querySelectorAll('.admin-tab-btn');
    const adminContents = document.querySelectorAll('.admin-tab-content');

    if (adminTabs.length > 0) {
        adminTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Quitar clases activas
                adminTabs.forEach(t => t.classList.remove('active'));
                adminContents.forEach(c => c.classList.remove('active'));

                // Activar la pestaña clicada
                tab.classList.add('active');
                const targetId = tab.getAttribute('data-target');
                document.getElementById(targetId).classList.add('active');
            });
        });
    }
});