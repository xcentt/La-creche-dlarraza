<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class equipos extends Model
{
    protected $table = 'equipos';

    protected $fillable = [
        'nombre',
        'estado',
    ];

    public function detalles(): HasMany
    {
        return $this->hasMany(equipo_detalles::class, 'equipo_id');
    }
}
