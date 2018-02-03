<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Utilizador extends Model
{

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'email',
        'morada',
        'codigoPostal1',
        'codigoPostal2',
        'codigoPostalDesignacao',
        'idConcelho',
        'estado',
        'contribuinte',
        'telefone',
        'telemovel',
        'password',
        'nrCreditos',
        'precoHora',
        'precoDia',
        'precoDeslocacao',
        'precoMinimoAtuacao',
        'dataExpiracaoConta',
        'dataRegisto',
        'created_at',
        'updated_at',
        'remember_token',
        'ultimaHashVerificacao',
        'pedidoRecuperacaoPass',
        'urlLogotipo'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public $dates = [ 'dataExpiracaoConta', 'dataRegisto'];

    public $timestamps = ['created_at','updated_at'];



    public static function verificaUtilizadorJaRegistado($email, $telemovel){

        $resultado = DB::table('users')
                            ->select('users.id')
                            ->orWhere('users.email','=',$email)
                            ->orWhere('users.telefone','=',$telemovel)
                            ->orWhere('users.telemovel','=',$telemovel)
                            ->first();

        if(count($resultado) && $resultado->id){
            $idUtilizador = $resultado->id;
        }
        else {
            $idUtilizador = 0;
        }
        return $idUtilizador;             
    }

    public static function getUtilizadorByToken($codigo){

        $resultado = DB::table('users')
                            ->select('users.id','users.pedidoRecuperacaoPass','users.estado')
                            ->where('users.ultimaHashVerificacao','=',$codigo)
                            ->first();

        return $resultado;
    }

    public static function updateEstadoUtilizador($idUtilizador, $novoEstado){

        $utilizador = Utilizador::findOrFail($idUtilizador);
        $utilizador->estado = $novoEstado;
        $utilizador->save();

        return 1;
    }

    /*
    public static function searchArtistas($input)
    {
        return DB::table('users')
                            ->join('UtilizadoresTiposConta','users.id','=','UtilizadoresTiposConta.idUser')
                            ->join('usersTipologia','UtilizadoresTiposConta.idTipologia','=','usersTipologia.idTipoConta')
                            ->where('usersTipologia.idTipoConta', '=', '1')
                            ->where('nome', 'like', '%' . $input . '%')
                            ->get();
    }

    public static function searchOrganizadores($input)
    {
        return DB::table('users')
                            ->join('UtilizadoresTiposConta','users.id','=','UtilizadoresTiposConta.idUser')
                            ->join('usersTipologia','UtilizadoresTiposConta.idTipologia','=','usersTipologia.idTipoConta')
                            ->where('usersTipologia.idTipoConta', '=', '2')
                            ->where('nome', 'like', '%' . $input . '%')
                            ->get();
    }

    public static function searchEventos($input)
    {
        return DB::table('evento')
                            ->where('tituloEvento', 'like', '%' . $input . '%')
                            ->get();
    }
    */

}
