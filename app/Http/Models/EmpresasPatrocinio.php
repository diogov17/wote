<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class EmpresasPatrocinio extends Model {
    
    use Notifiable;
    
    protected $table = 'empresasPatrocinio';

    protected $fillable = [
    						'idEmpresa',
    						'nomeEmpresa',
    						'urlEmpresa',
    						'logoEmpresa',
    						'descricaoEmpresa',
    						'tipoDestaque'
    					];


    protected $primaryKey = 'idEmpresa';
}
