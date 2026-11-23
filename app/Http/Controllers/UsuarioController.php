<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function index()
    {
        return usuarios::with('roles')->orderBy('id')->paginate();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'contrasena' => ['required', 'string', 'min:8'],
            'correo_electronico' => ['required', 'email', 'max:100', 'unique:usuarios,correo_electronico'],
        ]);

        return response()->json(usuarios::create($validated)->load('roles'), 201);
    }

    public function show(string $usuario): JsonResponse
    {
        return response()->json(usuarios::with('roles')->findOrFail($usuario));
    }

    public function update(Request $request, string $usuario): JsonResponse
    {
        $record = usuarios::findOrFail($usuario);
        $validated = $request->validate([
            'nombre' => ['sometimes', 'required', 'string', 'max:100'],
            'telefono' => ['sometimes', 'nullable', 'string', 'max:20'],
            'contrasena' => ['sometimes', 'required', 'string', 'min:8'],
            'correo_electronico' => ['sometimes', 'required', 'email', 'max:100', Rule::unique('usuarios', 'correo_electronico')->ignore($record->id)],
        ]);
        $record->update($validated);

        return response()->json($record->load('roles'));
    }

    public function destroy(string $usuario): Response
    {
        usuarios::findOrFail($usuario)->delete();

        return response()->noContent();
    }
}
