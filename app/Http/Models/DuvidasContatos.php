<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class DuvidasContatos extends Model {
    
    use Notifiable;
    
    protected $table = 'duvidasContactos';

    protected $fillable = [
    						'idDuvida',
    						'nome',
    						'telefone',
    						'email',
    						'mensagem',
                            'estado',
    						'dataHoraRegisto',
    						'dataHoraTratada',
                            'tipoForm'
    					];

    protected $dates = [
    						'dataHoraTratada',
    						'dataHoraRegisto'
    					];

    protected $primaryKey = 'idDuvida';

    public $timestamps = false;
}
