<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class PerfilCalendario extends Model {
    
    use Notifiable;
    
    protected $table = 'perfilCalendario';

    protected $fillable = [
    						'idMarcacao',
    						'diaInicio',
    						'mesInicio',
    						'anoInicio',
    						'horaInicio',
    						'minutosInicio',
    						'diaFim',
    						'mesFim',
    						'anoFim',
    						'horaFim',
    						'minutosFim',
    						'tipoMarcacao',
    						'observacoesMarcacao',
    						'idClienteCalendario',
    						'idEvento',
    						'dataHoraInicio',
    						'dataHoraFim'
    					];

    protected $dates = ['dataHoraFim','dataHoraInicio']
    
    protected $primaryKey = 'idMarcacao';

    public $timestamps = false;
}
