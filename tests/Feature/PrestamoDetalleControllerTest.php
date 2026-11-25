<?php

namespace Tests\Feature;

use App\Models\equipo_detalles;
use App\Models\equipos;
use App\Models\marcas;
use App\Models\modelos;
use App\Models\prestamos;
use App\Models\usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PrestamoDetalleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_creates_a_loan_equipment_association(): void
    {
        $prestamo = $this->createPrestamo();
        $detalle = $this->createEquipoDetalle();

        $response = $this->postJson(route('prestamo-detalles.store'), [
            'prestamo_id' => $prestamo->id,
            'equipo_detalle_id' => $detalle->id,
        ]);

        $response->assertCreated()
            ->assertJsonPath('prestamo_id', $prestamo->id)
            ->assertJsonPath('equipo_detalle_id', $detalle->id);

        $this->assertDatabaseHas('prestamo_detalles', [
            'prestamo_id' => $prestamo->id,
            'equipo_detalle_id' => $detalle->id,
        ]);
    }

    public function test_store_rejects_a_duplicate_association_with_422(): void
    {
        $prestamo = $this->createPrestamo();
        $detalle = $this->createEquipoDetalle();
        $prestamo->equipoDetalles()->attach($detalle->id);

        $response = $this->postJson(route('prestamo-detalles.store'), [
            'prestamo_id' => $prestamo->id,
            'equipo_detalle_id' => $detalle->id,
        ]);

        $response->assertInvalid(['equipo_detalle_id']);
        $this->assertDatabaseCount('prestamo_detalles', 1);
    }

    public function test_destroy_removes_the_association_without_deleting_related_records(): void
    {
        $prestamo = $this->createPrestamo();
        $detalleAEliminar = $this->createEquipoDetalle();
        $detalleConservado = $this->createEquipoDetalle();
        $prestamo->equipoDetalles()->attach([$detalleAEliminar->id, $detalleConservado->id]);

        $response = $this->deleteJson(route('prestamo-detalles.destroy', [
            'prestamo' => $prestamo->id,
            'equipo_detalle' => $detalleAEliminar->id,
        ]));

        $response->assertNoContent();
        $this->assertDatabaseMissing('prestamo_detalles', [
            'prestamo_id' => $prestamo->id,
            'equipo_detalle_id' => $detalleAEliminar->id,
        ]);
        $this->assertDatabaseHas('prestamo_detalles', [
            'prestamo_id' => $prestamo->id,
            'equipo_detalle_id' => $detalleConservado->id,
        ]);
        $this->assertModelExists($prestamo);
        $this->assertModelExists($detalleAEliminar);
    }

    public function test_show_returns_404_for_an_unassociated_equipment_detail(): void
    {
        $prestamo = $this->createPrestamo();
        $detalle = $this->createEquipoDetalle();

        $response = $this->getJson(route('prestamo-detalles.show', [
            'prestamo' => $prestamo->id,
            'equipo_detalle' => $detalle->id,
        ]));

        $response->assertNotFound();
    }

    public function test_equipment_detail_show_includes_its_associated_loans(): void
    {
        $prestamo = $this->createPrestamo();
        $detalle = $this->createEquipoDetalle();
        $prestamo->equipoDetalles()->attach($detalle->id);

        $response = $this->getJson(route('equipo-detalles.show', $detalle));

        $response->assertOk()
            ->assertJsonPath('prestamos.0.id', $prestamo->id);
    }

    private function createPrestamo(): prestamos
    {
        $usuario = usuarios::create([
            'nombre' => 'Usuario de prueba',
            'contrasena' => 'password-segura',
            'correo_electronico' => 'usuario@example.test',
        ]);

        return prestamos::create([
            'hora_inicio' => '09:30',
            'fecha_inicio' => '2026-11-25',
            'fecha_entrega_estimada' => '2026-11-27',
            'usuario_id' => $usuario->id,
        ]);
    }

    private function createEquipoDetalle(): equipo_detalles
    {
        $marca = marcas::create(['nombre' => 'Marca de prueba']);
        $modelo = modelos::create([
            'nombre' => 'Modelo de prueba',
            'marca_id' => $marca->id,
        ]);
        $equipo = equipos::create(['nombre' => 'Equipo de prueba']);

        return equipo_detalles::create([
            'serial' => fake()->unique()->bothify('SERIAL-####'),
            'equipo_id' => $equipo->id,
            'modelo_id' => $modelo->id,
        ]);
    }
}
