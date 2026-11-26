@extends('layouts.app')

@section('title', "Términos y condiciones — La Crèche D'Ilarraza")

@section('content')
    <x-public-navigation />

    <main class="mx-auto w-full max-w-4xl px-6 py-16 sm:px-10 sm:py-24">
        <article class="space-y-10">
            <header class="space-y-4">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-violet">Información del sitio</p>
                <h1 class="font-display text-4xl font-medium tracking-[-0.07em] sm:text-5xl">Términos y condiciones</h1>
                <p class="max-w-2xl text-sm leading-6 text-muted">Esta página es un borrador informativo para el prototipo de La Crèche D'Ilarraza. No representa todavía las condiciones definitivas de un servicio real.</p>
            </header>

            <div class="rounded-2xl border border-[#e7d5a5] bg-[#fff8e9] p-5 text-sm leading-6 text-[#6f5c34]">
                Antes de publicar el sitio para uso real, se deben revisar estos textos y completar la identidad del titular, los datos de contacto, la información de privacidad y las condiciones específicas del servicio.
            </div>

            <section class="space-y-3" aria-labelledby="terms-site-title">
                <h2 id="terms-site-title" class="font-display text-xl font-medium tracking-[-0.05em]">1. Sobre este sitio</h2>
                <p class="text-sm leading-6 text-muted">La web presenta La Crèche D'Ilarraza como una escuela imaginaria y permite explorar páginas y funcionalidades de demostración. El contenido puede cambiar mientras el proyecto está en desarrollo.</p>
            </section>

            <section class="space-y-3" aria-labelledby="terms-catalog-title">
                <h2 id="terms-catalog-title" class="font-display text-xl font-medium tracking-[-0.05em]">2. Catálogo y solicitudes</h2>
                <p class="text-sm leading-6 text-muted">El catálogo de Rentas es actualmente demostrativo. La disponibilidad que aparece en pantalla no confirma la existencia de unidades reales; las solicitudes enviadas desde esta versión no se guardan ni confirman una reserva.</p>
            </section>

            <section class="space-y-3" aria-labelledby="terms-usage-title">
                <h2 id="terms-usage-title" class="font-display text-xl font-medium tracking-[-0.05em]">3. Uso de la información</h2>
                <p class="text-sm leading-6 text-muted">El contenido se ofrece con fines informativos y de presentación del proyecto. No se deben tomar decisiones sobre préstamos, disponibilidad o acceso basándose en los datos de ejemplo mostrados en la web.</p>
            </section>

            <section class="space-y-3" aria-labelledby="terms-privacy-title">
                <h2 id="terms-privacy-title" class="font-display text-xl font-medium tracking-[-0.05em]">4. Privacidad y condiciones definitivas</h2>
                <p class="text-sm leading-6 text-muted">Antes de habilitar cuentas, formularios o solicitudes reales, se publicarán las condiciones aplicables y la información sobre el tratamiento de datos personales, junto con los datos del responsable del sitio.</p>
            </section>

            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-violet transition-colors hover:text-ink">
                <span aria-hidden="true">←</span> Volver a La escuela
            </a>
        </article>
    </main>

    <x-public-footer />
@endsection
