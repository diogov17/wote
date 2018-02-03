<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UtilizadoresGostamEvento extends Model {
    
    use Notifiable;
    
    protected $table = 'UtilizadoresGostamEvento';

    protected $fillable = [
    						'idUser',
    						'idEvento',
    						'estado'
    					];

    protected $dates = 'dataRegisto';

    protected $primaryKey = [
    							'idUser',
    							'idEvento'
    						];

    public $incrementing = false;

    public $timestamps = false;
}
