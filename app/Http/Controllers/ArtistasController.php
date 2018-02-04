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




class ArtistasController extends BaseController
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

        //CAMPOS: pesquisaLivre, dataInicioDisponibilidade, dataFimDisponibilidade, idConcelho, idDistrito, idPais, precoInicio, precoFim, nrSeguidores, feedback, locaisAtuacao, 

        if(isset($request->pesquisaLivre))
            $pesquisaLivre = $request->pesquisaLivre;
        else 
            $pesquisaLivre = '';

        $tipoPesquisa = 1;

        if(isset($request->dataInicioDisponibilidade))
            $dataInicioDisponibilidade = $request->dataInicioDisponibilidade;
        else 
            $dataInicioDisponibilidade = '';

        if(isset($request->dataFimDisponibilidade))
            $dataFimDisponibilidade = $request->dataFimDisponibilidade;
        else 
            $dataFimDisponibilidade = '';

        if(isset($request->idConcelho))
            $idConcelho = $request->idConcelho;
        else 
            $idConcelho = 0;

        if(isset($request->idPais))
            $idPais = $request->idPais;
        else 
            $idPais = 0;

        if(isset($request->idDistrito))
            $idDistrito = $request->idDistrito;
        else 
            $idDistrito = 0;

        if(isset($request->precoInicio))
            $precoInicio = $request->precoInicio;
        else 
            $precoInicio = 0;

        if(isset($request->precoFim))
            $precoFim = $request->precoFim;
        else 
            $precoFim = 0;



        if(isset($request->nrSeguidoresLow))
            $nrSeguidoresLow = $request->nrSeguidoresLow;
        else 
            $nrSeguidoresLow = 0;

        if(isset($request->nrSeguidoresHigh))
            $nrSeguidoresHigh = $request->nrSeguidoresHigh;
        else 
            $nrSeguidoresHigh = 0;



        if(isset($request->feedbackLow))
            $feedbackLow = $request->feedbackLow;
        else 
            $feedbackLow = 0;

        if(isset($request->feedbackHigh))
            $feedbackHigh = $request->feedbackHigh;
        else 
            $feedbackHigh = 0;


        if(isset($request->pagina))
            $pagina = $request->pagina;
        else 
            $pagina = 1;


        if(isset($request->localAtuacao))
            $localAtuacao = $request->localAtuacao;
        else 
            $localAtuacao = 0;


        $resultado = Anuncios::getArtistasPesquisa($pesquisaLivre, $dataInicioDisponibilidade, $dataFimDisponibilidade, $idConcelho, $idDistrito, $idPais, $precoInicio, $precoFim, $nrSeguidoresLow, $nrSeguidoresHigh, $feedbackLow, $feedbackHigh, $localAtuacao, $pagina, 10);

        $artistas = Utilizador::getAllArtistas($request['pesquisaLivre']);

        $profilePics = array();

        foreach ($artistas as $artista)
            $profilePics[$artista->id] = PerfilGaleria::getProfilePic($artista->id);


        return view('frontend.listaArtistas')
                    ->with('idUser',$idUser)
                    ->with('tipoConta',$tipoConta)
                    ->with('autenticado',$autenticado)
                    ->with('filteredArtistas',$resultado)
                    ->with('pesquisaLivre',$pesquisaLivre)
                    ->with('dataInicioDisponibilidade',$dataInicioDisponibilidade)
                    ->with('dataFimDisponibilidade',$dataFimDisponibilidade)
                    ->with('idConcelho',$idConcelho)
                    ->with('idDistrito',$idDistrito)
                    ->with('idPais',$idPais)
                    ->with('precoInicio',$precoInicio)
                    ->with('precoFim',$precoFim)
                    ->with('nrSeguidoresLow',$nrSeguidoresLow)
                    ->with('nrSeguidoresHigh',$nrSeguidoresHigh)
                    ->with('feedbackLow',$feedbackLow)
                    ->with('feedbackHigh',$feedbackHigh)
                    ->with('localAtuacao',$localAtuacao)
                    ->with('pagina',$pagina)
                    ->with('artistas', $artistas)
                    ->with('tipoPesquisa', $request['tipoPesquisa'])
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
        $user = Utilizador::isArtista($id);

        if(count($user) == 1)
        {
            $perfil = Perfil::where('idUtilizador', '=', $id)
                                    ->get();

            $galeria = PerfilGaleria::where('idUtilizador', '=', $id)
                                    ->get();

            $calendario = [];

            if (count($user) > 0 && count($perfil) > 0 && count($galeria) > 0 ) 
                return view('frontend.displayPerfilArtista')
                            ->with('user', $user[0])
                            ->with('perfil', $perfil[0])
                            ->with('galeria', $galeria[0])
                            ->with('calendario', $calendario)
                            ->with('tipoPesquisa', 1);
            else return view('frontend.errorPerfil');
        }
        else return view('frontend.errorPerfil');
    }

}
