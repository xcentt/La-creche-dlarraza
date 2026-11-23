<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class roles extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'nombre',
    ];

    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(usuarios::class, 'usuario_roles', 'rol_id', 'usuario_id');
    }
}
