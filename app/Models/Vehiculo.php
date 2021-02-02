<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    //protected $primaryKey = 'vehiculo';
    protected $guarded = [];

    //Combustion
    const COMBUSTION_GASOIL = 'N';
    const COMBUSTION_DIESEL = 'D';
    const COMBUSTION_ALCOHOL = 'A';
    const COMBUSTION_FLEX = 'F';
    const COMBUSTION_ELECTRICO = 'E';
    const COMBUSTION_GAS = 'G';
    const COMBUSTION_HIDROGENO = 'H';

    //Tipo
    const TIPO_SUBCOMPACTO 		= 'a';
    const TIPO_HATCHBACK 		= 'b';
    const TIPO_FAMILIAR 		= 'c';
    const TIPO_SEDAN 			= 'd';
    const TIPO_BERLINA 			= 'e';
    const TIPO_DESCAPOTABLE 	= 'f';
    const TIPO_COUPE 			= 'g';
    const TIPO_MUSCLE  			= 'h';
    const TIPO_DEPORTIVOS 		= 'i';
    const TIPO_SUPERDEPORTIVOS 	= 'j';
    const TIPO_HYPERCAR 		= 'k';
    const TIPO_MEGAGT 			= 'l';
    const TIPO_MONOVOLUMEN 		= 'm';
    const TIPO_TODOTERRENO 		= 'n';
    const TIPO_SUV 				= 'o';
    const TIPO_CROSSOVER 		= 'p';
    const TIPO_COMERCIAL 		= 'q';
    const TIPO_AUTOCARAVANA 	= 'r';
    const TIPO_PICKUP 			= 's';
    const TIPO_CLASICOS 		= 't';

    public function getCombustiones()
    {
        return $combustiones = [
            'Nafta'      => Vehiculo::COMBUSTION_GASOIL,
            'Diesel'     => Vehiculo::COMBUSTION_DIESEL,
            'Alcohol'    => Vehiculo::COMBUSTION_ALCOHOL,
            'Flex'       => Vehiculo::COMBUSTION_FLEX,
            'Electrico'  => Vehiculo::COMBUSTION_ELECTRICO,
            'Gas'        => Vehiculo::COMBUSTION_GAS,
            'Hidrogeno'  => Vehiculo::COMBUSTION_HIDROGENO,
        ];
    }
    public function getTipos()
    {
        return $tipos = [
            'Subcompacto' 		=> Vehiculo::TIPO_SUBCOMPACTO 	,
            'Hatchback' 		=> Vehiculo::TIPO_HATCHBACK 	,
            'Familiar' 			=> Vehiculo::TIPO_FAMILIAR 		,
            'Sedan' 			=> Vehiculo::TIPO_SEDAN 		,
            'Berlina' 			=> Vehiculo::TIPO_BERLINA 		,
            'Descapotable' 		=> Vehiculo::TIPO_DESCAPOTABLE 	,
            'Coupe' 			=> Vehiculo::TIPO_COUPE 		,
            'Muscle' 			=> Vehiculo::TIPO_MUSCLE  		,
            'Deportivos' 		=> Vehiculo::TIPO_DEPORTIVOS 	,
            'Superdeportivos' 	=> Vehiculo::TIPO_SUPERDEPORTIVOS,
            'Hypercar' 			=> Vehiculo::TIPO_HYPERCAR 		,
            'Mega Gt' 			=> Vehiculo::TIPO_MEGAGT 		,
            'Monovolumen' 		=> Vehiculo::TIPO_MONOVOLUMEN	,
            'Todoterreno' 		=> Vehiculo::TIPO_TODOTERRENO	,
            'Suv' 				=> Vehiculo::TIPO_SUV 			,
            'Crossover' 		=> Vehiculo::TIPO_CROSSOVER 	,
            'Comercial' 		=> Vehiculo::TIPO_COMERCIAL 	,
            'Autocaravana' 		=> Vehiculo::TIPO_AUTOCARAVANA 	,
            'Pick Up' 			=> Vehiculo::TIPO_PICKUP 		,
            'Clasicos' 			=> Vehiculo::TIPO_CLASICOS 		,
        ];
    }

    /*public function setFullNameAttribute()
    {
        return $this->fmodelo->descripcion . ' ' . $this->fmodelo->fmarca->descripcion;
    }*/

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'vehiculo_id' );
    }
//    public function entregas()
//    {
//        return $this->hasMany(Entregas::class, 'vehiculo', 'vehiculo');
//    }
//    public function ordenes_trabajos()
//    {
//        return $this->hasMany(OrdeneTrabajo::class, 'vehiculo', 'vehiculo');
//    }
//    public function recepciones()
//    {
//        return $this->hasMany(Recepcion::class, 'vehiculo', 'vehiculo');
//    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo_id');
    }

    public function marcaObj()
    {
        return $this->hasOneThrough(Marca::class, Modelo::class  );
    }
}
