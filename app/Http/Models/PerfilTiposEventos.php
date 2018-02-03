<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;

class PerfilTiposEventos extends Model {
    
    use Notifiable;
    
    protected $table = 'perfilTiposEventos';

    protected $fillable = [
    						'idTipoEvento',
    						'idPerfil',
    						'idUser',
    						'tipoEventoPrincipal',
    						'valido',
    						'observacoes'
    					];

    protected $primaryKey = [
    							'idPerfil',
    							'idTipoEvento'
    						];

    public $incrementing = false;

    public $timestamps = false;


    public function getTiposEventosPerfil($idPerfil){
    	$tiposEspetaculos = DB::table('perfilTiposEventos')
    								->select('perfilTiposEventos.*','tipoEventos.descricaoTipoEvento')
                                    ->join('tipoEventos','tipoEventos.idTipoEvento','=','perfilTiposEventos.idTipoEvento')
    								->where('perfilTiposEventos.idPerfil','=',$idPerfil)
    								->orderBy('perfilTiposEventos.tipoEventoPrincipal','DESC')
    								->get();
    	return $tiposEspetaculos;
    }

}
