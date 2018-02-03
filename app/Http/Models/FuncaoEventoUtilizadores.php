<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class FuncaoEventoUtilizadores extends Model {
    
    use Notifiable;
    
    protected $table = 'funcaoEventoUtilizadores';

    protected $fillable = [
    						'idFuncao',
    						'descricaoFuncao'
    					];

    protected $primaryKey = 'idFuncao';


    public $timestamps = false;
}
