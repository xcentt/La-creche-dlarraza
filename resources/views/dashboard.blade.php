@extends('layouts.app')

@section('title', "Resumen general — La Crèche D'Ilarraza")

@section('content')
    <x-dashboard-layout title="Resumen general" active="overview">
        <section aria-labelledby="overview-title">
            <div class="mb-4">
                <h2 id="overview-title" class="text-lg font-bold tracking-tight">Estado de los recursos</h2>
                <p class="mt-1 text-xs text-muted">Un vistazo al inventario y a los préstamos escolares.</p>
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
                    <p class="mt-4 font-display text-2xl font-semibold tracking-[-0.06em]">6</p>
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

        <p class="pb-1 text-center text-[10px] text-muted">Resumen de demostración · Datos de ejemplo, no guardados.</p>
    </x-dashboard-layout>
@endsection
