<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;

class TipoEventos extends Model {
    
    use Notifiable;
    
    protected $table = 'tipoEventos';
    protected $fillable = ['idTipoEvento',
    						'descricaoTipoEvento',
    						'estado'
    					];

    protected $primaryKey = 'idTipoEvento';

    public $timestamps = false;


    public static function getEventosTipos(){
    	$tiposEventos = DB::table('tipoEventos')
    							->select('tipoEventos.*')
    							->where('tipoEventos.estado','=',1)
    							->get();

    	return $tiposEventos;
    }


}
