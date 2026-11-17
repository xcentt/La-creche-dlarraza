<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RentalProductController extends Controller
{
    private const PRODUCTS = [
        'microscopio-digital' => [
            'slug' => 'microscopio-digital',
            'name' => 'Microscopio digital',
            'category' => 'Laboratorio de biología',
            'code' => 'LAB-001',
            'available' => 4,
            'total' => 6,
            'summary' => 'Observa muestras con detalle y comparte tus hallazgos en pantalla.',
            'description' => 'Un microscopio para prácticas de biología, observación de muestras y proyectos de investigación en el aula. Su cámara digital permite proyectar y guardar las observaciones.',
            'image' => null,
            'image_alt' => 'Imagen del microscopio digital',
            'placeholder_icon' => '🔬',
            'specifications' => [
                'Aumentos de 40x a 1000x',
                'Cámara digital de 12 MP',
                'Conexión USB-C',
                'Iluminación LED regulable',
            ],
            'included' => [
                'Microscopio con cámara',
                'Cable USB-C',
                'Set de portaobjetos',
                'Estuche de transporte',
            ],
        ],
        'kit-robotica-arduino' => [
            'slug' => 'kit-robotica-arduino',
            'name' => 'Kit de robótica Arduino',
            'category' => 'Tecnología y programación',
            'code' => 'TEC-014',
            'available' => 8,
            'total' => 12,
            'summary' => 'Todo lo necesario para empezar a construir y programar prototipos.',
            'description' => 'Un kit educativo para aprender electrónica y programación mediante proyectos prácticos. Ideal para trabajar en equipo desde las primeras conexiones hasta un prototipo funcional.',
            'image' => null,
            'image_alt' => 'Imagen del kit de robótica Arduino',
            'placeholder_icon' => '🤖',
            'specifications' => [
                'Placa compatible con Arduino Uno',
                'Más de 30 componentes electrónicos',
                'Sensores de luz, distancia y temperatura',
                'Guía de proyectos para principiantes',
            ],
            'included' => [
                'Placa programable',
                'Protoboard y cables',
                'Sensores y actuadores',
                'Caja organizadora',
            ],
        ],
        'camara-termografica' => [
            'slug' => 'camara-termografica',
            'name' => 'Cámara termográfica',
            'category' => 'Laboratorio de física',
            'code' => 'LAB-023',
            'available' => 2,
            'total' => 4,
            'summary' => 'Visualiza diferencias de temperatura en experimentos y proyectos.',
            'description' => 'Cámara térmica portátil para explorar energía, aislamiento y transferencia de calor. Permite revisar las mediciones en su pantalla y exportarlas para analizarlas en clase.',
            'image' => null,
            'image_alt' => 'Imagen de la cámara termográfica',
            'placeholder_icon' => '🌡️',
            'specifications' => [
                'Rango de medición de -20 °C a 400 °C',
                'Resolución térmica de 160 × 120',
                'Pantalla LCD a color',
                'Conexión USB para exportar mediciones',
            ],
            'included' => [
                'Cámara termográfica',
                'Cable de carga',
                'Funda protectora',
                'Guía de uso',
            ],
        ],
        'estacion-meteorologica' => [
            'slug' => 'estacion-meteorologica',
            'name' => 'Estación meteorológica',
            'category' => 'Ciencias ambientales',
            'code' => 'CIE-032',
            'available' => 3,
            'total' => 5,
            'summary' => 'Mide las condiciones del entorno y convierte datos en preguntas.',
            'description' => 'Equipo portátil para recoger datos ambientales en el patio o durante una salida de campo. Facilita proyectos de observación del clima y análisis de datos.',
            'image' => null,
            'image_alt' => 'Imagen de la estación meteorológica',
            'placeholder_icon' => '🌦️',
            'specifications' => [
                'Medición de temperatura y humedad',
                'Sensor de presión atmosférica',
                'Conectividad Bluetooth',
                'Registro de datos en memoria interna',
            ],
            'included' => [
                'Unidad de medición',
                'Sensores ambientales',
                'Cable de carga',
                'Funda de transporte',
            ],
        ],
    ];

    public function index(): View
    {
        return view('rentals.index', [
            'products' => array_values(self::PRODUCTS),
        ]);
    }

    public function show(string $product): View
    {
        return view('rentals.show', [
            'product' => $this->findProduct($product),
            'minimumReservationDate' => today()->toDateString(),
        ]);
    }

    public function reserve(Request $request, string $product): RedirectResponse
    {
        $product = $this->findProduct($product);
        $validated = $request->validate([
            'reservation_date' => ['required', 'date', 'after_or_equal:today'],
        ], [
            'reservation_date.required' => 'Selecciona el día de tu reserva.',
            'reservation_date.date' => 'Introduce una fecha válida.',
            'reservation_date.after_or_equal' => 'La fecha debe ser hoy o posterior.',
        ]);

        if ($product['available'] < 1) {
            return back()
                ->withErrors(['reservation_date' => 'Este producto no tiene unidades disponibles.'])
                ->withInput();
        }

        return redirect()
            ->route('rentals.show', $product['slug'])
            ->with('status', "Solicitud validada para el {$validated['reservation_date']}. En esta demo aún no se guarda ni confirma la reserva.");
    }

    /**
     * @return array<string, mixed>
     */
    private function findProduct(string $slug): array
    {
        if (! array_key_exists($slug, self::PRODUCTS)) {
            abort(404);
        }

        return self::PRODUCTS[$slug];
    }
}
