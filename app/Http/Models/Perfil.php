<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class Perfil extends Model {
    
    use Notifiable;
    
    protected $table = 'perfil';

    protected $fillable = [
        'idPerfil',
        'idUtilizador',
        'tipoUtilizador',
        'descricao',
        'observacoes',
        'estiloPrincipal',
        'feedbackGeral',
        'nrSeguidoresTotal',
        'nomeArtistico',
        'nomeEmpresaOrganiza'
    ];


    protected $primaryKey = 'idPerfil';

    public $timestamps = false;


    public function updateFeedbackGeral($idPerfil, $feedbackGeral){
        
        $perfil = Perfil::findOrFail($idPerfil);
        $resultado = 0;

        if($perfil){
            $perfil->feedbackGeral = $feedbackGeral;
            $perfil->save();
            $resultado = 1;
        }
        else {
            $resultado = 0;
        }
        return $resultado;
    }
}