<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class Evento extends Model {
    
    use Notifiable;
    
    protected $table = 'evento';

    protected $fillable = [
    						'idEvento',
    						'tituloEvento',
    						'idUtilizador',
    						'descricaoEvento',
    						'dataInicioEvento',
                            'dataFimEvento',
    						'dataCriacaoEvento',
    						'dataLimiteInscricao',
    						'nrMaxParticipantes',
    						'nrPessoasInscritas',
    						'idLocal',
    						'patrocinado',
    						'dataExpiracaoPatrocinio',
    						'estadoEvento',
    						'nrGostos',
                            'urlImagemEvento'
    					];

    protected $dates = [
    						'dataInicioEvento',
    						'dataCriacaoEvento',
    						'dataLimiteInscricao',
    						'dataExpiracaoPatrocinio',
                            'dataFimEvento'
    					];

    protected $primaryKey = 'idEvento';

    public $timestamps = false;
}
