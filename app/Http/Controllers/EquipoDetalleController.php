<?php

namespace App\Http\Controllers;

use App\Models\equipo_detalles;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class EquipoDetalleController extends Controller
{
    public function index()
    {
        return equipo_detalles::with(['equipo', 'modelo'])->orderBy('id')->paginate();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'serial' => ['nullable', 'string', 'max:100', 'unique:equipo_detalles,serial'],
            'cantidad' => ['sometimes', 'integer', 'min:1'],
            'observacion' => ['nullable', 'string'],
            'equipo_id' => ['required', 'integer', 'exists:equipos,id'],
            'modelo_id' => ['required', 'integer', 'exists:modelos,id'],
        ]);

        return response()->json(equipo_detalles::create($validated)->load(['equipo', 'modelo']), 201);
    }

    public function show(string $detalle): JsonResponse
    {
        return response()->json(equipo_detalles::with(['equipo', 'modelo', 'prestamos'])->findOrFail($detalle));
    }

    public function update(Request $request, string $detalle): JsonResponse
    {
        $record = equipo_detalles::findOrFail($detalle);
        $validated = $request->validate([
            'serial' => ['sometimes', 'nullable', 'string', 'max:100', Rule::unique('equipo_detalles', 'serial')->ignore($record->id)],
            'cantidad' => ['sometimes', 'integer', 'min:1'],
            'observacion' => ['sometimes', 'nullable', 'string'],
            'equipo_id' => ['sometimes', 'required', 'integer', 'exists:equipos,id'],
            'modelo_id' => ['sometimes', 'required', 'integer', 'exists:modelos,id'],
        ]);
        $record->update($validated);

        return response()->json($record->load(['equipo', 'modelo']));
    }

    public function destroy(string $detalle): Response
    {
        equipo_detalles::findOrFail($detalle)->delete();

        return response()->noContent();
    }
}
