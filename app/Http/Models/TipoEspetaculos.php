<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;

class TipoEspetaculos extends Model {
    
    use Notifiable;
    
    protected $table = 'tipoEspetaculos';

    protected $fillable = [
    						'idTipoEspetaculo',
    						'descricaoTipoEspetaculo',
    						'estado'
    					];

    protected $primaryKey = 'idTipoEspetaculo';

    public $timestamps = false;


    public static function getTiposEspetaculos(){
    	$tiposEspetaculos = DB::table('tipoEspetaculos')
    								->select('tipoEspetaculos.*')
    								->orderBy('tipoEspetaculos.descricaoTipoEspetaculo','ASC')
    								->get();
    	return $tiposEspetaculos;
    }
}
