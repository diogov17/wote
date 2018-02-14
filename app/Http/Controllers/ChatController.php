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


    public function enviarMsg(Request $request)
    {
        $nemails = new Emails;
        $nemails->idRemetente       = 1;
        $nemails->idDestinatario    = 9;
        $nemails->idPasta           = 0;
        $nemails->dataHoraCriacao   = date('Y-m-d H:i:s');
        $nemails->visto             = 1;
        $nemails->mensagem          = $request->mensagem;
        $nemails->idPedidoOrcamento = 1;
        $nemails->idEmailResposta   = 0;


        $nemails->save();

            $ids = array();
            $ids[1] = $request->$id1;
            $ids[2] = $request->$id2;
    
    $mensagens = DB::table('emails')
                    ->where(function($query1) use ($ids) {
                        $query1->orWhere('idRemetente', '=', $ids[1]);
                        $query1->orWhere('idRemetente', '=', $ids[2]);
                                        
                    })
                    
                    ->where(function($query2) use ($ids) {
                             $query2->orWhere('idDestinatario', '=', $ids[2]);
                             $query2->orWhere('idDestinatario', '=', $ids[1]);
                    })
                ->get();

            $perfil1 = Perfil::where('idUtilizador', '=', $id1)
                                    ->join('usersTipologia', 'perfil.tipoUtilizador', '=', 'usersTipologia.idTipoConta')
                                    ->get();
            $perfil2 = Perfil::where('idUtilizador', '=', $id2)
                                    ->join('usersTipologia', 'perfil.tipoUtilizador', '=', 'usersTipologia.idTipoConta')
                                    ->get();

            $nomes = array();
            $tmpartistas = Utilizador::getAllArtistas("");
            $tmporganizadores = Utilizador::getAllOrganizadores("");
            
            foreach ($tmpartistas as $artista) 
                $nomes[$artista->id] = $artista;

            foreach ($tmporganizadores as $organizador) 
                $nomes[$organizador->id] = $organizador;

            if (count($perfil1) > 0 && count($perfil2) > 0) 
                return view('frontend.displayChat')
                            ->with('perfil1', $perfil1[0])
                            ->with('perfil2', $perfil2[0])
                            ->with('emails', $mensagens)
                            ->with('nomes', $nomes)
                            ->with('id1', $id1)
                            ->with('id2', $id2)
                            ->with('tipoPesquisa', 1);
            else return view('frontend.errorPerfil');

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
            $ids = array();
            $ids[1] = $id1;
            $ids[2] = $id2;
            $mensagens = DB::table('emails')
                    ->where(function($query1) use ($ids) {
                        $query1->orWhere('idRemetente', '=', $ids[1]);
                        $query1->orWhere('idRemetente', '=', $ids[2]);
                                        
                    })
                    
                    ->where(function($query2) use ($ids) {
                             $query2->orWhere('idDestinatario', '=', $ids[2]);
                             $query2->orWhere('idDestinatario', '=', $ids[1]);
                    })
                ->get();

            $perfil1 = Perfil::where('idUtilizador', '=', $id1)
                                    ->join('usersTipologia', 'perfil.tipoUtilizador', '=', 'usersTipologia.idTipoConta')
                                    ->get();
            $perfil2 = Perfil::where('idUtilizador', '=', $id2)
                                    ->join('usersTipologia', 'perfil.tipoUtilizador', '=', 'usersTipologia.idTipoConta')
                                    ->get();

            $nomes = array();
            $tmpartistas = Utilizador::getAllArtistas("");
            $tmporganizadores = Utilizador::getAllOrganizadores("");
            
            foreach ($tmpartistas as $artista) 
                $nomes[$artista->id] = $artista;

            foreach ($tmporganizadores as $organizador) 
                $nomes[$organizador->id] = $organizador;
                

            if (count($perfil1) > 0 && count($perfil2) > 0) 
                return view('frontend.displayChat')
                            ->with('perfil1', $perfil1[0])
                            ->with('perfil2', $perfil2[0])
                            ->with('emails', $mensagens)
                            ->with('nomes', $nomes)
                            ->with('id1', $id1)
                            ->with('id2', $id2)
                            ->with('tipoPesquisa', 1);
            else return view('frontend.errorPerfil');
    }

}