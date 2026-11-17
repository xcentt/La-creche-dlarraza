@extends('layouts.app')

@section('title', $product['name']." — Rentas de laboratorio")

@section('content')
    <div id="rentals" class="min-h-screen bg-paper">
        <header class="border-b border-ink/10 bg-white">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-5 py-4 sm:px-8">
                <a href="{{ route('home') }}" class="school-wordmark font-display text-sm font-semibold sm:text-base">La Crèche D'Ilarraza</a>
                <nav class="flex items-center gap-5 text-xs font-medium text-muted sm:gap-8 sm:text-sm" aria-label="Navegación principal">
                    <a href="{{ route('rentals.index') }}" class="font-semibold text-ink">Rentas</a>
                    <a href="{{ route('dashboard') }}" class="transition-colors hover:text-ink">Panel interno</a>
                    <a href="{{ route('home') }}" class="transition-colors hover:text-ink">La escuela</a>
                </nav>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-5 pb-16 pt-8 sm:px-8 sm:pt-10">
            <nav class="text-xs font-medium text-muted" aria-label="Ruta de navegación">
                <a href="{{ route('rentals.index') }}" class="transition-colors hover:text-ink">Catálogo de rentas</a>
                <span class="px-2" aria-hidden="true">/</span>
                <span class="text-ink" aria-current="page">{{ $product['name'] }}</span>
            </nav>

            <section class="mt-6 grid items-start gap-6 lg:grid-cols-[minmax(0,1.15fr)_minmax(340px,0.85fr)]" aria-labelledby="product-title">
                <div class="overflow-hidden rounded-[2rem] bg-white">
                    <div class="relative flex aspect-[1.25] items-center justify-center overflow-hidden bg-[#f0efff] sm:aspect-[1.45]">
                        @if ($product['image'])
                            <img src="{{ $product['image'] }}" alt="{{ $product['image_alt'] }}" class="size-full object-cover">
                        @else
                            <div class="absolute inset-0 bg-[radial-gradient(circle_at_72%_28%,rgba(217,243,106,0.7),transparent_32%),linear-gradient(135deg,#eeebff,#f7f5ef)]" aria-hidden="true"></div>
                            <span class="relative flex size-36 items-center justify-center rounded-[2.5rem] bg-white/85 text-7xl shadow-sm sm:size-44 sm:text-8xl" aria-hidden="true">{{ $product['placeholder_icon'] }}</span>
                            <span class="absolute bottom-5 left-5 rounded-full bg-white/90 px-3 py-1.5 text-[10px] font-semibold text-muted">Fotografía del producto próximamente</span>
                        @endif
                    </div>
                    <div class="grid gap-5 p-6 sm:grid-cols-2 sm:p-8">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.14em] text-violet">Acerca del equipo</p>
                            <h2 class="mt-2 text-sm font-bold">Para aprender experimentando</h2>
                            <p class="mt-2 text-sm leading-6 text-muted">{{ $product['description'] }}</p>
                        </div>
                        <div class="rounded-2xl bg-paper p-4">
                            <p class="text-xs font-bold">En tu préstamo</p>
                            <ul class="mt-3 flex flex-col gap-2">
                                @foreach ($product['included'] as $item)
                                    <li class="flex items-start gap-2 text-xs leading-5 text-muted">
                                        <span class="mt-0.5 text-violet" aria-hidden="true">✓</span>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-5">
                    <div class="rounded-[2rem] bg-white p-6 sm:p-8">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="rounded-full bg-[#eeebff] px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.1em] text-violet">{{ $product['category'] }}</span>
                            <span class="rounded-full bg-[#edf6df] px-3 py-1.5 text-[10px] font-semibold text-[#5b7d2c]">Disponible</span>
                        </div>
                        <p class="mt-5 text-xs font-medium text-muted">Código {{ $product['code'] }}</p>
                        <h1 id="product-title" class="mt-2 font-display text-3xl font-medium leading-tight tracking-[-0.07em] sm:text-4xl">{{ $product['name'] }}</h1>
                        <p class="mt-3 text-sm leading-6 text-muted">{{ $product['summary'] }}</p>

                        <div class="mt-6 flex items-end justify-between gap-4 rounded-2xl bg-paper p-4">
                            <div>
                                <p class="text-xs font-medium text-muted">Unidades disponibles</p>
                                <p class="mt-1 font-display text-3xl font-semibold tracking-[-0.07em]">{{ $product['available'] }}</p>
                            </div>
                            <p class="pb-1 text-right text-xs text-muted">de {{ $product['total'] }}<br>en el catálogo</p>
                        </div>

                        @if (session('status'))
                            <div class="mt-5 rounded-2xl border border-[#d6e8b8] bg-[#f2f8e8] p-4 text-sm leading-6 text-[#4c6829]" role="status">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('rentals.reserve', $product['slug']) }}" method="POST" class="mt-6 border-t border-ink/5 pt-6">
                            @csrf
                            <label for="reservation_date" class="block text-sm font-bold">¿Qué día necesitas este equipo?</label>
                            <p class="mt-1 text-xs leading-5 text-muted">Elige una fecha para enviar tu solicitud de préstamo.</p>
                            <input
                                id="reservation_date"
                                name="reservation_date"
                                type="date"
                                min="{{ $minimumReservationDate }}"
                                value="{{ old('reservation_date') }}"
                                required
                                aria-describedby="reservation-note @error('reservation_date') reservation-error @enderror"
                                class="mt-3 w-full rounded-xl border border-ink/10 bg-white px-4 py-3 text-sm outline-none transition focus:border-violet focus:ring-2 focus:ring-violet/20"
                            >
                            @error('reservation_date')
                                <p id="reservation-error" class="mt-2 text-xs font-medium text-[#b95549]" role="alert">{{ $message }}</p>
                            @enderror
                            <button type="submit" class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-full bg-ink px-5 py-3.5 text-sm font-semibold text-white transition-colors hover:bg-violet">
                                Solicitar reserva <span aria-hidden="true">↗</span>
                            </button>
                            <p id="reservation-note" class="mt-3 text-center text-[10px] leading-5 text-muted">
                                Solicitud de demostración: la disponibilidad por fecha se confirmará y guardará cuando conectemos el sistema.
                            </p>
                        </form>
                    </div>

                    <section class="rounded-[2rem] bg-white p-6 sm:p-8" aria-labelledby="specifications-title">
                        <h2 id="specifications-title" class="text-sm font-bold">Información del equipo</h2>
                        <ul class="mt-4 grid gap-3 sm:grid-cols-2">
                            @foreach ($product['specifications'] as $specification)
                                <li class="flex items-start gap-2 text-xs leading-5 text-muted">
                                    <span class="mt-0.5 flex size-4 shrink-0 items-center justify-center rounded-full bg-[#eff8d7] text-[9px] font-bold text-[#5b7d2c]" aria-hidden="true">✓</span>
                                    {{ $specification }}
                                </li>
                            @endforeach
                        </ul>
                    </section>
                </div>
            </section>

            <div class="mt-8">
                <a href="{{ route('rentals.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-violet transition-colors hover:text-ink">
                    <span aria-hidden="true">←</span> Volver al catálogo
                </a>
            </div>
        </main>
    </div>
@endsection
