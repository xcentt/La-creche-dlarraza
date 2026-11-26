document.querySelectorAll('[data-auth-form]').forEach((form) => {
    const password = form.querySelector('[data-password]');
    const confirmation = form.querySelector('[data-password-confirmation]');
    const status = form.querySelector('[data-form-status]');

    const validatePasswordConfirmation = () => {
        if (password && confirmation) {
            confirmation.setCustomValidity(
                confirmation.value && confirmation.value !== password.value
                    ? 'Las contraseñas no coinciden.'
                    : '',
            );
        }
    };

    password?.addEventListener('input', validatePasswordConfirmation);
    confirmation?.addEventListener('input', validatePasswordConfirmation);

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        if (status) {
            status.textContent = 'Validación correcta. El acceso aún no está conectado.';
        }
    });
});

const dashboardMenuToggle = document.querySelector('[data-dashboard-menu-toggle]');
const dashboardMenu = document.querySelector('[data-dashboard-navigation]');

if (dashboardMenuToggle && dashboardMenu) {
    const openMenuIcon = dashboardMenuToggle.querySelector('[data-dashboard-menu-open-icon]');
    const closeMenuIcon = dashboardMenuToggle.querySelector('[data-dashboard-menu-close-icon]');

    const setDashboardMenuExpanded = (expanded) => {
        dashboardMenuToggle.setAttribute('aria-expanded', String(expanded));
        dashboardMenuToggle.setAttribute(
            'aria-label',
            expanded ? 'Cerrar menú de navegación' : 'Abrir menú de navegación',
        );
        dashboardMenu.classList.toggle('hidden', !expanded);
        dashboardMenu.classList.toggle('flex', expanded);
        openMenuIcon?.classList.toggle('hidden', expanded);
        closeMenuIcon?.classList.toggle('hidden', !expanded);
    };

    dashboardMenuToggle.addEventListener('click', () => {
        const isExpanded = dashboardMenuToggle.getAttribute('aria-expanded') === 'true';

        setDashboardMenuExpanded(!isExpanded);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && dashboardMenuToggle.getAttribute('aria-expanded') === 'true') {
            setDashboardMenuExpanded(false);
            dashboardMenuToggle.focus();
        }
    });
}

document.querySelectorAll('[data-request-action]').forEach((button) => {
    button.addEventListener('click', () => {
        const row = button.closest('[data-request-row]');
        const status = row?.querySelector('[data-request-status]');
        const actions = row?.querySelector('[data-request-actions]');
        const pendingCount = document.querySelector('#pending-count');
        const sidebarPendingCount = document.querySelector('#sidebar-pending-count');
        const headingPendingCount = document.querySelector('#requests-heading-count');
        const notice = document.querySelector('[data-dashboard-notice]');

        if (!status || !actions || !sidebarPendingCount || !headingPendingCount || !notice) {
            return;
        }

        const approved = button.dataset.requestAction === 'approve';

        status.textContent = approved ? 'Aprobada' : 'Rechazada';
        status.className = approved
            ? 'rounded-full bg-[#edf6df] px-2 py-1 text-[9px] font-semibold text-[#5b7d2c]'
            : 'rounded-full bg-[#ffe9e5] px-2 py-1 text-[9px] font-semibold text-[#b95549]';
        actions.remove();

        const nextCount = Math.max(0, Number(headingPendingCount.textContent) - 1);
        if (pendingCount) {
            pendingCount.textContent = String(nextCount);
        }
        sidebarPendingCount.textContent = String(nextCount);
        headingPendingCount.textContent = String(nextCount);
        notice.textContent = 'Solicitud actualizada solo en esta vista de demostración; no se guardó.';
    });
});

const scrollNavigation = document.querySelector('[data-scroll-navigation]');

if (scrollNavigation) {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    let previousScrollY = window.scrollY;
    let animationFramePending = false;

    const updateNavigationVisibility = () => {
        const currentScrollY = window.scrollY;
        const scrollDifference = currentScrollY - previousScrollY;
        const focusIsInNavigation = scrollNavigation.contains(document.activeElement);

        if (reducedMotion.matches || currentScrollY < 40 || focusIsInNavigation || scrollDifference < -6) {
            scrollNavigation.classList.remove('-translate-y-full');
        } else if (scrollDifference > 6) {
            scrollNavigation.classList.add('-translate-y-full');
        }

        previousScrollY = currentScrollY;
        animationFramePending = false;
    };

    window.addEventListener('scroll', () => {
        if (!animationFramePending) {
            window.requestAnimationFrame(updateNavigationVisibility);
            animationFramePending = true;
        }
    }, { passive: true });

    reducedMotion.addEventListener('change', (event) => {
        if (event.matches) {
            scrollNavigation.classList.remove('-translate-y-full');
        }
    });

    scrollNavigation.addEventListener('focusin', () => {
        scrollNavigation.classList.remove('-translate-y-full');
    });
}

const rentalSearch = document.querySelector('[data-rental-search]');

if (rentalSearch) {
    const rentalCards = Array.from(document.querySelectorAll('[data-rental-card]'));
    const emptyMessage = document.querySelector('[data-rental-empty]');

    rentalSearch.addEventListener('input', () => {
        const query = rentalSearch.value.trim().toLocaleLowerCase();
        let visibleCards = 0;

        rentalCards.forEach((card) => {
            const matches = card.textContent.toLocaleLowerCase().includes(query);

            card.classList.toggle('hidden', !matches);
            visibleCards += Number(matches);
        });

        emptyMessage?.classList.toggle('hidden', visibleCards > 0);
    });
}
