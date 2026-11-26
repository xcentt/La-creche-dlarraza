@extends('layouts.app')

@section('title', "Préstamos — La Crèche D'Ilarraza")

@section('content')
    <x-dashboard-layout title="Préstamos" active="loans">
        <section class="overflow-hidden rounded-2xl bg-white" aria-labelledby="loans-title">
            <div class="flex flex-wrap items-end justify-between gap-3 px-5 pt-5 sm:px-6 sm:pt-6">
                <div>
                    <h2 id="loans-title" class="text-lg font-bold tracking-tight">Préstamos activos</h2>
                    <p class="mt-1 text-xs text-muted">Equipos actualmente asignados a docentes.</p>
                </div>
                <span class="rounded-full bg-[#e8edff] px-3 py-1.5 text-[10px] font-semibold text-violet">34 activos</span>
            </div>
            <div class="mt-4 overflow-x-auto">
                <table class="w-full min-w-[650px] text-left text-xs">
                    <thead class="bg-[#f8f8fa] text-[10px] uppercase tracking-[0.1em] text-muted">
                        <tr>
                            <th class="px-5 py-3 font-semibold sm:px-6">Equipo</th>
                            <th class="px-5 py-3 font-semibold">Responsable</th>
                            <th class="px-5 py-3 font-semibold">Fecha de devolución</th>
                            <th class="px-5 py-3 font-semibold">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-ink/5">
                        <tr>
                            <td class="px-5 py-3.5 font-semibold sm:px-6">Kit de robótica Arduino</td>
                            <td class="px-5 py-3.5 text-muted">Vilcho Josue</td>
                            <td class="px-5 py-3.5 text-muted">18 nov 2026</td>
                            <td class="px-5 py-3.5"><span class="rounded-full bg-[#edf6df] px-2.5 py-1 text-[10px] font-semibold text-[#5b7d2c]">En uso</span></td>
                        </tr>
                        <tr>
                            <td class="px-5 py-3.5 font-semibold sm:px-6">Microscopio digital</td>
                            <td class="px-5 py-3.5 text-muted">Nuñez Hijodemendel</td>
                            <td class="px-5 py-3.5 text-muted">17 nov 2026</td>
                            <td class="px-5 py-3.5"><span class="rounded-full bg-[#fff1d9] px-2.5 py-1 text-[10px] font-semibold text-[#9a6a18]">Próximo a vencer</span></td>
                        </tr>
                        <tr>
                            <td class="px-5 py-3.5 font-semibold sm:px-6">Portátil de laboratorio</td>
                            <td class="px-5 py-3.5 text-muted">Pelon alejos</td>
                            <td class="px-5 py-3.5 text-muted">14 nov 2026</td>
                            <td class="px-5 py-3.5"><span class="rounded-full bg-[#ffe9e5] px-2.5 py-1 text-[10px] font-semibold text-[#b95549]">Atrasado</span></td>
                        </tr>
                        <tr>
                            <td class="px-5 py-3.5 font-semibold sm:px-6">Sensor meteorológico</td>
                            <td class="px-5 py-3.5 text-muted">GOAT</td>
                            <td class="px-5 py-3.5 text-muted">21 nov 2026</td>
                            <td class="px-5 py-3.5"><span class="rounded-full bg-[#edf6df] px-2.5 py-1 text-[10px] font-semibold text-[#5b7d2c]">En uso</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <p class="pb-1 text-center text-[10px] text-muted">Préstamos de demostración · Datos de ejemplo, no guardados.</p>
    </x-dashboard-layout>
@endsection
