<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class equipo_detalles extends Model
{
    protected $table = 'equipo_detalles';

    protected $fillable = [
        'serial',
        'cantidad',
        'observacion',
        'equipo_id',
        'modelo_id',
    ];

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(equipos::class, 'equipo_id');
    }

    public function modelo(): BelongsTo
    {
        return $this->belongsTo(modelos::class, 'modelo_id');
    }

    public function prestamos(): BelongsToMany
    {
        return $this->belongsToMany(
            prestamos::class,
            'prestamo_detalles',
            'equipo_detalle_id',
            'prestamo_id'
        )->withTimestamps();
    }
}
