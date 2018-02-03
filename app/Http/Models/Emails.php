<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class Emails extends Model {
    
    use Notifiable;
    
    protected $table = 'emails';

    protected $fillable = [
    						'idEmail',
    						'idRemetente',
    						'idDestinatario',
    						'idPasta',
    						'dataHoraCriacao',
    						'visto',
    						'mensagem',
    						'idPedidoOrcamento',
    						'idEmailResposta'
    					];

    protected $dates = ['dataHoraCriacao'];

    protected $primaryKey = 'idEmail';

    public $timestamps = false;
}
