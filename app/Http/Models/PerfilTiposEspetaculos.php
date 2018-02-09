<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;

class PerfilTiposEspetaculos extends Model {
    
    use Notifiable;
    
    protected $table = 'perfilTiposEspetaculos';

    protected $fillable = [
    						'idPerfil',
    						'idTipoEspetaculo',
    						'idUser',
    						'nrHorasDisponivel',
    						'precoHora',
    						'idConcelho',
    						'configGeral',
    						'descricaoTrabalhos',
    						'sobConsulta',
    						'precoDia',
    						'precoDeslocacao',
    						'tipoEspetaculoPrincipal'
    					];

    protected $primaryKey = [
    							'idPerfil',
    							'idTipoEspetaculo'
    						];

    public $incrementing = false;

    public $timestamps = false;


    public static function getTiposEspetaculosPerfil($idPerfil){
    	$tiposEspetaculos = DB::table('perfilTiposEspetaculos')
    								->select('perfilTiposEspetaculos.*','tipoEspetaculos.descricaoTipoEspetaculo')
                                    ->join('tipoEspetaculos','tipoEspetaculos.idTipoEspetaculo','=','perfilTiposEspetaculos.idTipoEspetaculo')
    								->where('perfilTiposEspetaculos.idPerfil','=',$idPerfil)
    								->orderBy('perfilTiposEspetaculos.tipoEspetaculoPrincipal','DESC')
    								->get();
    	return $tiposEspetaculos;
    }

}
