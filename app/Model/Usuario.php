<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $table = "usuarios";

    protected $primaryKey = "id";

    protected $fillable = [
        "usuario",
        "contrasenia",
        "idioma",
        "estado",
    ];

    /**
     * Devuelve el socio de negocio (colaborador) del usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function businessPartner()
    {
        return $this->belongsTo(SocioNegocio::class, "socio_negocio_id");
    }

    /**
     * Devuelve todas las sucursales del usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function branchOffices()
    {
        return $this->belongsToMany(UsuarioSucursal::class, "usuario_id");
    }

}
