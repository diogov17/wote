<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UtilizadoresTiposConta extends Model {
    
    use Notifiable;
    
    protected $table = 'UtilizadoresTiposConta';

    protected $fillable = [
    						'idUser',
    						'idTipologia',
                            'idSubTipologia'
    					];


    protected $primaryKey = [
    							'idUser',
    							'idTipologia'
    						];


    public $incrementing = false;

    public $timestamps = false;
}
