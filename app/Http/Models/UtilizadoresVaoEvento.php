<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UtilizadoresVaoEvento extends Model {
    
    use Notifiable;
    
    protected $table = 'UtilizadoresVaoEvento';

    protected $fillable = [
    						'idUser',
    						'idEvento',
    						'dataRegisto',
    						'estado',
    						'idFuncaoNoEvento'
    					];

    protected $dates = 'dataRegisto';

    protected $primaryKey = ['idUser',
    						'idEvento'];

    public $incrementing = false;

    public $timestamps = false;

}
