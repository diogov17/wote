<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;

class Concelhos extends Model {
    
    use Notifiable;
    
    protected $table = 'concelhos';

    protected $fillable = [
    						'idConcelho',
    						'idConcelhoAux',
    						'descricaoConcelho',
    						'idDistrito'
    					];

    protected $primaryKey = 'idConcelho';

    public $timestamps = false;


    public static function getConcelhos($idDistrito){

        $concelhos = DB::table('concelhos')
                            ->select('concelhos.idConcelho AS id', 'concelhos.descricaoConcelho AS text')
                            ->where('concelhos.idDistrito','=',$idDistrito)
                            ->orderBy('concelhos.descricaoConcelho','ASC')
                            ->get();
        return $concelhos;
    }
}
