<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class PerfilZonasAtuacao extends Model {
    
    use Notifiable;
    
    protected $table = 'perfilZonasAtuacao';

    protected $fillable = [
    						'idPerfilZona',
    						'idPerfil',
                            'idConcelho',
    						'valido',
    						'dataHoraRegisto'
    					];


    protected $primaryKey = 'idPerfilZona';

    public $timestamps = false;


    public function getZonasAtuacaoPerfil($idPerfil){
        
        $zonas = DB::table('perfilZonasAtuacao')
                        ->select('perfilZonasAtuacao.*','concelhos.descricaoConcelho')
                        ->join('concelhos','concelhos.idConcelho','=','perfilZonasAtuacao.idConcelho')
                        ->where('perfilZonasAtuacao.idPerfil','=',$idPerfil)
                        ->where('perfilZonasAtuacao.valido','=',1)
                        ->get();

        return $zonas;
    }


}
