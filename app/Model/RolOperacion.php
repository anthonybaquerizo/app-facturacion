<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolOperacion extends Model
{

    protected $table = "rol_operaciones";

    protected $primaryKey = "id";

    protected $fillable = [
        "estado"
    ];

    public $with = ["operation"];

    /**
     * Devuelve el rol al que pertenece
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class, "rol_id");
    }

    /**
     * Devuelve la operacion asignado al rol
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operation()
    {
        return $this->belongsTo(Operacion::class, "operacion_id");
    }

}
