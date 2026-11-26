<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamo_detalles', function (Blueprint $table) {
            $table->foreignId('prestamo_id')->constrained('prestamos')->cascadeOnDelete();
            $table->foreignId('equipo_detalle_id')->constrained('equipo_detalles')->restrictOnDelete();
            $table->primary(['prestamo_id', 'equipo_detalle_id']);
            $table->timestamps();
        });

        DB::table('prestamos')
            ->select(['id', 'equipo_detalle_id', 'created_at', 'updated_at'])
            ->whereNotNull('equipo_detalle_id')
            ->orderBy('id')
            ->chunk(500, function (Collection $prestamos): void {
                DB::table('prestamo_detalles')->insert($prestamos->map(fn (object $prestamo): array => [
                    'prestamo_id' => $prestamo->id,
                    'equipo_detalle_id' => $prestamo->equipo_detalle_id,
                    'created_at' => $prestamo->created_at,
                    'updated_at' => $prestamo->updated_at,
                ])->all());
            });

        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropForeign(['equipo_detalle_id']);
            $table->dropColumn('equipo_detalle_id');
        });
    }

    public function down(): void
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->foreignId('equipo_detalle_id')
                ->nullable()
                ->after('usuario_id')
                ->constrained('equipo_detalles')
                ->restrictOnDelete();
        });

        DB::table('prestamo_detalles')
            ->selectRaw('prestamo_id, MIN(equipo_detalle_id) as equipo_detalle_id')
            ->groupBy('prestamo_id')
            ->orderBy('prestamo_id')
            ->chunk(500, function (Collection $detalles): void {
                foreach ($detalles as $detalle) {
                    DB::table('prestamos')
                        ->where('id', $detalle->prestamo_id)
                        ->update(['equipo_detalle_id' => $detalle->equipo_detalle_id]);
                }
            });

        Schema::dropIfExists('prestamo_detalles');
    }
};
