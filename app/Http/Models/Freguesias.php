<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class Freguesias extends Model {
    
    use Notifiable;
    
    protected $table = 'freguesias';

    protected $fillable = [
    						'idFreguesia',
    						'descricaoFreguesia',
    						'idConcelho'
    					];

    protected $primaryKey = 'idFreguesia';

    public $timestamps = false;

}
