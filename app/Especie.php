<?php

namespace App;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    //use HasFactory;
    protected $table='especies';
    protected $primaryKey='id_especie';

    public $incrementing=true;
    public $timestamps=false;

    public $fillable=[
    	'id_especie',
    	'especie' 
    ];

}
