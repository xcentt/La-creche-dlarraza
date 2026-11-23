<?php

namespace App\Http\Controllers;

use App\Models\equipos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EquipoController extends Controller
{
    public function index()
    {
        return equipos::orderBy('id')->paginate();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'estado' => ['sometimes', 'string', 'max:30'],
        ]);

        return response()->json(equipos::create($validated), 201);
    }

    public function show(string $equipo): JsonResponse
    {
        return response()->json(equipos::with('detalles')->findOrFail($equipo));
    }

    public function update(Request $request, string $equipo): JsonResponse
    {
        $record = equipos::findOrFail($equipo);
        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:100'],
            'estado' => ['sometimes', 'string', 'max:30'],
        ]);
        $record->update($validated);

        return response()->json($record);
    }

    public function destroy(string $equipo): Response
    {
        equipos::findOrFail($equipo)->delete();

        return response()->noContent();
    }
}
