@extends('layouts.app')

@section('title', "Inventario — La Crèche D'Ilarraza")

@section('content')
    <x-dashboard-layout title="Inventario" active="inventory">
        <section aria-labelledby="inventory-title">
            <div class="mb-4 flex flex-wrap items-end justify-between gap-3">
                <div>
                    <h2 id="inventory-title" class="text-lg font-bold tracking-tight">Equipos más solicitados</h2>
                    <p class="mt-1 text-xs text-muted">Disponibilidad actual del inventario escolar.</p>
                </div>
                <span class="rounded-full bg-white px-3 py-1.5 text-[10px] font-semibold text-muted">4 equipos destacados</span>
            </div>

            <div class="grid gap-3 sm:grid-cols-2 2xl:grid-cols-4">
                <article class="rounded-2xl bg-[#ffedcf] p-4">
                    <div class="flex items-start justify-between gap-2">
                        <span class="rounded-full bg-white/75 px-2.5 py-1 text-[10px] font-medium text-ink">Ciencias</span>
                        <span class="text-[10px] font-semibold text-[#78623f]">EQ-014</span>
                    </div>
                    <h3 class="mt-5 text-sm font-bold">Microscopio digital</h3>
                    <p class="mt-1 text-[10px] text-[#786f62]">Laboratorio de biología</p>
                    <div class="mt-5 flex items-center justify-between text-[10px]">
                        <span class="font-medium">8 de 12 disponibles</span>
                        <span class="font-bold">67%</span>
                    </div>
                    <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/70">
                        <div class="h-full w-2/3 rounded-full bg-[#bd8b45]"></div>
                    </div>
                </article>

                <article class="rounded-2xl bg-[#eee5ff] p-4">
                    <div class="flex items-start justify-between gap-2">
                        <span class="rounded-full bg-white/75 px-2.5 py-1 text-[10px] font-medium text-ink">Tecnología</span>
                        <span class="text-[10px] font-semibold text-[#70628b]">EQ-027</span>
                    </div>
                    <h3 class="mt-5 text-sm font-bold">Kit de robótica Arduino</h3>
                    <p class="mt-1 text-[10px] text-[#716a80]">Aula de innovación</p>
                    <div class="mt-5 flex items-center justify-between text-[10px]">
                        <span class="font-medium">4 de 10 disponibles</span>
                        <span class="font-bold">40%</span>
                    </div>
                    <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/70">
                        <div class="h-full w-2/5 rounded-full bg-violet"></div>
                    </div>
                </article>

                <article class="rounded-2xl bg-[#e4efff] p-4">
                    <div class="flex items-start justify-between gap-2">
                        <span class="rounded-full bg-white/75 px-2.5 py-1 text-[10px] font-medium text-ink">Informática</span>
                        <span class="text-[10px] font-semibold text-[#5b6d8d]">EQ-032</span>
                    </div>
                    <h3 class="mt-5 text-sm font-bold">Portátil de laboratorio</h3>
                    <p class="mt-1 text-[10px] text-[#66748b]">Aula digital</p>
                    <div class="mt-5 flex items-center justify-between text-[10px]">
                        <span class="font-medium">7 de 18 disponibles</span>
                        <span class="font-bold">39%</span>
                    </div>
                    <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/70">
                        <div class="h-full w-[39%] rounded-full bg-[#6489c7]"></div>
                    </div>
                </article>

                <article class="rounded-2xl bg-[#eaf4ca] p-4">
                    <div class="flex items-start justify-between gap-2">
                        <span class="rounded-full bg-white/75 px-2.5 py-1 text-[10px] font-medium text-ink">Ciencias</span>
                        <span class="text-[10px] font-semibold text-[#66773e]">EQ-041</span>
                    </div>
                    <h3 class="mt-5 text-sm font-bold">Sensor meteorológico</h3>
                    <p class="mt-1 text-[10px] text-[#677052]">Laboratorio ambiental</p>
                    <div class="mt-5 flex items-center justify-between text-[10px]">
                        <span class="font-medium">3 de 8 disponibles</span>
                        <span class="font-bold">38%</span>
                    </div>
                    <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-white/70">
                        <div class="h-full w-[38%] rounded-full bg-[#819b42]"></div>
                    </div>
                </article>
            </div>
        </section>

        <p class="pb-1 text-center text-[10px] text-muted">Inventario de demostración · Datos de ejemplo, no guardados.</p>
    </x-dashboard-layout>
@endsection
