<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class EventosArtistasContratados extends Model {
    
    use Notifiable;
    
    protected $table = 'EventosArtistasContratados';

    protected $fillable = [
    						'idEvento',
    						'idArtista',
    						'dataHoraContrato',
    						'valido'

    					];

    protected $dates = [
    						'dataHoraContrato'
    					];

    protected $primaryKey = ['idEvento', 'idArtista'];

    public $timestamps = false;


    //Vai buscar as últimas 5 contratações/confirmações:
    public static function getUltimasConfirmacoes(){
    	
    	$dataAtual = date('Y-m-d H:i:s');

    	$ultimasContratacoes = DB::table('EventosArtistasContratados')
    									->select('evento.*','localEventos.descricaoLocal','localEventos.localidade')
    									->join('evento','evento.idEvento','=','EventosArtistasContratados.idEvento')
                                        ->join('localEventos','localEventos.idLocal','=','evento.idLocal')
    									->where('EventosArtistasContratados.valido','=',1)
    									->where('evento.estadoEvento','=',1)
    									->where('evento.dataFimEvento','>',$dataAtual)
    									->orderBy('evento.nrGostos','DESC')
    									->take(5)
    									->get();
    	return $ultimasContratacoes;

    }
}
