<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class Paises extends Model {
    
    use Notifiable;
    
    protected $table = 'paises';

    protected $fillable = ['idPais','descricaoPais'];

    protected $primaryKey = 'idPais';

    public $timestamps = false;


    public static function getPaises(){
    	$paises = DB::table('paises')
    					->select('paises.*')
    					->get();
    	return $paises;
    }
}
