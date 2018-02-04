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
use Response;



class SearchController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(Request $request, $pesquisaLivre = '', $tipoPesquisa = 0){
        
        if(isset($request->tipoPesquisa))
            $tipoPesquisa = $request->tipoPesquisa;
        else 
            $tipoPesquisa = 0;

        if(isset($request->pesquisaLivre))
            $pesquisaLivre = $request->pesquisaLivre;
        else 
            $pesquisaLivre = '';

        //echo $tipoPesquisa;
        //exit;
        //tipoPesquisa == 0 -> Todos;
        //tipoPesquisa == 1 -> Artistas;
        //tipoPesquisa == 2 -> Eventos;
        //tipoPesquisa == 3 -> Organizadores;

        $dataAux = array();
        $dataAux['tipoPesquisa'] = $tipoPesquisa;
        $dataAux['pesquisaLivre'] = $pesquisaLivre;

        if($tipoPesquisa == 0){
            //Redirecciona para filtros;
            //return redirect()->action('SearchController@search')->with('searchRequest',$dataAux);

            $request = session('searchRequest');

            if(isset($request->dataInicioEvento))
                $dataInicioEvento = $request->dataInicioEvento;
            else 
                $dataInicioEvento = '';

            if(isset($request->dataFimEvento))
                $dataFimEvento = $request->dataFimEvento;
            else 
                $dataFimEvento = '';

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

            if(isset($request->nrSeguidores))
                $nrSeguidores = $request->nrSeguidores;
            else 
                $nrSeguidores = 0;

            if(isset($request->feedback))
                $feedback = $request->feedback;
            else 
                $feedback = 0;

            if(isset($request->pagina))
                $pagina = $request->pagina;
            else 
                $pagina = 1;


            return view('frontend.listaArtistas')
                    ->with('tipoPesquisa', $request['tipoPesquisa']);

        }
        else if($tipoPesquisa == 1){
            //Redirecciona para página de artistas;
            return redirect()->action('ArtistasController@index')->with('searchRequest',$dataAux);
        }
        else if($tipoPesquisa == 2){
            //Redirecciona para página de eventos:
            return redirect()->action('EventosController@index')->with('searchRequest',$dataAux);
        }
        else if($tipoPesquisa == 3){
            //Redirecciona para página de organizadores:
            return redirect()->action('OrganizadoresController@index')->with('searchRequest',$dataAux);   
        }
        else {
            return redirect()->action('HomeController@index')->with('searchRequest',$dataAux);
        }

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
    
    /*
	public function search(Request $request)
    {
		$radio_search = $request->radio_search; // Tipo de pesquisa
		$input = $request->search_query; // String a procurar

        $artistas = [];
        $organizadores = [];
        $eventos = [];

        switch ($radio_search) {
            case "artistas":
                $artistas = User::searchArtistas($input);
                break;
            case "eventos":
                $eventos = User::searchEventos($input);
                break;
            case "organizadores":
                $organizadores = User::searchOrganizadores($input);
                break;
            default:
                $artistas = User::searchArtistas($input);
                $organizadores = User::searchOrganizadores($input);
                $eventos = User::searchEventos($input);
                break;
        } 

		return view('frontend.searchPage')
                        ->with('search_artistas', $artistas)
                        ->with('search_eventos', $eventos)
                        ->with('search_organizadores', $organizadores)
                        ->with('search_query', $input)
                        ->with('radio_search', $radio_search);
	}

    */


}
