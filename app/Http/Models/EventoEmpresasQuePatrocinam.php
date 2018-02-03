<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class EventoEmpresasQuePatrocinam extends Model {
    
    use Notifiable;
    
    protected $table = 'eventoEmpresasQuePatrocinam';

    protected $fillable = [
    						'idEmpresa',
    						'idEvento',
    						'tipoDestaque',
    						'valido'
    					 ];

    protected $primaryKey = ['idEmpresa','idEvento'];

    public $incrementing = false;

    public $timestamps = false;


}
