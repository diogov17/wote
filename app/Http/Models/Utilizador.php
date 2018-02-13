<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticable;
use Illuminate\Auth\Authenticable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

//class Utilizador extends Model
class Utilizador extends User
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

    public static function getAllArtistas($input)
    {
        return DB::table('users')
                            ->join('UtilizadoresTiposConta','users.id','=','UtilizadoresTiposConta.idUser')
                            ->join('usersTipologia','UtilizadoresTiposConta.idTipologia','=','usersTipologia.idTipoConta')
                            ->where('usersTipologia.idTipoConta', '=', '1')
                            ->where('name', 'like', '%' . $input . '%')
                            ->join('perfil','users.id','=','perfil.idUtilizador')
                            ->get();
    }

    public static function getAllOrganizadores($input)
    {
        return DB::table('users')
                            ->join('UtilizadoresTiposConta','users.id','=','UtilizadoresTiposConta.idUser')
                            ->join('usersTipologia','UtilizadoresTiposConta.idTipologia','=','usersTipologia.idTipoConta')
                            ->where('usersTipologia.idTipoConta', '=', '2')
                            ->where('name', 'like', '%' . $input . '%')
                            ->join('perfil','users.id','=','perfil.idUtilizador')
                            ->get();
    }

    public static function isArtista($id)
    {
        $artista = DB::table('users')
                            ->join('UtilizadoresTiposConta','users.id','=','UtilizadoresTiposConta.idUser')
                            ->join('usersTipologia','UtilizadoresTiposConta.idTipologia','=','usersTipologia.idTipoConta')
                            ->where('usersTipologia.idTipoConta', '=', '1')
                            ->where('id', '=', $id)
                            ->join('concelhos', 'users.idConcelho', '=', 'concelhos.idConcelho')
                            ->join('distritos', 'concelhos.idDistrito', '=', 'distritos.idDistrito')
                            ->get();
        return $artista;
    }

    public static function isOrganizador($id)
    {
        $organizador = DB::table('users')
                            ->join('UtilizadoresTiposConta','users.id','=','UtilizadoresTiposConta.idUser')
                            ->join('usersTipologia','UtilizadoresTiposConta.idTipologia','=','usersTipologia.idTipoConta')
                            ->where('usersTipologia.idTipoConta', '=', '2')
                            ->where('id', '=', $id)
                            ->join('concelhos', 'users.idConcelho', '=', 'concelhos.idConcelho')
                            ->join('distritos', 'concelhos.idDistrito', '=', 'distritos.idDistrito')
                            ->get();
        return $organizador;
    }

    public static function isFa($id)
    {
        $organizador = DB::table('users')
                            ->join('UtilizadoresTiposConta','users.id','=','UtilizadoresTiposConta.idUser')
                            ->join('usersTipologia','UtilizadoresTiposConta.idTipologia','=','usersTipologia.idTipoConta')
                            ->where('usersTipologia.idTipoConta', '=', '3')
                            ->where('id', '=', $id)
                            ->join('concelhos', 'users.idConcelho', '=', 'concelhos.idConcelho')
                            ->join('distritos', 'concelhos.idDistrito', '=', 'distritos.idDistrito')
                            ->get();
        return $organizador;
    }

}
