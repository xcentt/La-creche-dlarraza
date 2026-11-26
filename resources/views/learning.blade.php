@extends('layouts.app')

@section('title', "Nuestra forma de aprender — La Crèche D'Ilarraza")

@section('content')
    <x-public-navigation active="learning" />

    <main>
        <section class="mx-auto w-full max-w-[1440px] px-6 py-20 sm:px-10 sm:py-28 lg:px-16" aria-labelledby="learning-title">
            <div class="grid gap-10 md:grid-cols-[0.8fr_1.2fr] md:items-end md:gap-16">
                <div class="flex flex-col items-start gap-5">
                    <span class="inline-flex items-center gap-2 rounded-full bg-lime px-4 py-2 text-[10px] font-bold uppercase tracking-[0.16em]">
                        <span class="size-1.5 rounded-full bg-ink" aria-hidden="true"></span>
                        Una escuela con espacio para ser
                    </span>
                    <h1 id="learning-title" class="max-w-xl font-display text-4xl font-medium leading-[1.13] tracking-[-0.07em] sm:text-5xl lg:text-6xl">
                        Menos respuestas hechas. <span class="text-violet">Más caminos por descubrir.</span>
                    </h1>
                </div>
                <p class="max-w-xl text-base leading-7 text-muted sm:text-lg">
                    Aquí, cada día empieza con una idea y puede terminar en cualquier lugar. Aprender es explorar, probar y construir conocimiento junto a otras personas.
                </p>
            </div>
        </section>

        <section class="bg-white py-20 sm:py-28" aria-label="Principios para aprender">
            <div class="mx-auto grid w-full max-w-[1440px] gap-4 px-6 sm:px-10 md:grid-cols-3 lg:px-16">
                <article class="flex min-h-64 flex-col justify-between rounded-3xl bg-paper p-7 sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-full bg-lime text-xl" aria-hidden="true">✳</span>
                    <div class="flex flex-col gap-2">
                        <h2 class="font-display text-lg font-medium tracking-[-0.05em]">Curiosidad primero</h2>
                        <p class="text-sm leading-6 text-muted">Las mejores lecciones empiezan con un “¿y si...?”.</p>
                    </div>
                </article>
                <article class="flex min-h-64 flex-col justify-between rounded-3xl bg-[#eeebff] p-7 sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-full bg-violet text-xl text-white" aria-hidden="true">↗</span>
                    <div class="flex flex-col gap-2">
                        <h2 class="font-display text-lg font-medium tracking-[-0.05em]">Aprender haciendo</h2>
                        <p class="text-sm leading-6 text-muted">Probar, equivocarse y volver a probar: así nacen las ideas.</p>
                    </div>
                </article>
                <article class="flex min-h-64 flex-col justify-between rounded-3xl bg-[#fff0e9] p-7 sm:p-8">
                    <span class="flex size-12 items-center justify-center rounded-full bg-peach text-xl" aria-hidden="true">♡</span>
                    <div class="flex flex-col gap-2">
                        <h2 class="font-display text-lg font-medium tracking-[-0.05em]">Crecer en comunidad</h2>
                        <p class="text-sm leading-6 text-muted">Cada persona aporta algo único a lo que imaginamos juntos.</p>
                    </div>
                </article>
            </div>
        </section>

        <section class="mx-auto flex w-full max-w-[1440px] flex-col items-start gap-5 px-6 py-20 sm:px-10 sm:py-24 lg:px-16" aria-labelledby="learning-next-title">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-violet">Explora la escuela</p>
            <h2 id="learning-next-title" class="max-w-2xl font-display text-3xl font-medium tracking-[-0.07em] sm:text-4xl">La curiosidad también es una forma de crecer.</h2>
            <a href="{{ route('home') }}#preguntas" class="inline-flex items-center gap-2 font-semibold text-ink transition-colors hover:text-violet">
                Preguntas frecuentes <span aria-hidden="true">↗</span>
            </a>
        </section>
    </main>

    <x-public-footer />
@endsection
