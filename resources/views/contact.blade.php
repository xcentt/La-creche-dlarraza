@extends('layouts.app')

@section('title', "Contacto — La Crèche D'Ilarraza")

@section('content')
    <x-public-navigation active="contact" />

    <main class="mx-auto flex min-h-[65vh] w-full max-w-[1440px] items-center px-6 py-20 sm:px-10 sm:py-28 lg:px-16">
        <section class="grid w-full gap-10 rounded-[2rem] bg-[#eeebff] p-7 sm:p-10 md:grid-cols-[1fr_auto] md:items-end md:p-14" aria-labelledby="contact-title">
            <div class="max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-violet">Estamos preparando los detalles</p>
                <h1 id="contact-title" class="mt-4 font-display text-4xl font-medium leading-tight tracking-[-0.07em] sm:text-5xl">Hablemos pronto.</h1>
                <p class="mt-5 max-w-xl text-base leading-7 text-muted">
                    Esta página todavía no tiene canales oficiales de contacto. Los añadiremos aquí cuando estén disponibles; no queremos mostrar datos de prueba como si fueran reales.
                </p>
            </div>
            <a href="{{ route('rentals.index') }}" class="inline-flex w-fit items-center gap-3 rounded-full bg-ink px-6 py-3.5 text-sm font-semibold text-white transition-colors hover:bg-violet">
                Explorar Rentas <span aria-hidden="true">↗</span>
            </a>
        </section>
    </main>

    <x-public-footer />
@endsection
