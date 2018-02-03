<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class PerfilSeguidores extends Model {
    
    use Notifiable;
    
    protected $table = 'perfilSeguidores';

    protected $fillable = [
    						'idSeguir',
    						'idPerfilArtista',
                            'idQuemGostou',
    						'valido',
    						'dataHoraRegisto'
    					];


    protected $primaryKey = 'idPerfil';

    public $timestamps = false;

    protected $dates = ['dataHoraRegisto'];

}
