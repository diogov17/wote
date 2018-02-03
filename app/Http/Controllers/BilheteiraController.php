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
use App\Http\Models\EventosArtistasContratados;
use Response;





class BilheteiraController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request){

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

        
        $artistasHome = Anuncios::getAnunciosHomeDestaques($idUser, $autenticado);
       
        
        
        $ultimosEspetaculos = EventosArtistasContratados::getUltimasConfirmacoes();

        return view('frontend.principal')
                    ->with('idUser',$idUser)
                    ->with('tipoConta',$tipoConta)
                    ->with('autenticado',$autenticado)
                    ->with('artistasHome',$artistasHome)
                    ->with('ultimosEspetaculos',$ultimosEspetaculos);
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




}
