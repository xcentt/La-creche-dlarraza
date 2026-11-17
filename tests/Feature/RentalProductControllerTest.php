<?php

namespace Tests\Feature;

use Tests\TestCase;

class RentalProductControllerTest extends TestCase
{
    public function test_rental_catalog_lists_products_without_prices(): void
    {
        $response = $this->get(route('rentals.index'));

        $response->assertOk()
            ->assertSee('Microscopio digital')
            ->assertSee('Kit de robótica Arduino')
            ->assertSee('unidades')
            ->assertDontSee('€')
            ->assertDontSee('$');
    }

    public function test_product_detail_shows_information_and_reservation_form(): void
    {
        $response = $this->get(route('rentals.show', 'microscopio-digital'));

        $response->assertOk()
            ->assertSee('Aumentos de 40x a 1000x')
            ->assertSee('Unidades disponibles')
            ->assertSee('reservation_date')
            ->assertSee('Solicitar reserva');
    }

    public function test_unknown_product_returns_not_found(): void
    {
        $response = $this->get(route('rentals.show', 'producto-inexistente'));

        $response->assertNotFound();
    }

    public function test_reservation_request_validates_the_date_without_claiming_persistence(): void
    {
        $date = today()->addDay()->toDateString();
        $productSlug = 'microscopio-digital';

        $response = $this->post(route('rentals.reserve', $productSlug), [
            'reservation_date' => $date,
        ]);

        $response->assertRedirect(route('rentals.show', $productSlug))
            ->assertSessionHas('status', "Solicitud validada para el {$date}. En esta demo aún no se guarda ni confirma la reserva.");
    }

    public function test_reservation_rejects_a_past_date(): void
    {
        $productSlug = 'microscopio-digital';
        $response = $this->from(route('rentals.show', $productSlug))
            ->post(route('rentals.reserve', $productSlug), [
                'reservation_date' => today()->subDay()->toDateString(),
            ]);

        $response->assertRedirect(route('rentals.show', $productSlug))
            ->assertSessionHasErrors([
                'reservation_date' => 'La fecha debe ser hoy o posterior.',
            ]);
    }

    public function test_reservation_requires_a_date(): void
    {
        $productSlug = 'microscopio-digital';
        $response = $this->from(route('rentals.show', $productSlug))
            ->post(route('rentals.reserve', $productSlug));

        $response->assertRedirect(route('rentals.show', $productSlug))
            ->assertSessionHasErrors([
                'reservation_date' => 'Selecciona el día de tu reserva.',
            ]);
    }
}
