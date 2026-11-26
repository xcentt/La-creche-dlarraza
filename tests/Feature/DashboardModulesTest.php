<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardModulesTest extends TestCase
{
    public function test_dashboard_shows_the_summary_and_links_to_its_modules(): void
    {
        $response = $this->get(route('dashboard'));

        $response->assertOk()
            ->assertSee('Resumen general')
            ->assertSee(route('dashboard.inventory'), false)
            ->assertSee(route('dashboard.loans'), false)
            ->assertSee(route('dashboard.requests'), false)
            ->assertSee(route('dashboard.activity'), false)
            ->assertDontSee('Equipos más solicitados')
            ->assertDontSee('Solicitudes recientes')
            ->assertDontSee('Actividad de préstamos');
    }

    public function test_dashboard_module_pages_are_available_from_their_named_routes(): void
    {
        $modules = [
            'dashboard.inventory' => 'Equipos más solicitados',
            'dashboard.loans' => 'Préstamos activos',
            'dashboard.requests' => 'Solicitudes pendientes',
            'dashboard.activity' => 'Actividad de préstamos',
        ];

        foreach ($modules as $routeName => $heading) {
            $this->get(route($routeName))
                ->assertOk()
                ->assertSee($heading);
        }
    }

    public function test_dashboard_navigation_exposes_a_collapsible_menu_control(): void
    {
        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSee('data-dashboard-menu-toggle', false)
            ->assertSee('aria-expanded="false"', false)
            ->assertSee('aria-controls="dashboard-navigation"', false);
    }
}
