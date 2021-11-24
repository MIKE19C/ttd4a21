<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    // Nombre de la tabla
    protected $table='mascotas';

    // Clave primaria de la tabla
    protected $primaryKey='id_mascota';

    //Especificamos las relaciones 
    public $with=['especie'];

    //define si la llave primaria es o no un numero autoincrementable
    public $incrementing=true;

    // activar o desactivar etiquetas de tiempo
    public $timestamps=true;

    // Lista de campos que van a recibir valor 
    public $fillable=[
    'id_mascota',
    'nombre',
    'edad',
    'peso',
    'genero',
    'id_especie',
    'id_propietario'
    ];
    
    public function especie()
    {
        return $this->belongsTo(Especie::class,'id_especie','id_especie');
    }

}
