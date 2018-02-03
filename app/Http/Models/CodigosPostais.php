<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class CodigosPostais extends Model {
    
    use Notifiable;
    
    protected $table = 'codigosPostais';

    protected $fillable = [
    							'idCodigoPostal',
    							'idDistrito'
    							'idConcelho',
    							'codLocalidade',
    							'nomeLocalidade',
    							'codPostal1',
    							'codPostal2',
    							'codPostalDesignacao'
    					];

    protected $primaryKey = 'idCodigoPostal';

    public $timestamps = false;


    public static function getPaises(){
    	$paises = DB::table('paises')
    					->select('paises.*')
    					->get();
    	return $paises;
    }
}
