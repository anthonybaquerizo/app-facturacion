<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SocioNegocio extends Model
{

    protected $table = "socios_negocio";

    protected $primaryKey = "id";

    protected $fillable = [
        "cliente",
        "proveedor",
        "colaborador",
        "codigo_interno",
        "ruc",
        "nro_documento",
        "razon_social",
        "nombres",
        "ape_paterno",
        "ape_materno",
        "pagina_web",
        "estado",
    ];

    /**
     * Devuelve el tipo de dcoumento del socio de negocio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documentType()
    {
        return $this->belongsTo(TipoDocumento::class, "tipo_documento_id");
    }

    /**
     * Devuelve el usuario del socio de negocio (colaborador)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(Usuario::class, "socio_negocio_id");
    }

}
