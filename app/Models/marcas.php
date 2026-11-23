<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class marcas extends Model
{
    protected $table = 'marcas';

    protected $fillable = [
        'nombre',
        'estado',
    ];

    public function modelos(): HasMany
    {
        return $this->hasMany(modelos::class, 'marca_id');
    }
}
