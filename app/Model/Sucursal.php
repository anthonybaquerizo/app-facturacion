<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{

    protected $table = "sucursales";

    protected $primaryKey = "id";

    protected $fillable = [
        "codigo_sunat",
        "nombre",
        "direccion",
        "urbanizacion",
        "direccion_completa",
        "informacion_adicional",
        "estado",
    ];

    /**
     * Devuelve la empresa de la sucursal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business()
    {
        return $this->belongsTo(Empresa::class, "empresa_id");
    }

    /**
     * Devuelve el ubigeo de la sucursal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ubigeo()
    {
        return $this->belongsTo(Ubigeo::class, "ubigeo_id");
    }

}
