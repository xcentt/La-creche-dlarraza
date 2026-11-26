<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_home_shows_faq_and_links_to_separate_pages(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee('Preguntas frecuentes')
            ->assertSee('¿Puedo solicitar equipos del catálogo?')
            ->assertSee(route('learning'), false)
            ->assertSee(route('contact'), false)
            ->assertSee(route('terms'), false)
            ->assertDontSee('Curiosidad primero');
    }

    public function test_learning_and_contact_have_separate_pages(): void
    {
        $this->get(route('learning'))
            ->assertOk()
            ->assertSee('Nuestra forma de aprender')
            ->assertSee('Curiosidad primero')
            ->assertSee('Aprender haciendo');

        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('Hablemos pronto.')
            ->assertSee('no tiene canales oficiales de contacto');
    }

    public function test_terms_page_is_available_as_a_provisional_document(): void
    {
        $this->get(route('terms'))
            ->assertOk()
            ->assertSee('Términos y condiciones')
            ->assertSee('borrador informativo')
            ->assertSee('las solicitudes enviadas desde esta versión no se guardan');
    }
}
