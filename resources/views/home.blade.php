@extends('layouts.app')

@section('title', "La Crèche D'Ilarraza")

@section('content')
    <x-public-navigation active="home" />

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
                <a href="{{ route('learning') }}" class="group inline-flex items-center gap-3 rounded-full bg-ink px-6 py-3.5 text-sm font-semibold text-white transition-colors hover:bg-violet">
                    Nuestra forma de aprender
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

        <section id="preguntas" class="bg-white py-20 sm:py-28" aria-labelledby="faq-title">
            <div class="mx-auto w-full max-w-[1440px] px-6 sm:px-10 lg:px-16">
                <div class="mx-auto max-w-3xl">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-violet">Resolvemos tus dudas</p>
                    <h2 id="faq-title" class="mt-3 font-display text-3xl font-medium tracking-[-0.07em] sm:text-4xl">Preguntas frecuentes</h2>

                    <div class="mt-8 divide-y divide-ink/10 border-y border-ink/10">
                        <details class="group py-5">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-semibold marker:hidden">
                                ¿Qué es La Crèche D'Ilarraza?
                                <span class="text-xl font-normal text-violet transition-transform group-open:rotate-45" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-3 max-w-2xl text-sm leading-6 text-muted">Es una escuela imaginaria pensada como un espacio para explorar ideas, hacer preguntas y aprender en comunidad.</p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-semibold marker:hidden">
                                ¿Cómo es nuestra forma de aprender?
                                <span class="text-xl font-normal text-violet transition-transform group-open:rotate-45" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-3 max-w-2xl text-sm leading-6 text-muted">Partimos de la curiosidad, experimentamos y compartimos lo que descubrimos. <a href="{{ route('learning') }}" class="font-semibold text-violet hover:text-ink">Conoce más sobre nuestra propuesta.</a></p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-semibold marker:hidden">
                                ¿Puedo solicitar equipos del catálogo?
                                <span class="text-xl font-normal text-violet transition-transform group-open:rotate-45" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-3 max-w-2xl text-sm leading-6 text-muted">El catálogo permite explorar los recursos, pero actualmente es una demostración: las solicitudes no se guardan ni confirman una reserva.</p>
                        </details>
                        <details class="group py-5">
                            <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-semibold marker:hidden">
                                ¿Cómo puedo ponerme en contacto?
                                <span class="text-xl font-normal text-violet transition-transform group-open:rotate-45" aria-hidden="true">+</span>
                            </summary>
                            <p class="mt-3 max-w-2xl text-sm leading-6 text-muted">Estamos preparando los canales de contacto. Mientras tanto, puedes <a href="{{ route('contact') }}" class="font-semibold text-violet hover:text-ink">consultar la página de contacto</a> para ver las novedades.</p>
                        </details>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <x-public-footer />
@endsection
