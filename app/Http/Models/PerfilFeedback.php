<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use App\Models\Perfil;

class PerfilFeedback extends Model {
    
    use Notifiable;
    
    protected $table = 'perfilFeedback';

    protected $fillable = [
    						'idFeedback',
    						'idPerfil',
    						'feedbackDado',
    						'texto',
    						'dataHoraRegisto',
    						'idClienteDeuFeedback'
    						'valido'
    					];


    protected $primaryKey = 'idFeedback';

	protected $dates = ['dataHoraRegisto'];

    public $timestamps = false;


    public function insertNovoFeedback($idPerfil, $idClienteDeuFeedback, $feedbackDado, $texto){
    	$novoFeedback = new PerfilFeedback();
    	$novoFeedback->idPerfil = $idPerfil;
    	$novoFeedback->idClienteDeuFeedback = $idClienteDeuFeedback;
    	$novoFeedback->texto = $texto;
    	$novoFeedback->feedbackDado = $feedbackDado;
    	$novoFeedback->save();

    	PerfilFeedback::recalculaFeedback($idPerfil);
    	
    	$resultado = $novoFeedback->id;
    	return $resultado;
    }

    public function recalculaFeedback($idPerfil){
    	$somaFeedbacks = DB::table('perfilFeedback')
    							->where('idPerfil','=',$idPerfil)
    							->where('valido','=',1)
    							->sum('feedbackDado');

    	$quantosFeedbacks = DB::table('perfilFeedback')
    							->where('idPerfil','=',$idPerfil)
    							->where('valido','=',1)
    							->count();
    	
    	$media = $somaFeedbacks / $quantosFeedbacks;

    	$updateValor = Perfil::updateFeedbackGeral($idPerfil, $media);

    	return $updateValor;

    }
}
