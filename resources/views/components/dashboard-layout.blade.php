@props(['title', 'active'])

<main id="dashboard" class="min-h-screen bg-[#f7f8fa]">
    <div class="grid min-h-screen w-full bg-[#f7f8fa] lg:grid-cols-[235px_minmax(0,1fr)]">
        <aside class="flex flex-col gap-6 border-b border-ink/10 bg-white p-4 sm:p-5 lg:border-b-0 lg:border-r">
            <div class="flex items-center justify-between gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="La crèche d'ilarraza, inicio">
                    <img src="{{ asset('images/logo school reversecolors.jpg') }}" alt="Logo de La Crèche D'Ilarraza" class="size-20 rounded-full object-contain">
                </a>
                <button type="button" data-dashboard-menu-toggle aria-controls="dashboard-navigation" aria-expanded="false" aria-label="Abrir menú de navegación" class="flex size-11 shrink-0 items-center justify-center rounded-xl border border-ink/10 bg-white text-ink transition-colors hover:bg-paper focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet lg:hidden">
                    <svg data-dashboard-menu-open-icon class="size-5" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M3 5h14M3 10h14M3 15h14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                    <svg data-dashboard-menu-close-icon class="hidden size-5" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="m5 5 10 10M15 5 5 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>

            <div id="dashboard-navigation" data-dashboard-navigation class="hidden flex-col gap-2 lg:flex">
                <p class="hidden px-3 text-[10px] font-bold uppercase tracking-[0.16em] text-muted lg:block">Espacio de trabajo</p>
                <nav class="flex flex-col gap-2" aria-label="Navegación del panel">
                    <a href="{{ route('dashboard') }}" @class([
                        'inline-flex shrink-0 items-center gap-3 rounded-xl px-3 py-2.5 text-sm',
                        'bg-lime font-semibold text-ink' => $active === 'overview',
                        'font-medium text-muted transition-colors hover:bg-paper hover:text-ink' => $active !== 'overview',
                    ]) @if ($active === 'overview') aria-current="page" @endif>
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <rect x="2.5" y="2.5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.4"/>
                            <rect x="11.5" y="2.5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.4"/>
                            <rect x="2.5" y="11.5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.4"/>
                            <rect x="11.5" y="11.5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.4"/>
                        </svg>
                        Panel
                    </a>
                    <a href="{{ route('rentals.index') }}" class="inline-flex shrink-0 items-center gap-3 rounded-xl px-3 py-2.5 bg-indigo-400 text-sm font-medium text-ink transition-colors hover:bg-indigo-200 hover:text-ink">
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 5.5h12M4 10h12M4 14.5h7" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                            <path d="M2.5 3.5h15v13h-15z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
                        </svg>
                        Rentas
                    </a>
                    <a href="{{ route('dashboard.inventory') }}" @class([
                        'inline-flex shrink-0 items-center gap-3 rounded-xl px-3 py-2.5 text-sm',
                        'bg-lime font-semibold text-ink' => $active === 'inventory',
                        'font-medium text-muted transition-colors hover:bg-paper hover:text-ink' => $active !== 'inventory',
                    ]) @if ($active === 'inventory') aria-current="page" @endif>
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M3 6.5 10 3l7 3.5v7L10 17l-7-3.5v-7Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
                            <path d="m3.5 6.8 6.5 3.4 6.5-3.4M10 10.2V17" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
                        </svg>
                        Inventario
                    </a>
                    <a href="{{ route('dashboard.loans') }}" @class([
                        'inline-flex shrink-0 items-center gap-3 rounded-xl px-3 py-2.5 text-sm',
                        'bg-lime font-semibold text-ink' => $active === 'loans',
                        'font-medium text-muted transition-colors hover:bg-paper hover:text-ink' => $active !== 'loans',
                    ]) @if ($active === 'loans') aria-current="page" @endif>
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M5 4.5h10M5 8h10M5 11.5h6M4 2.5h12a1 1 0 0 1 1 1v13l-3-1.8-3 1.8-3-1.8-3 1.8v-13a1 1 0 0 1 1-1Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Préstamos
                    </a>
                    <a href="{{ route('dashboard.requests') }}" @class([
                        'inline-flex shrink-0 items-center gap-3 rounded-xl px-3 py-2.5 text-sm',
                        'bg-lime font-semibold text-ink' => $active === 'requests',
                        'font-medium text-muted transition-colors hover:bg-paper hover:text-ink' => $active !== 'requests',
                    ]) @if ($active === 'requests') aria-current="page" @endif>
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M10 17s-6.5-3.9-6.5-9a3.5 3.5 0 0 1 6.5-1.8A3.5 3.5 0 0 1 16.5 8c0 5.1-6.5 9-6.5 9Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
                        </svg>
                        Solicitudes
                        <span id="sidebar-pending-count" class="ml-auto rounded-full bg-white px-2 py-0.5 text-[10px] font-bold text-ink">6</span>
                    </a>
                    <a href="{{ route('dashboard.activity') }}" @class([
                        'inline-flex shrink-0 items-center gap-3 rounded-xl px-3 py-2.5 text-sm',
                        'bg-lime font-semibold text-ink' => $active === 'activity',
                        'font-medium text-muted transition-colors hover:bg-paper hover:text-ink' => $active !== 'activity',
                    ]) @if ($active === 'activity') aria-current="page" @endif>
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M3 15.5V10m4.7 5.5V5m4.6 10.5V8m4.7 7.5V3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                        Actividad
                    </a>
                </nav>
            </div>

            <div class="mt-auto hidden rounded-2xl bg-[#f1f0ff] p-4 lg:block">
                <p class="text-xs font-semibold text-ink">Panel interno</p>
                <p class="mt-1 text-xs leading-5 text-muted">Herramientas para docentes y personal del almacén.</p>
            </div>

            <div class="hidden border-t border-ink/10 pt-4 text-[10px] text-muted lg:block">
                © 2026 La Crèche D'Ilarraza
            </div>
        </aside>

        <div class="min-w-0">
            <header class="flex flex-col gap-4 border-b border-ink/10 bg-white/80 px-5 py-5 sm:px-7 lg:flex-row lg:items-center lg:justify-between lg:px-9">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-violet">Gestión de recursos escolares</p>
                    <h1 class="mt-1 font-display text-xl font-semibold tracking-[-0.06em] sm:text-2xl">{{ $title }}</h1>
                </div>
                <div class="flex items-center justify-end gap-3">
                    <button type="button" class="relative flex size-10 items-center justify-center rounded-full border border-ink/10 bg-white text-ink transition-colors hover:bg-paper" aria-label="Notificaciones: 3 pendientes">
                        <svg class="size-[18px]" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M15.5 7.8a5.5 5.5 0 0 0-11 0c0 6-2 6-2 7.2h15c0-1.2-2-1.2-2-7.2ZM8 17h4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="absolute right-2 top-2 size-1.5 rounded-full bg-[#f28b62]" aria-hidden="true"></span>
                    </button>
                    <div class="flex items-center gap-2.5 rounded-full bg-white py-1 pl-1 pr-3">
                        <span class="flex size-8 items-center justify-center rounded-full bg-[#e6e3ff] text-xs font-bold text-violet">CI</span>
                        <span class="hidden flex-col sm:flex">
                            <span class="text-xs font-semibold leading-4">Carlos Ilarraza</span>
                            <span class="text-[10px] leading-4 text-muted">Docente · Multidocencia</span>
                        </span>
                    </div>
                </div>
            </header>

            <div class="space-y-7 p-5 sm:p-7 lg:p-9">
                {{ $slot }}
            </div>
        </div>
    </div>
</main>
