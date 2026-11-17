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

document.querySelectorAll('[data-request-action]').forEach((button) => {
    button.addEventListener('click', () => {
        const row = button.closest('[data-request-row]');
        const status = row?.querySelector('[data-request-status]');
        const actions = row?.querySelector('[data-request-actions]');
        const pendingCount = document.querySelector('#pending-count');
        const sidebarPendingCount = document.querySelector('#sidebar-pending-count');
        const headingPendingCount = document.querySelector('#requests-heading-count');
        const notice = document.querySelector('[data-dashboard-notice]');

        if (!status || !actions || !pendingCount || !sidebarPendingCount || !headingPendingCount || !notice) {
            return;
        }

        const approved = button.dataset.requestAction === 'approve';

        status.textContent = approved ? 'Aprobada' : 'Rechazada';
        status.className = approved
            ? 'rounded-full bg-[#edf6df] px-2 py-1 text-[9px] font-semibold text-[#5b7d2c]'
            : 'rounded-full bg-[#ffe9e5] px-2 py-1 text-[9px] font-semibold text-[#b95549]';
        actions.remove();

        const nextCount = Math.max(0, Number(pendingCount.textContent) - 1);
        pendingCount.textContent = String(nextCount);
        sidebarPendingCount.textContent = String(nextCount);
        headingPendingCount.textContent = String(nextCount);
        notice.textContent = 'Solicitud actualizada solo en esta vista de demostración; no se guardó.';
    });
});

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
