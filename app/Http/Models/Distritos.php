<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class Distritos extends Model {
    
    use Notifiable;
    
    protected $table = 'distritos';

    protected $fillable = [
    						'idDistrito',
    						'descricaoDistrito',
    						'idPais'
    					];

    protected $primaryKey = 'idDistrito';

    public $timestamps = false;


    public static function getDistritos($idPais){
        $distritos = DB::table('distritos')
                            ->select('distritos.idDistrito AS id', 'distritos.descricaoDistrito AS text')
                            ->where('distritos.idPais','=',$idPais)
                            ->orderBy('distritos.descricaoDistrito','ASC')
                            ->get();
        
        return $distritos;
    }
        

}
