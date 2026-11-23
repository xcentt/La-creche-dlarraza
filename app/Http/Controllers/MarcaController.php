<?php

namespace App\Http\Controllers;

use App\Models\marcas;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MarcaController extends Controller
{
    public function index()
    {
        return marcas::orderBy('id')->paginate();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'estado' => ['sometimes', 'string', 'max:30'],
        ]);

        return response()->json(marcas::create($validated), 201);
    }

    public function show(string $marca): JsonResponse
    {
        return response()->json(marcas::with('modelos')->findOrFail($marca));
    }

    public function update(Request $request, string $marca): JsonResponse
    {
        $record = marcas::findOrFail($marca);
        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:100'],
            'estado' => ['sometimes', 'string', 'max:30'],
        ]);
        $record->update($validated);

        return response()->json($record);
    }

    public function destroy(string $marca): Response
    {
        marcas::findOrFail($marca)->delete();

        return response()->noContent();
    }
}
