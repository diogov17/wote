<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class GostosPerfilCalendario extends Model {
    
    use Notifiable;
    

    protected $table = 'gostosPerfilCalendario';

    protected $fillable = [
    						'idGostoCalendario',
    						'idMarcacao',
    						'idClienteMeteuGosto'
    					];


    protected $primaryKey = 'idGostoCalendario';

    public $timestamps = false;

}
