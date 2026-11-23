<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class modelos extends Model
{
    protected $table = 'modelos';

    protected $fillable = [
        'nombre',
        'estado',
        'marca_id',
    ];

    public function marca(): BelongsTo
    {
        return $this->belongsTo(marcas::class, 'marca_id');
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(equipo_detalles::class, 'modelo_id');
    }
}
