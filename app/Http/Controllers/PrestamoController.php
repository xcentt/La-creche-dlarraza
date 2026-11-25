<?php

namespace App\Http\Controllers;

use App\Models\prestamos;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PrestamoController extends Controller
{
    public function index(): LengthAwarePaginator
    {
        return prestamos::with(['usuario', 'equipoDetalles'])->orderBy('id')->paginate();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'hora_inicio' => ['required', 'date_format:H:i'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_entrega_estimada' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'estado' => ['sometimes', 'string', 'max:30'],
            'usuario_id' => ['required', 'integer', 'exists:usuarios,id'],
            'equipo_detalle_ids' => ['required', 'array', 'min:1'],
            'equipo_detalle_ids.*' => ['required', 'integer', 'distinct', 'exists:equipo_detalles,id'],
        ]);

        $equipoDetalleIds = $validated['equipo_detalle_ids'];
        unset($validated['equipo_detalle_ids']);

        $prestamo = DB::transaction(function () use ($validated, $equipoDetalleIds): prestamos {
            $prestamo = prestamos::create($validated);
            $prestamo->equipoDetalles()->attach($equipoDetalleIds);

            return $prestamo;
        });

        return response()->json($prestamo->load(['usuario', 'equipoDetalles']), 201);
    }

    public function show(string $prestamo): JsonResponse
    {
        return response()->json(prestamos::with(['usuario', 'equipoDetalles'])->findOrFail($prestamo));
    }

    public function update(Request $request, string $prestamo): JsonResponse
    {
        $record = prestamos::findOrFail($prestamo);
        $validated = $request->validate([
            'hora_inicio' => ['sometimes', 'required', 'date_format:H:i'],
            'fecha_inicio' => ['sometimes', 'required', 'date'],
            'fecha_entrega_estimada' => ['sometimes', 'required', 'date', 'after_or_equal:fecha_inicio'],
            'estado' => ['sometimes', 'string', 'max:30'],
            'usuario_id' => ['sometimes', 'required', 'integer', 'exists:usuarios,id'],
            'equipo_detalle_ids' => ['sometimes', 'array'],
            'equipo_detalle_ids.*' => ['required', 'integer', 'distinct', 'exists:equipo_detalles,id'],
        ]);
        $equipoDetalleIds = $validated['equipo_detalle_ids'] ?? null;
        unset($validated['equipo_detalle_ids']);

        DB::transaction(function () use ($record, $validated, $equipoDetalleIds): void {
            $record->update($validated);

            if ($equipoDetalleIds !== null) {
                $record->equipoDetalles()->sync($equipoDetalleIds);
            }
        });

        return response()->json($record->load(['usuario', 'equipoDetalles']));
    }

    public function destroy(string $prestamo): Response
    {
        prestamos::findOrFail($prestamo)->delete();

        return response()->noContent();
    }
}
