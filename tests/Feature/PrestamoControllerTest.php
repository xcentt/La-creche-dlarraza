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

class PrestamoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_valid_payload_creates_loan_with_multiple_equipment_details_and_returns_201(): void
    {
        $usuario = $this->createUsuario();
        $primerDetalle = $this->createEquipoDetalle();
        $segundoDetalle = $this->createEquipoDetalle();

        $response = $this->postJson(route('prestamos.store'), [
            'hora_inicio' => '09:30',
            'fecha_inicio' => '2026-11-25',
            'fecha_entrega_estimada' => '2026-11-27',
            'usuario_id' => $usuario->id,
            'equipo_detalle_ids' => [$primerDetalle->id, $segundoDetalle->id],
        ]);

        $response->assertCreated()
            ->assertJsonCount(2, 'equipo_detalles')
            ->assertJsonPath('usuario.id', $usuario->id);

        $prestamoId = $response->json('id');
        $this->assertDatabaseHas('prestamo_detalles', [
            'prestamo_id' => $prestamoId,
            'equipo_detalle_id' => $primerDetalle->id,
        ]);
        $this->assertDatabaseHas('prestamo_detalles', [
            'prestamo_id' => $prestamoId,
            'equipo_detalle_id' => $segundoDetalle->id,
        ]);
    }

    public function test_update_replaces_the_loan_equipment_details(): void
    {
        $usuario = $this->createUsuario();
        $detalleAnterior = $this->createEquipoDetalle();
        $detalleNuevo = $this->createEquipoDetalle();
        $prestamo = $this->createPrestamo($usuario);
        $prestamo->equipoDetalles()->attach($detalleAnterior->id);

        $response = $this->putJson(route('prestamos.update', $prestamo), [
            'equipo_detalle_ids' => [$detalleNuevo->id],
        ]);

        $response->assertOk()
            ->assertJsonCount(1, 'equipo_detalles')
            ->assertJsonPath('equipo_detalles.0.id', $detalleNuevo->id);

        $this->assertDatabaseMissing('prestamo_detalles', [
            'prestamo_id' => $prestamo->id,
            'equipo_detalle_id' => $detalleAnterior->id,
        ]);
        $this->assertDatabaseHas('prestamo_detalles', [
            'prestamo_id' => $prestamo->id,
            'equipo_detalle_id' => $detalleNuevo->id,
        ]);
    }

    public function test_invalid_equipment_detail_id_returns_422_without_creating_a_loan(): void
    {
        $usuario = $this->createUsuario();

        $response = $this->postJson(route('prestamos.store'), [
            'hora_inicio' => '09:30',
            'fecha_inicio' => '2026-11-25',
            'fecha_entrega_estimada' => '2026-11-27',
            'usuario_id' => $usuario->id,
            'equipo_detalle_ids' => [999999],
        ]);

        $response->assertInvalid(['equipo_detalle_ids.0' => 'invalid']);
        $this->assertDatabaseCount('prestamos', 0);
        $this->assertDatabaseCount('prestamo_detalles', 0);
    }

    public function test_deleting_a_loan_removes_its_associations_and_preserves_equipment_details(): void
    {
        $usuario = $this->createUsuario();
        $detalle = $this->createEquipoDetalle();
        $prestamo = $this->createPrestamo($usuario);
        $prestamo->equipoDetalles()->attach($detalle->id);

        $response = $this->deleteJson(route('prestamos.destroy', $prestamo));

        $response->assertNoContent();
        $this->assertDatabaseMissing('prestamos', ['id' => $prestamo->id]);
        $this->assertDatabaseMissing('prestamo_detalles', [
            'prestamo_id' => $prestamo->id,
            'equipo_detalle_id' => $detalle->id,
        ]);
        $this->assertModelExists($detalle);
    }

    private function createUsuario(): usuarios
    {
        return usuarios::create([
            'nombre' => 'Usuario de prueba',
            'contrasena' => 'password-segura',
            'correo_electronico' => 'usuario@example.test',
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

    private function createPrestamo(usuarios $usuario): prestamos
    {
        return prestamos::create([
            'hora_inicio' => '09:30',
            'fecha_inicio' => '2026-11-25',
            'fecha_entrega_estimada' => '2026-11-27',
            'usuario_id' => $usuario->id,
        ]);
    }
}
