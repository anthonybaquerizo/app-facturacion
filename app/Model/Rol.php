<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

    protected $table = "roles";

    protected $primaryKey = "id";

    protected $fillable = [
        "nombre",
        "estado",
    ];

    /**
     * Devuelve la sucursal a la que pertenece
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchOffice()
    {
        return $this->belongsTo(Sucursal::class, "sucursal_id");
    }

    /**
     * Deuelve todas las operaciones del rol
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operations()
    {
        return $this->hasMany(RolOperacion::class, "rol_id");
    }

}
