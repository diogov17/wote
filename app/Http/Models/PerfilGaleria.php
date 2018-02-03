<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;

class PerfilGaleria extends Model {
    
    use Notifiable;
    
    protected $table = 'perfilGaleria';

    protected $fillable = [
        'idGaleria',
        'idUtilizador',
        'posicaoGaleria',
        'urlGaleria',
        'valido'
    ];

    protected $primaryKey = 'idGaleria';

    public $timestamps = false;
}