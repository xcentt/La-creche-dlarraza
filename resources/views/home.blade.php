@extends('layouts.app')

@section('title', "La Crèche D'Ilarraza")

@section('content')
    <header class="mx-auto grid w-full max-w-[1440px] grid-cols-[1fr_auto_1fr] items-center gap-x-3 gap-y-4 px-6 py-5 sm:px-10 lg:px-16">
        <a href="{{ route('home') }}" class="school-wordmark col-start-1 col-span-3 row-start-1 justify-self-center whitespace-nowrap text-center font-display text-4xl font-semibold sm:text-base" aria-label="La crèche d'ilarraza, inicio">
            La Crèche D'Ilarraza
        </a>

        <nav class="col-span-3 row-start-2 flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-xs font-medium text-muted sm:gap-x-8 sm:text-sm" aria-label="Navegación principal">
            <a href="#escuela" class="transition-colors hover:text-ink">La escuela</a>
            <a href="#ideas" class="transition-colors hover:text-ink">Nuestra forma de aprender</a>
            <a href="{{ route('rentals.index') }}" class="transition-colors hover:text-ink">Rentas</a>
            <a href="#contacto" class="transition-colors hover:text-ink">Contacto</a>
        </nav>

        <a href="{{ route('login') }}" class="col-start-3 row-start-3 inline-flex items-center justify-self-end gap-2 rounded-full border border-ink/15 px-3 py-2 text-xs font-semibold transition-colors hover:border-ink hover:bg-ink hover:text-white sm:px-4 sm:py-2.5 sm:text-sm md:row-start-1 md:px-5">
            Iniciar sesión
            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <path d="M4.5 10h10m-4-4 4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </header>

    <main>
        <section class="mx-auto w-full max-w-[1440px] px-6 pb-16 sm:px-10 lg:px-16" aria-label="Espacio reservado para la animación de bienvenida">
            <div class="min-h-[420px] rounded-[2rem] border border-ink/10 bg-white/45 sm:min-h-[520px] lg:min-h-[620px]"></div>
        </section>

        <section id="escuela" class="mx-auto grid w-full max-w-[1440px] gap-10 px-6 py-16 sm:px-10 md:grid-cols-[0.8fr_1.2fr] md:gap-16 md:py-24 lg:px-16">
            <div class="flex flex-col items-start gap-6">
                <span class="inline-flex items-center gap-2 rounded-full bg-lime px-4 py-2 text-[10px] font-bold uppercase tracking-[0.16em]">
                    <span class="size-1.5 rounded-full bg-ink"></span>
                    Escuela imaginaria · Desde siempre
                </span>
                <h1 class="max-w-xl font-display text-4xl font-medium leading-[1.13] tracking-[-0.07em] sm:text-5xl lg:text-6xl">
                    Aprender a mirar <span class="text-violet">de otra manera.</span>
                </h1>
                <p class="max-w-md text-base leading-7 text-muted sm:text-lg">
                    Un lugar para hacer preguntas grandes, probar ideas y descubrir todo lo que puedes llegar a ser.
                </p>
                <a href="#ideas" class="group inline-flex items-center gap-3 rounded-full bg-ink px-6 py-3.5 text-sm font-semibold text-white transition-colors hover:bg-violet">
                    Descubre la escuela
                    <span class="flex size-6 items-center justify-center rounded-full bg-white/15 transition-transform group-hover:translate-x-0.5" aria-hidden="true">↗</span>
                </a>
            </div>

            <div class="relative flex min-h-[340px] items-end overflow-hidden rounded-[2rem] bg-peach p-7 sm:min-h-[400px] sm:p-10">
                <div class="absolute -right-10 -top-14 size-64 rounded-full border-[32px] border-paper/35 sm:size-80" aria-hidden="true"></div>
                <div class="absolute right-10 top-10 flex size-16 rotate-12 items-center justify-center rounded-2xl bg-lime text-3xl shadow-sm sm:right-16 sm:top-16 sm:size-20" aria-hidden="true">✳</div>
                <div class="relative flex w-full items-end justify-between gap-4">
                    <p class="max-w-xs font-display text-xl font-medium leading-snug tracking-[-0.06em] sm:text-2xl">
                        La curiosidad también es una forma de crecer.
                    </p>
                    <span class="hidden rounded-full border border-ink/25 px-3 py-1.5 text-[10px] font-bold tracking-[0.12em] sm:inline-flex">01 / 03</span>
                </div>
            </div>
        </section>

        <section id="ideas" class="bg-white py-20 sm:py-28">
            <div class="mx-auto w-full max-w-[1440px] px-6 sm:px-10 lg:px-16">
                <div class="mb-12 flex flex-col gap-5 md:mb-16 md:flex-row md:items-end md:justify-between">
                    <div class="flex max-w-2xl flex-col gap-4">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-violet">Una escuela con espacio para ser</p>
                        <h2 class="font-display text-3xl font-medium leading-tight tracking-[-0.07em] sm:text-4xl lg:text-5xl">
                            Menos respuestas hechas.<br class="hidden sm:block"> Más caminos por descubrir.
                        </h2>
                    </div>
                    <p class="max-w-sm text-sm leading-6 text-muted">
                        Aquí, cada día empieza con una idea y puede terminar en cualquier lugar.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-3">
                    <article class="flex min-h-64 flex-col justify-between rounded-3xl bg-paper p-7 sm:p-8">
                        <span class="flex size-12 items-center justify-center rounded-full bg-lime text-xl" aria-hidden="true">✳</span>
                        <div class="flex flex-col gap-2">
                            <h3 class="font-display text-lg font-medium tracking-[-0.05em]">Curiosidad primero</h3>
                            <p class="text-sm leading-6 text-muted">Las mejores lecciones empiezan con un “¿y si...?”.</p>
                        </div>
                    </article>
                    <article class="flex min-h-64 flex-col justify-between rounded-3xl bg-[#eeebff] p-7 sm:p-8">
                        <span class="flex size-12 items-center justify-center rounded-full bg-violet text-xl text-white" aria-hidden="true">↗</span>
                        <div class="flex flex-col gap-2">
                            <h3 class="font-display text-lg font-medium tracking-[-0.05em]">Aprender haciendo</h3>
                            <p class="text-sm leading-6 text-muted">Probar, equivocarse, volver a probar. Así nacen las ideas.</p>
                        </div>
                    </article>
                    <article class="flex min-h-64 flex-col justify-between rounded-3xl bg-[#fff0e9] p-7 sm:p-8">
                        <span class="flex size-12 items-center justify-center rounded-full bg-peach text-xl" aria-hidden="true">♡</span>
                        <div class="flex flex-col gap-2">
                            <h3 class="font-display text-lg font-medium tracking-[-0.05em]">Crecer en comunidad</h3>
                            <p class="text-sm leading-6 text-muted">Cada persona aporta algo único a lo que imaginamos juntos.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <footer id="contacto" class="mx-auto flex w-full max-w-[1440px] flex-col gap-5 px-6 py-8 text-sm text-muted sm:flex-row sm:items-center sm:justify-between sm:px-10 lg:px-16">
        <span class="font-display text-[10px] font-semibold tracking-[-0.04em] text-ink">LA CRÈCHE D'ILARRAZA</span>
        <p>El acceso al campus está en preparación.</p>
        <a href="#escuela" class="font-semibold text-ink transition-colors hover:text-violet">Volver arriba ↑</a>
    </footer>
@endsection
