<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    protected $table = "empresas";

    protected $primaryKey = "id";

    protected $fillable = [
        "ruc",
        "razon_social",
        "nombre_comercial",
        "direccion",
        "estado",
    ];

    /**
     * Devuele el ubigeo de la empresa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ubigeo()
    {
        return $this->belongsTo(Ubigeo::class, "ubigeo_id", "id");
    }

    /**
     * Devuelve todas las sucursales de la empresa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branchOffices()
    {
        return $this->hasMany(Sucursal::class, "empresa_id");
    }

}
