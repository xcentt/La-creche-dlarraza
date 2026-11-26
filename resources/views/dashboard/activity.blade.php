@extends('layouts.app')

@section('title', "Actividad — La Crèche D'Ilarraza")

@section('content')
    <x-dashboard-layout title="Actividad" active="activity">
        <section class="rounded-2xl bg-white p-5 sm:p-6" aria-labelledby="activity-title">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h2 id="activity-title" class="text-lg font-bold tracking-tight">Actividad de préstamos</h2>
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
            <div class="mt-4 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="text-[10px] text-muted">Préstamos esta semana</p>
                    <p class="mt-1 font-display text-xl font-semibold tracking-[-0.05em]">32 equipos</p>
                </div>
                <span class="rounded-full bg-[#edf6df] px-2.5 py-1 text-[10px] font-semibold text-[#5b7d2c]">+6% vs. semana anterior</span>
            </div>
        </section>

        <p class="pb-1 text-center text-[10px] text-muted">Actividad de demostración · Datos de ejemplo, no guardados.</p>
    </x-dashboard-layout>
@endsection
