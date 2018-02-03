<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class PerfilTempoMarcados extends Model {
    
    use Notifiable;
    
    protected $table = 'perfilTempoMarcados';

    protected $fillable = [
    						'idTempoMarcado',
    						'hora',
    						'dia',
    						'mes',
    						'ano',
    						'idCliente',
    						'dataCorrespondente'
    					];

    protected $dates = ['dataCorrespondente'];
    
    protected $primaryKey = 'idTempoMarcado';

    public $timestamps = false;
}
