<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class EventosTipos extends Model {
    
    use Notifiable;
    
    protected $table = 'eventosTipos';

    protected $fillable = [
    						'idEvento',
    						'tipoEvento'
    					];

    protected $primaryKey = ['idEvento','tipoEvento'];

    public $incrementing = false;

    public $timestamps = false;


}
