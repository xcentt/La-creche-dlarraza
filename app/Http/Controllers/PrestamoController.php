<?php

namespace App\Http\Controllers;

use App\Models\prestamos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrestamoController extends Controller
{
    public function index()
    {
        return prestamos::with(['usuario', 'equipoDetalle'])->orderBy('id')->paginate();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'hora_inicio' => ['required', 'date_format:H:i'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_entrega_estimada' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'estado' => ['sometimes', 'string', 'max:30'],
            'usuario_id' => ['required', 'integer', 'exists:usuarios,id'],
            'equipo_detalle_id' => ['required', 'integer', 'exists:equipo_detalles,id'],
        ]);

        return response()->json(prestamos::create($validated)->load(['usuario', 'equipoDetalle']), 201);
    }

    public function show(string $prestamo): JsonResponse
    {
        return response()->json(prestamos::with(['usuario', 'equipoDetalle'])->findOrFail($prestamo));
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
            'equipo_detalle_id' => ['sometimes', 'required', 'integer', 'exists:equipo_detalles,id'],
        ]);
        $record->update($validated);

        return response()->json($record->load(['usuario', 'equipoDetalle']));
    }

    public function destroy(string $prestamo): Response
    {
        prestamos::findOrFail($prestamo)->delete();

        return response()->noContent();
    }
}
