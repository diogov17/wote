<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class EstadoUtilizadoresEvento extends Model {
    
    use Notifiable;
    
    protected $table = 'estadoUtilizadoresEvento';

    protected $fillable = [
    						'idEstado',
    						'descricaoEstado'
    					];

    protected $primaryKey = 'idEstado';

    public $timestamps = false;
}
