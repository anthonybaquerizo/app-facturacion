<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SocioNegocioSucursal extends Model
{

    protected $table = "socio_negocio_sucursales";

    protected $primaryKey = "id";

    protected $fillable = [
        "estado",
    ];

    /**
     * Devuelve la sucursal a la que pertence
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function businessPartner()
    {
        return $this->belongsTo(SocioNegocio::class, "socio_negocio_id");
    }

    /**
     * Devuelve la sucursal a la que pertence
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchOffice()
    {
        return $this->belongsTo(Sucursal::class, "sucursal_id");
    }

}
