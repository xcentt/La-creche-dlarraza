<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class usuarios extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'telefono',
        'contrasena',
        'correo_electronico',
    ];

    protected $hidden = [
        'contrasena',
    ];

    protected function casts(): array
    {
        return [
            'contrasena' => 'hashed',
        ];
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(roles::class, 'usuario_roles', 'usuario_id', 'rol_id');
    }

    public function prestamos(): HasMany
    {
        return $this->hasMany(prestamos::class, 'usuario_id');
    }
}
