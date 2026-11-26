@extends('layouts.app')

@section('title', "Solicitudes — La Crèche D'Ilarraza")

@section('content')
    <x-dashboard-layout title="Solicitudes" active="requests">
        <section class="rounded-2xl bg-white p-5 sm:p-6" aria-labelledby="requests-title">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h2 id="requests-title" class="text-lg font-bold tracking-tight">Solicitudes pendientes</h2>
                    <p class="mt-1 text-xs text-muted"><span id="requests-heading-count">6</span> solicitudes esperan revisión</p>
                </div>
                <span class="rounded-full bg-[#fff1d9] px-3 py-1.5 text-[10px] font-semibold text-[#9a6a18]">Pendientes</span>
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
    </x-dashboard-layout>
@endsection
