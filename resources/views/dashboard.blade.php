@extends('layouts.app')

@section('title', "Panel de préstamos — La Crèche D'Ilarraza")

@section('content')
    <main id="dashboard" class="min-h-screen bg-[#f7f8fa]">
        <div class="grid min-h-screen w-full bg-[#f7f8fa] lg:grid-cols-[235px_minmax(0,1fr)]">
            <aside class="flex flex-col gap-6 border-b border-ink/10 bg-white p-4 sm:p-5 lg:border-b-0 lg:border-r">
                <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="La crèche d'ilarraza, inicio">
                    <img src="{{ asset('images/logo school reversecolors.jpg') }}" alt="Logo de La Crèche D'Ilarraza" class="size-20 rounded-full object-contain">
                </a>

                <div class="flex flex-col gap-2">
                    <p class="hidden px-3 text-[10px] font-bold uppercase tracking-[0.16em] text-muted lg:block">Espacio de trabajo</p>
                    <nav class="flex gap-2 overflow-x-auto lg:flex-col" aria-label="Navegación del panel">
                        <a href="#dashboard" aria-current="page" class="inline-flex shrink-0 items-center gap-3 rounded-xl bg-lime px-3 py-2.5 text-sm font-semibold text-ink">
                            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <rect x="2.5" y="2.5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.4"/>
                                <rect x="11.5" y="2.5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.4"/>
                                <rect x="2.5" y="11.5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.4"/>
                                <rect x="11.5" y="11.5" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.4"/>
                            </svg>
                            Panel
                        </a>
                         <a href="{{ route('rentals.index') }}" class="inline-flex shrink-0 items-center gap-3 rounded-xl bg-indigo-300 px-3 py-2.5 text-sm font-semibold text-ink transition-colors hover:bg-paper hover:text-ink">
                            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M4 5.5h12M4 10h12M4 14.5h7" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                                <path d="M2.5 3.5h15v13h-15z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
                            </svg>
                            Rentas
                        </a>
                        <a href="#inventory" class="inline-flex shrink-0 items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-muted transition-colors hover:bg-paper hover:text-ink">
                            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M3 6.5 10 3l7 3.5v7L10 17l-7-3.5v-7Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
                                <path d="m3.5 6.8 6.5 3.4 6.5-3.4M10 10.2V17" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
                            </svg>
                            Inventario
                        </a>
                        <a href="#loans" class="inline-flex shrink-0 items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-muted transition-colors hover:bg-paper hover:text-ink">
                            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M5 4.5h10M5 8h10M5 11.5h6M4 2.5h12a1 1 0 0 1 1 1v13l-3-1.8-3 1.8-3-1.8-3 1.8v-13a1 1 0 0 1 1-1Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Préstamos
                        </a>
                        <a href="#requests" class="inline-flex shrink-0 items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-muted transition-colors hover:bg-paper hover:text-ink">
                            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M10 17s-6.5-3.9-6.5-9a3.5 3.5 0 0 1 6.5-1.8A3.5 3.5 0 0 1 16.5 8c0 5.1-6.5 9-6.5 9Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/>
                            </svg>
                            Solicitudes
                            <span id="sidebar-pending-count" class="ml-auto rounded-full bg-white px-2 py-0.5 text-[10px] font-bold text-ink">6</span>
                        </a>
                        <a href="#activity" class="inline-flex shrink-0 items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-muted transition-colors hover:bg-paper hover:text-ink">
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
                        <h1 class="mt-1 font-display text-xl font-semibold tracking-[-0.06em] sm:text-2xl">Préstamo de equipos</h1>
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
                    <section aria-labelledby="overview-title">
                        <div class="mb-4 flex flex-wrap items-end justify-between gap-3">
                            <div>
                                <h2 id="overview-title" class="text-lg font-bold tracking-tight">Resumen general</h2>
                                <p class="mt-1 text-xs text-muted">Estado del equipamiento y de los préstamos escolares.</p>
                            </div>
                            <a href="#inventory" class="inline-flex items-center gap-2 rounded-full bg-ink px-4 py-2.5 text-xs font-semibold text-white transition-colors hover:bg-violet">
                                Explorar inventario
                                <span aria-hidden="true">↗</span>
                            </a>
                        </div>

                        <div class="grid grid-cols-2 gap-3 xl:grid-cols-4">
                            <article class="rounded-2xl border border-ink/5 bg-white p-4 sm:p-5">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="text-xs font-medium text-muted">Equipos disponibles</span>
                                    <span class="flex size-8 items-center justify-center rounded-xl bg-[#eff8d7] text-[#668329]" aria-hidden="true">▧</span>
                                </div>
                                <p class="mt-4 font-display text-2xl font-semibold tracking-[-0.06em]">128</p>
                                <p class="mt-1 text-[10px] text-muted">En 12 categorías</p>
                            </article>
                            <article class="rounded-2xl border border-ink/5 bg-white p-4 sm:p-5">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="text-xs font-medium text-muted">Préstamos activos</span>
                                    <span class="flex size-8 items-center justify-center rounded-xl bg-[#e8edff] text-violet" aria-hidden="true">↗</span>
                                </div>
                                <p class="mt-4 font-display text-2xl font-semibold tracking-[-0.06em]">34</p>
                                <p class="mt-1 text-[10px] text-muted">12 equipos vuelven esta semana</p>
                            </article>
                            <article class="rounded-2xl border border-ink/5 bg-white p-4 sm:p-5">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="text-xs font-medium text-muted">Solicitudes pendientes</span>
                                    <span class="flex size-8 items-center justify-center rounded-xl bg-[#fff1d9] text-[#b77b17]" aria-hidden="true">◷</span>
                                </div>
                                <p id="pending-count" class="mt-4 font-display text-2xl font-semibold tracking-[-0.06em]">6</p>
                                <p class="mt-1 text-[10px] text-muted">Requieren revisión del almacén</p>
                            </article>
                            <article class="rounded-2xl border border-ink/5 bg-white p-4 sm:p-5">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="text-xs font-medium text-muted">Devoluciones atrasadas</span>
                                    <span class="flex size-8 items-center justify-center rounded-xl bg-[#ffe9e5] text-[#c45b4b]" aria-hidden="true">!</span>
                                </div>
                                <p class="mt-4 font-display text-2xl font-semibold tracking-[-0.06em]">3</p>
                                <p class="mt-1 text-[10px] text-[#b95549]">Necesitan seguimiento</p>
                            </article>
                        </div>
                    </section>

                    <section id="inventory" aria-labelledby="inventory-title">
                        <div class="mb-4 flex flex-wrap items-end justify-between gap-3">
                            <div>
                                <h2 id="inventory-title" class="text-lg font-bold tracking-tight">Equipos más solicitados</h2>
                                <p class="mt-1 text-xs text-muted">Disponibilidad actual del inventario escolar.</p>
                            </div>
                            <a href="#loans" class="text-xs font-semibold text-violet transition-colors hover:text-ink">Ver préstamos activos</a>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2 2xl:grid-cols-4">
                            <article class="rounded-2xl bg-[#ffedcf] p-4">
                                <div class="flex items-start justify-between gap-2">
                                    <span class="rounded-full bg-white/75 px-2.5 py-1 text-[10px] font-medium text-ink">Ciencias</span>
                                    <span class="text-[10px] font-semibold text-[#78623f]">EQ-014</span>
                                </div>
                                <h3 class="mt-5 text-sm font-bold">Microscopio digital</h3>
                                <p class="mt-1 text-[10px] text-[#786f62]">Laboratorio de biología</p>
                                <div class="mt-5 flex items-center justify-between text-[10px]">
                                    <span class="font-medium">8 de 12 disponibles</span>
                                    <span class="font-bold">67%</span>
                                </div>
                                <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/70">
                                    <div class="h-full w-2/3 rounded-full bg-[#bd8b45]"></div>
                                </div>
                            </article>

                            <article class="rounded-2xl bg-[#eee5ff] p-4">
                                <div class="flex items-start justify-between gap-2">
                                    <span class="rounded-full bg-white/75 px-2.5 py-1 text-[10px] font-medium text-ink">Tecnología</span>
                                    <span class="text-[10px] font-semibold text-[#70628b]">EQ-027</span>
                                </div>
                                <h3 class="mt-5 text-sm font-bold">Kit de robótica Arduino</h3>
                                <p class="mt-1 text-[10px] text-[#716a80]">Aula de innovación</p>
                                <div class="mt-5 flex items-center justify-between text-[10px]">
                                    <span class="font-medium">4 de 10 disponibles</span>
                                    <span class="font-bold">40%</span>
                                </div>
                                <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/70">
                                    <div class="h-full w-2/5 rounded-full bg-violet"></div>
                                </div>
                            </article>

                            <article class="rounded-2xl bg-[#e4efff] p-4">
                                <div class="flex items-start justify-between gap-2">
                                    <span class="rounded-full bg-white/75 px-2.5 py-1 text-[10px] font-medium text-ink">Informática</span>
                                    <span class="text-[10px] font-semibold text-[#5b6d8d]">EQ-032</span>
                                </div>
                                <h3 class="mt-5 text-sm font-bold">Portátil de laboratorio</h3>
                                <p class="mt-1 text-[10px] text-[#66748b]">Aula digital</p>
                                <div class="mt-5 flex items-center justify-between text-[10px]">
                                    <span class="font-medium">7 de 18 disponibles</span>
                                    <span class="font-bold">39%</span>
                                </div>
                                <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/70">
                                    <div class="h-full w-[39%] rounded-full bg-[#6489c7]"></div>
                                </div>
                            </article>

                            <article class="rounded-2xl bg-[#eaf4ca] p-4">
                                <div class="flex items-start justify-between gap-2">
                                    <span class="rounded-full bg-white/75 px-2.5 py-1 text-[10px] font-medium text-ink">Ciencias</span>
                                    <span class="text-[10px] font-semibold text-[#66773e]">EQ-041</span>
                                </div>
                                <h3 class="mt-5 text-sm font-bold">Sensor meteorológico</h3>
                                <p class="mt-1 text-[10px] text-[#677052]">Laboratorio ambiental</p>
                                <div class="mt-5 flex items-center justify-between text-[10px]">
                                    <span class="font-medium">3 de 8 disponibles</span>
                                    <span class="font-bold">38%</span>
                                </div>
                                <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/70">
                                    <div class="h-full w-[38%] rounded-full bg-[#819b42]"></div>
                                </div>
                            </article>
                        </div>
                    </section>

                    <div class="grid gap-4 xl:grid-cols-[1.05fr_0.95fr]">
                        <section id="activity" class="rounded-2xl bg-white p-5 sm:p-6" aria-labelledby="activity-title">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h2 id="activity-title" class="text-sm font-bold">Actividad de préstamos</h2>
                                    <p class="mt-1 text-xs text-muted">Equipos entregados durante esta semana</p>
                                </div>
                                <span class="rounded-full bg-paper px-3 py-1.5 text-[10px] font-semibold text-muted">Esta semana</span>
                            </div>
                            <div class="mt-7 flex h-36 items-end justify-between gap-3 border-b border-ink/5 px-1">
                                <div class="flex h-full flex-1 flex-col items-center justify-end gap-2"><div class="w-full max-w-8 rounded-t-md bg-[#dfe2e8]" style="height: 42%"></div><span class="pb-2 text-[10px] text-muted">Lun</span></div>
                                <div class="flex h-full flex-1 flex-col items-center justify-end gap-2"><div class="w-full max-w-8 rounded-t-md bg-[#dfe2e8]" style="height: 58%"></div><span class="pb-2 text-[10px] text-muted">Mar</span></div>
                                <div class="flex h-full flex-1 flex-col items-center justify-end gap-2"><div class="w-full max-w-8 rounded-t-md bg-peach" style="height: 78%"></div><span class="pb-2 text-[10px] font-semibold text-ink">Mié</span></div>
                                <div class="flex h-full flex-1 flex-col items-center justify-end gap-2"><div class="w-full max-w-8 rounded-t-md bg-[#dfe2e8]" style="height: 50%"></div><span class="pb-2 text-[10px] text-muted">Jue</span></div>
                                <div class="flex h-full flex-1 flex-col items-center justify-end gap-2"><div class="w-full max-w-8 rounded-t-md bg-[#dfe2e8]" style="height: 35%"></div><span class="pb-2 text-[10px] text-muted">Vie</span></div>
                                <div class="flex h-full flex-1 flex-col items-center justify-end gap-2"><div class="w-full max-w-8 rounded-t-md bg-violet/70" style="height: 90%"></div><span class="pb-2 text-[10px] text-muted">Sáb</span></div>
                                <div class="flex h-full flex-1 flex-col items-center justify-end gap-2"><div class="w-full max-w-8 rounded-t-md bg-[#dfe2e8]" style="height: 62%"></div><span class="pb-2 text-[10px] text-muted">Dom</span></div>
                            </div>
                            <div class="mt-4 flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-[10px] text-muted">Préstamos esta semana</p>
                                    <p class="mt-1 font-display text-xl font-semibold tracking-[-0.05em]">32 equipos</p>
                                </div>
                                <span class="rounded-full bg-[#edf6df] px-2.5 py-1 text-[10px] font-semibold text-[#5b7d2c]">+6% vs. semana anterior</span>
                            </div>
                        </section>

                        <section id="requests" class="rounded-2xl bg-white p-5 sm:p-6" aria-labelledby="requests-title">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h2 id="requests-title" class="text-sm font-bold">Solicitudes recientes</h2>
                                    <p class="mt-1 text-xs text-muted"><span id="requests-heading-count">6</span> solicitudes esperan revisión</p>
                                </div>
                                <a href="#loans" class="text-[10px] font-semibold text-violet hover:text-ink">Ver préstamos</a>
                            </div>

                            <div class="mt-4 space-y-3">
                                <article data-request-row class="rounded-xl border border-ink/5 p-3">
                                    <div class="flex items-start gap-3">
                                        <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-[#ffedcf] text-[10px] font-bold text-[#86612d]">AB</span>
                                        <div class="min-w-0 flex-1">
                                            <div class="flex flex-wrap items-center justify-between gap-2">
                                                <p class="text-xs font-semibold">Josue Vilchoz</p>
                                                <span data-request-status class="rounded-full bg-[#fff1d9] px-2 py-1 text-[9px] font-semibold text-[#9a6a18]">Pendiente</span>
                                            </div>
                                            <p class="mt-1 text-[10px] text-muted">2 kits de robótica · Ciencias</p>
                                            <div class="mt-2 flex items-center gap-2" data-request-actions>
                                                <button type="button" data-request-action="approve" class="text-[10px] font-semibold text-[#5b7d2c] hover:underline">Aprobar</button>
                                                <span class="text-ink/15">·</span>
                                                <button type="button" data-request-action="reject" class="text-[10px] font-semibold text-[#b95549] hover:underline">Rechazar</button>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article data-request-row class="rounded-xl border border-ink/5 p-3">
                                    <div class="flex items-start gap-3">
                                        <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-[#e4efff] text-[10px] font-bold text-[#526c9b]">LM</span>
                                        <div class="min-w-0 flex-1">
                                            <div class="flex flex-wrap items-center justify-between gap-2">
                                                <p class="text-xs font-semibold">Mendelssion Nuñez</p>
                                                <span data-request-status class="rounded-full bg-[#fff1d9] px-2 py-1 text-[9px] font-semibold text-[#9a6a18]">Pendiente</span>
                                            </div>
                                            <p class="mt-1 text-[10px] text-muted">Microscopio digital · Biología</p>
                                            <div class="mt-2 flex items-center gap-2" data-request-actions>
                                                <button type="button" data-request-action="approve" class="text-[10px] font-semibold text-[#5b7d2c] hover:underline">Aprobar</button>
                                                <span class="text-ink/15">·</span>
                                                <button type="button" data-request-action="reject" class="text-[10px] font-semibold text-[#b95549] hover:underline">Rechazar</button>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article data-request-row class="rounded-xl border border-ink/5 p-3">
                                    <div class="flex items-start gap-3">
                                        <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-[#eaf4ca] text-[10px] font-bold text-[#687b38]">SR</span>
                                        <div class="min-w-0 flex-1">
                                            <div class="flex flex-wrap items-center justify-between gap-2">
                                                <p class="text-xs font-semibold">Gabriel Alejo</p>
                                                <span data-request-status class="rounded-full bg-[#fff1d9] px-2 py-1 text-[9px] font-semibold text-[#9a6a18]">Pendiente</span>
                                            </div>
                                            <p class="mt-1 text-[10px] text-muted">Sensor meteorológico · Ciencias</p>
                                            <div class="mt-2 flex items-center gap-2" data-request-actions>
                                                <button type="button" data-request-action="approve" class="text-[10px] font-semibold text-[#5b7d2c] hover:underline">Aprobar</button>
                                                <span class="text-ink/15">·</span>
                                                <button type="button" data-request-action="reject" class="text-[10px] font-semibold text-[#b95549] hover:underline">Rechazar</button>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <p class="mt-3 min-h-4 text-[10px] text-muted" role="status" aria-live="polite" data-dashboard-notice>Acciones de demostración: los cambios no se guardan.</p>
                        </section>
                    </div>

                    <section id="loans" class="overflow-hidden rounded-2xl bg-white" aria-labelledby="loans-title">
                        <div class="flex flex-wrap items-end justify-between gap-3 px-5 pt-5 sm:px-6 sm:pt-6">
                            <div>
                                <h2 id="loans-title" class="text-sm font-bold">Préstamos activos</h2>
                                <p class="mt-1 text-xs text-muted">Equipos actualmente asignados a docentes.</p>
                            </div>
                            <span class="rounded-full bg-[#e8edff] px-3 py-1.5 text-[10px] font-semibold text-violet">34 activos</span>
                        </div>
                        <div class="mt-4 overflow-x-auto">
                            <table class="w-full min-w-[650px] text-left text-xs">
                                <thead class="bg-[#f8f8fa] text-[10px] uppercase tracking-[0.1em] text-muted">
                                    <tr>
                                        <th class="px-5 py-3 font-semibold sm:px-6">Equipo</th>
                                        <th class="px-5 py-3 font-semibold">Responsable</th>
                                        <th class="px-5 py-3 font-semibold">Fecha de devolución</th>
                                        <th class="px-5 py-3 font-semibold">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-ink/5">
                                    <tr>
                                        <td class="px-5 py-3.5 font-semibold sm:px-6">Kit de robótica Arduino</td>
                                        <td class="px-5 py-3.5 text-muted">Vilcho Josue</td>
                                        <td class="px-5 py-3.5 text-muted">18 nov 2026</td>
                                        <td class="px-5 py-3.5"><span class="rounded-full bg-[#edf6df] px-2.5 py-1 text-[10px] font-semibold text-[#5b7d2c]">En uso</span></td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-3.5 font-semibold sm:px-6">Microscopio digital</td>
                                        <td class="px-5 py-3.5 text-muted">Nuñez Hijodemendel</td>
                                        <td class="px-5 py-3.5 text-muted">17 nov 2026</td>
                                        <td class="px-5 py-3.5"><span class="rounded-full bg-[#fff1d9] px-2.5 py-1 text-[10px] font-semibold text-[#9a6a18]">Próximo a vencer</span></td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-3.5 font-semibold sm:px-6">Portátil de laboratorio</td>
                                        <td class="px-5 py-3.5 text-muted">Pelon alejos</td>
                                        <td class="px-5 py-3.5 text-muted">14 nov 2026</td>
                                        <td class="px-5 py-3.5"><span class="rounded-full bg-[#ffe9e5] px-2.5 py-1 text-[10px] font-semibold text-[#b95549]">Atrasado</span></td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-3.5 font-semibold sm:px-6">Sensor meteorológico</td>
                                        <td class="px-5 py-3.5 text-muted">GOAT</td>
                                        <td class="px-5 py-3.5 text-muted">21 nov 2026</td>
                                        <td class="px-5 py-3.5"><span class="rounded-full bg-[#edf6df] px-2.5 py-1 text-[10px] font-semibold text-[#5b7d2c]">En uso</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <p class="pb-1 text-center text-[10px] text-muted">Prototipo visual para docentes y personal del almacén · Datos de ejemplo, no guardados.</p>
                </div>
            </div>
        </div>
    </main>
@endsection
