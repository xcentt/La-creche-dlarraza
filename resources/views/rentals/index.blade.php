@extends('layouts.app')

@section('title', "Rentas de laboratorio — La Crèche D'Ilarraza")

@section('content')
    <div id="rentals" class="min-h-screen bg-paper">
        <header class="border-b border-ink/10 bg-white">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-5 py-4 sm:px-8">
                <a href="{{ route('home') }}" class="school-wordmark font-display text-sm font-semibold sm:text-base">La crèche d'ilarraza</a>
                <nav class="flex items-center gap-5 text-xs font-medium text-muted sm:gap-8 sm:text-sm" aria-label="Navegación principal">
                    <a href="{{ route('rentals.index') }}" aria-current="page" class="font-semibold text-ink">Rentas</a>
                    <a href="{{ route('dashboard') }}" class="transition-colors hover:text-ink">Panel interno</a>
                    <a href="{{ route('home') }}" class="transition-colors hover:text-ink">La escuela</a>
                </nav>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-5 pb-16 pt-10 sm:px-8 sm:pt-14">
            <section class="relative overflow-hidden rounded-[2rem] bg-[#e8edff] px-6 py-9 sm:px-10 sm:py-12 lg:px-14" aria-labelledby="rentals-title">
                <div class="absolute -right-10 -top-20 size-64 rounded-full border-[34px] border-white/40 sm:right-8 sm:top-[-8rem] sm:size-96" aria-hidden="true"></div>
                <div class="relative grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                    <div class="max-w-2xl">
                        <span class="inline-flex items-center gap-2 rounded-full bg-white/80 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.15em] text-violet">
                            <span class="size-1.5 rounded-full bg-violet" aria-hidden="true"></span>
                            Recursos para aprender haciendo
                        </span>
                        <h1 id="rentals-title" class="mt-5 max-w-xl font-display text-3xl font-medium leading-tight tracking-[-0.07em] sm:text-4xl lg:text-5xl">
                            Tecnología que se comparte.
                        </h1>
                        <p class="mt-4 max-w-xl text-sm leading-6 text-muted sm:text-base sm:leading-7">
                            Explora el material del laboratorio, consulta cuántas unidades hay disponibles y solicita el día que quieras utilizarlo.
                        </p>
                    </div>
                    <div class="flex items-center gap-3 rounded-2xl bg-white/80 px-4 py-3 lg:min-w-48">
                        <span class="flex size-11 items-center justify-center rounded-xl bg-lime text-xl" aria-hidden="true">✳</span>
                        <div>
                            <p class="text-sm font-bold">{{ count($products) }} recursos</p>
                            <p class="text-xs text-muted">para explorar</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="pt-10 sm:pt-12" aria-labelledby="catalog-title">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-violet">Catálogo de préstamos</p>
                        <h2 id="catalog-title" class="mt-2 font-display text-2xl font-medium tracking-[-0.06em] sm:text-3xl">Encuentra tu próximo proyecto</h2>
                        <p class="mt-2 text-sm text-muted">Selecciona un equipo para ver sus detalles y solicitar una fecha.</p>
                    </div>
                    <label class="relative block w-full sm:max-w-xs">
                        <span class="sr-only">Buscar productos</span>
                        <svg class="pointer-events-none absolute left-4 top-1/2 size-4 -translate-y-1/2 text-muted" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <circle cx="8.8" cy="8.8" r="5.8" stroke="currentColor" stroke-width="1.5"/>
                            <path d="m13.2 13.2 4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <input type="search" data-rental-search placeholder="Buscar por nombre o categoría" class="w-full rounded-full border border-ink/10 bg-white py-3 pl-11 pr-4 text-sm outline-none transition focus:border-violet focus:ring-2 focus:ring-violet/20">
                    </label>
                </div>

                <div class="mt-7 grid gap-4 sm:grid-cols-2 lg:grid-cols-3" data-rental-grid>
                    @foreach ($products as $product)
                        <a href="{{ route('rentals.show', $product['slug']) }}" data-rental-card class="group flex h-full flex-col overflow-hidden rounded-3xl border border-ink/5 bg-white transition duration-200 hover:-translate-y-1 hover:border-violet/25 hover:shadow-lg hover:shadow-ink/5">
                            <div class="relative flex aspect-[1.55] items-center justify-center overflow-hidden bg-[#f0efff]">
                                @if ($product['image'])
                                    <img src="{{ $product['image'] }}" alt="{{ $product['image_alt'] }}" class="size-full object-cover">
                                @else
                                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_75%_25%,rgba(217,243,106,0.65),transparent_35%),linear-gradient(135deg,#eeebff,#f7f5ef)]" aria-hidden="true"></div>
                                    <span class="relative flex size-28 items-center justify-center rounded-[2rem] bg-white/80 text-6xl shadow-sm transition-transform duration-200 group-hover:rotate-3 group-hover:scale-105" aria-hidden="true">{{ $product['placeholder_icon'] }}</span>
                                    <span class="absolute bottom-3 left-4 rounded-full bg-white/85 px-3 py-1 text-[10px] font-medium text-muted">Imagen próximamente</span>
                                @endif
                                <span class="absolute right-4 top-4 rounded-full bg-white px-3 py-1.5 text-[10px] font-semibold text-[#5b7d2c]">
                                    {{ $product['available'] }} disponibles
                                </span>
                            </div>
                            <div class="flex flex-1 flex-col p-5 sm:p-6">
                                <span class="text-[10px] font-bold uppercase tracking-[0.14em] text-violet">{{ $product['category'] }}</span>
                                <h3 class="mt-2 font-display text-lg font-medium tracking-[-0.05em]">{{ $product['name'] }}</h3>
                                <p class="mt-2 flex-1 text-sm leading-6 text-muted">{{ $product['summary'] }}</p>
                                <div class="mt-5 flex items-center justify-between border-t border-ink/5 pt-4">
                                    <span class="text-xs font-semibold">{{ $product['available'] }} de {{ $product['total'] }} unidades</span>
                                    <span class="inline-flex items-center gap-2 text-xs font-bold text-violet transition group-hover:gap-3">
                                        Ver producto <span aria-hidden="true">↗</span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <p data-rental-empty class="mt-8 hidden rounded-2xl bg-white p-6 text-center text-sm text-muted" role="status">No encontramos productos con esa búsqueda.</p>
            </section>
        </main>

        <footer class="border-t border-ink/10 bg-white">
            <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-6 text-xs text-muted sm:flex-row sm:items-center sm:justify-between sm:px-8">
                <span class="font-display text-[10px] font-semibold tracking-[-0.04em] text-ink">LA CRÈCHE D'ILARRAZA</span>
                <span>Catálogo de muestra · Las solicitudes todavía no se guardan.</span>
            </div>
        </footer>
    </div>
@endsection
