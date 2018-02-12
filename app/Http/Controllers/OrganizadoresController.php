<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Models\Utilizador;
use App\Http\Models\Anuncios;
use App\Http\Models\Perfil;
use App\Http\Models\PerfilGaleria;
use Response;



class OrganizadoresController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(Request $request)
    {
        $request = session('searchRequest');

        $utilizadorAtual = Auth::user();
        if($utilizadorAtual){
            $idUser = $utilizadorAtual->id;
            $tipoConta = $utilizadorAtual->tipoConta;
            $autenticado = 1;
        }
        else {
            $idUser = 0;
            $tipoConta = 0;
            $autenticado = 0;
        }

        if(isset($request->pesquisaLivre))
            $pesquisaLivre = $request->pesquisaLivre;
        else 
            $pesquisaLivre = '';

        $tipoPesquisa = 3;


        $organizadores = Utilizador::getAllOrganizadores($request['pesquisaLivre']);

        $profilePics = array();

        foreach ($organizadores as $organizador)
            $profilePics[$organizador->id] = PerfilGaleria::getProfilePic($organizador->id);


        return view('frontend.listaOrganizadores')
                    ->with('idUser',$idUser)
                    ->with('tipoConta',$tipoConta)
                    ->with('autenticado',$autenticado)
                    ->with('pesquisaLivre',$pesquisaLivre)
                    ->with('tipoPesquisa', $request['tipoPesquisa'])
                    ->with('organizadores', $organizadores)
                    ->with('profilePics', $profilePics);
    }

  
    public function create()
    {
       
    }

    
    public function store(Request $request)
    {

      
    }

  
    public function show($id)
    {



    }

   
    public function edit($id)
    {
       

    }

    public function pagina($id)
    {
        $organizador = Utilizador::isOrganizador($id);

        if(count($organizador) == 1)
        {
            $perfil = Perfil::where('idUtilizador', '=', $id)
                                    ->get();

            $profilePic = PerfilGaleria::getProfilePic($id);

            $calendario = [];
            
            if (count($organizador) > 0 && count($perfil) > 0) 
                return view('frontend.displayPerfilOrganizador')
                            ->with('organizador', $organizador[0])
                            ->with('perfil', $perfil[0])
                            ->with('profilePic', $profilePic)
                            ->with('calendario', $calendario)
                            ->with('tipoPesquisa', 3)
                            ->with('pageId', $id);
            else return view('frontend.errorPerfil');
        }
        else return view('frontend.errorPerfil');
    }

}