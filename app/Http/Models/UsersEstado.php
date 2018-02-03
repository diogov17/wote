<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;

class UsersEstado extends Model {
    
    use Notifiable;
    
    protected $table = 'usersEstado';

    protected $fillable = [
    						'idEstado',
    						'designacaoEstado'
    					  ];

    protected $primaryKey = 'idEstado';

    public $timestamps = false;

}
