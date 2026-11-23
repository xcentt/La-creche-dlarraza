<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return RoleResource::collection(DB::table('roles')->orderBy('id')->paginate());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:50', 'unique:roles,nombre'],
        ]);

        $now = now();
        $id = DB::table('roles')->insertGetId([
            'nombre' => $validated['nombre'],
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return response()->json(new RoleResource($this->findRole((string) $id)), 201);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json(new RoleResource($this->findRole($id)));
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $role = $this->findRole($id);
        $validated = $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:50',
                Rule::unique('roles', 'nombre')->ignore($role->id),
            ],
        ]);

        DB::table('roles')->where('id', $role->id)->update([
            'nombre' => $validated['nombre'],
            'updated_at' => now(),
        ]);

        return response()->json(new RoleResource($this->findRole($id)));
    }

    public function destroy(string $id): Response
    {
        $role = $this->findRole($id);
        DB::table('roles')->where('id', $role->id)->delete();

        return response()->noContent();
    }

    private function findRole(string $id): object
    {
        $role = DB::table('roles')->where('id', $id)->first();

        abort_if($role === null, 404);

        return $role;
    }
}
