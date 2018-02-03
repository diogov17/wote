<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class LocalEventos extends Model {
    
    use Notifiable;
    
    protected $table = 'localEventos';

    protected $fillable = [
    						'idLocal',
                            'descricaoLocal',
    						'moradaLocal',
    						'codigoPostal1',
    						'codigoPostal2',
    						'idFreguesia',
    						'coordenadaX',
    						'coordenadaY',
    						'localidade',
    						'lotacaoMax'
    					];

    protected $primaryKey = 'idLocal';

    public $timestamps = false;
}
