<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UsuarioRolController extends Controller
{
    public function index()
    {
        return DB::table('usuario_roles')
            ->join('usuarios', 'usuarios.id', '=', 'usuario_roles.usuario_id')
            ->join('roles', 'roles.id', '=', 'usuario_roles.rol_id')
            ->select('usuario_roles.usuario_id', 'usuario_roles.rol_id', 'usuarios.nombre as usuario', 'roles.nombre as rol')
            ->orderBy('usuario_roles.usuario_id')
            ->paginate();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'usuario_id' => ['required', 'integer', 'exists:usuarios,id'],
            'rol_id' => ['required', 'integer', 'exists:roles,id', Rule::unique('usuario_roles', 'rol_id')->where('usuario_id', $request->input('usuario_id'))],
        ]);
        DB::table('usuario_roles')->insert($validated);

        return response()->json($validated, 201);
    }

    public function destroy(string $usuario, string $rol): Response
    {
        $deleted = DB::table('usuario_roles')
            ->where('usuario_id', $usuario)
            ->where('rol_id', $rol)
            ->delete();
        abort_if($deleted === 0, 404);

        return response()->noContent();
    }
}
