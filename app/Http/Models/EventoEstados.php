<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class EventoEstados extends Model {
    
    use Notifiable;
    
    protected $table = 'eventoEstados';

    protected $fillable = [
    						'idEstado',
    						'descricaoEstado'
    					];

    protected $primaryKey = 'idEstado';

    public $timestamps = false;
}
