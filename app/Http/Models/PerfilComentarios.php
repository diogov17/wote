<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;

class PerfilComentarios extends Model {
    
    use Notifiable;
    
    protected $table = 'perfilComentarios';

    protected $fillable = [
    							'idComentario',
    							'idPerfil',
    							'comentario',
    							'valido',
    							'idUtilizadorComentou',
    							'dataHoraRegisto'
    					];

    protected $dates = [
    						'dataHoraRegisto'
    					];


    protected $primaryKey = 'idComentario';

    public $timestamps = false;


    
    public static function getComentariosAnuncio($idPerfil){
    	$comentarios = DB::table('perfilComentarios')
    						->select('perfilComentarios.*')
    						->where('idPerfil','=',$idPerfil)
    						->orderBy('dataHoraRegisto','DESC')
    						->take(10)
    						->get();


    	return $comentarios;
    }

    public static function getMoreComentarios($idPerfil, $limiteInferior, $quantos){

    	$comentarios = DB::table('perfilComentarios')
    						->select('perfilComentarios.*')
    						->where('idPerfil','=',$idPerfil)
    						->orderBy('dataHoraRegisto','DESC')
    						->offset($limiteInferior)
    						->limit($quantos)
    						->take(5)
    						->get();

    	return $comentarios;
    }

    public static function quantosComentariosAnuncio($idPerfil){
    	$quantosComentarios = DB::table('perfilComentarios')
    						->where('idPerfil','=',$idPerfil)
    						->count();

    	return $quantosComentarios;
    }




}
