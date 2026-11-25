<?php

namespace App\Http\Controllers;

use App\Models\prestamos;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PrestamoDetalleController extends Controller
{
    public function index(): LengthAwarePaginator
    {
        return DB::table('prestamo_detalles')
            ->orderBy('prestamo_id')
            ->orderBy('equipo_detalle_id')
            ->paginate();
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'prestamo_id' => ['required', 'integer', 'exists:prestamos,id'],
            'equipo_detalle_id' => [
                'required',
                'integer',
                'exists:equipo_detalles,id',
                Rule::unique('prestamo_detalles', 'equipo_detalle_id')
                    ->where('prestamo_id', $request->input('prestamo_id')),
            ],
        ]);

        $prestamo = prestamos::findOrFail($validated['prestamo_id']);
        $prestamo->equipoDetalles()->attach($validated['equipo_detalle_id']);

        return response()->json(
            DB::table('prestamo_detalles')
                ->where('prestamo_id', $validated['prestamo_id'])
                ->where('equipo_detalle_id', $validated['equipo_detalle_id'])
                ->first(),
            201
        );
    }

    public function show(string $prestamo, string $equipo_detalle): JsonResponse
    {
        $detalle = DB::table('prestamo_detalles')
            ->where('prestamo_id', $prestamo)
            ->where('equipo_detalle_id', $equipo_detalle)
            ->first();

        abort_if($detalle === null, 404);

        return response()->json($detalle);
    }

    public function destroy(string $prestamo, string $equipo_detalle): Response
    {
        $detached = prestamos::findOrFail($prestamo)
            ->equipoDetalles()
            ->detach($equipo_detalle);

        abort_if($detached === 0, 404);

        return response()->noContent();
    }
}
