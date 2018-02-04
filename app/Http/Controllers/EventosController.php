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
use App\Http\Models\Evento;
use App\Http\Models\Anuncios;
use App\Http\Models\Perfil;
use App\Http\Models\PerfilGaleria;
use Response;



class EventosController extends BaseController
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

        $tipoPesquisa = 2;


        $eventos = Evento::getAllEventos($request['pesquisaLivre']);

        return view('frontend.listaEventos')
                    ->with('idUser',$idUser)
                    ->with('tipoConta',$tipoConta)
                    ->with('autenticado',$autenticado)
                    ->with('pesquisaLivre',$pesquisaLivre)
                    ->with('tipoPesquisa', $request['tipoPesquisa'])
                    ->with('eventos', $eventos);
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
        $evento = Evento::isEvento($id);

        if(count($evento) == 1)
        {
            
            return view('frontend.displayPerfilEvento')
                            ->with('evento', $evento[0])
                            ->with('tipoPesquisa', 2);
        }
        else return view('frontend.errorPerfil');
    }

}
