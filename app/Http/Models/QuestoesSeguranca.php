<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;

class QuestoesSeguranca extends Model {
    
    use Notifiable;
    
    protected $table = 'questoesSeguranca';

    protected $fillable = [
    						'idQuestao',
    						'valor1',
    						'valor2',
    						'resultado'
    					];

    protected $primaryKey = 'idQuestao';

    public $timestamps = false;


    public static function getQuestaoSeguranca(){
        $resultado = DB::table('questoesSeguranca')
                            ->inRandomOrder()
                            ->first();
        return $resultado;
    }

    public static function getQuestaoSegurancaById($idQuestao){
        $resultado = DB::table('questoesSeguranca')
                            ->select('questoesSeguranca.*')
                            ->where('idQuestao','=',$idQuestao)
                            ->first();
        return $resultado;
    }





}
