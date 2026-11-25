<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class prestamos extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'hora_inicio',
        'fecha_inicio',
        'fecha_entrega_estimada',
        'estado',
        'usuario_id',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(usuarios::class, 'usuario_id');
    }

    public function equipoDetalles(): BelongsToMany
    {
        return $this->belongsToMany(
            equipo_detalles::class,
            'prestamo_detalles',
            'prestamo_id',
            'equipo_detalle_id'
        )->withTimestamps();
    }
}
