<?php

namespace App\Http\Controllers;

use App\Models\modelos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModeloController extends Controller
{
    public function index()
    {
        return modelos::with('marca')->orderBy('id')->paginate();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'estado' => ['sometimes', 'string', 'max:30'],
            'marca_id' => ['required', 'integer', 'exists:marcas,id'],
        ]);

        return response()->json(modelos::create($validated)->load('marca'), 201);
    }

    public function show(string $modelo): JsonResponse
    {
        return response()->json(modelos::with(['marca', 'detalles'])->findOrFail($modelo));
    }

    public function update(Request $request, string $modelo): JsonResponse
    {
        $record = modelos::findOrFail($modelo);
        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:100'],
            'estado' => ['sometimes', 'string', 'max:30'],
            'marca_id' => ['sometimes', 'required', 'integer', 'exists:marcas,id'],
        ]);
        $record->update($validated);

        return response()->json($record->load('marca'));
    }

    public function destroy(string $modelo): Response
    {
        modelos::findOrFail($modelo)->delete();

        return response()->noContent();
    }
}
