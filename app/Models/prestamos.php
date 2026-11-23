<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class prestamos extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'hora_inicio',
        'fecha_inicio',
        'fecha_entrega_estimada',
        'estado',
        'usuario_id',
        'equipo_detalle_id',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(usuarios::class, 'usuario_id');
    }

    public function equipoDetalle(): BelongsTo
    {
        return $this->belongsTo(equipo_detalles::class, 'equipo_detalle_id');
    }
}
