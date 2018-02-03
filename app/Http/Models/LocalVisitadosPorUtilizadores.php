<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class LocalVisitadosPorUtilizadores extends Model {
    
    use Notifiable;
    
    protected $table = 'LocalVisitadosPorUtilizadores';

    protected $fillable = [
    						'idLocal',
    						'idUser'
    					];

    protected $primaryKey = [
    							'idLocal',
    							'idUser'
    						];

    public $timestamps = false;

    public $incrementing = false;

}
