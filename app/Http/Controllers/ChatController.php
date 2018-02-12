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
use App\Http\Models\Emails;


class ChatController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(Request $request)
    {
        
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

    public function pagina($id1,$id2)
    {
            $mensagens = Emails::where('idRemetente', '=', $id1,'AND',
                                       'idDestinatario', '=', $id2,'OR',
                                       'idRemetente', '=', $id2,'AND',
                                       'idDestinatario', '=', $id1)
                                        ->distinct()
                                        ->get();

            $artista = Utilizador::isArtista($id1);

            $perfil1 = Perfil::where('idUtilizador', '=', $id1)
                                    ->get();
            $perfil2 = Perfil::where('idUtilizador', '=', $id2)
                                    ->get();

            if (count($perfil1) && count($perfil2) > 0) 
                return view('frontend.displayChat')
                            ->with('artista', $artista[0])
                            ->with('perfil1', $perfil1[0])
                            ->with('perfil2', $perfil2[0])
                            ->with('emails', $mensagens)
                            ->with('tipoPesquisa', 1);
            else return view('frontend.errorPerfil');
    }

}
