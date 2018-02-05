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
use App\Http\Models\Utilizador;
use App\Http\Models\PerfilGaleria;
use App\Http\Models\Evento;
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

            //$request = session('searchRequest');

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

            $tipoPesquisa = 0;

            // Artistas
            $temp_artistas = Utilizador::getAllArtistas($request['pesquisaLivre']);

            $artistas = array();
            $artistasProfilePics = array();

            foreach ($temp_artistas as $artista)
            {
                $artistas[$artista->id] = $artista;
                $artistasProfilePics[$artista->id] = PerfilGaleria::getProfilePic($artista->id);
            }

            
            // Organizadores
            $temp_organizadores = Utilizador::getAllOrganizadores($request['pesquisaLivre']);

            $organizadores = array();
            $organizadoresProfilePics = array();

            foreach ($temp_organizadores as $organizador)
            {
                $organizadores[$organizador->id] = $organizador;
                $organizadoresProfilePics[$organizador->id] = PerfilGaleria::getProfilePic($organizador->id);
            }


            // Eventos
            $temp_eventos = Evento::getAllEventos($request['pesquisaLivre']);

            $eventos = array();

            foreach ($temp_eventos as $evento)
                $eventos[$evento->idEvento] = $evento;


            // All
            $all = array();
            $artistasIds = array();
            $organizadoresIds = array();

            foreach ($temp_artistas as $artista)
            {
                array_push($all, $artista->id);
                array_push($artistasIds, $artista->id);
            }
            foreach ($temp_organizadores as $organizador)
            {
                array_push($all, $organizador->id);
                array_push($organizadoresIds, $organizador->id);
            }
            foreach ($temp_eventos as $evento)
                array_push($all, -$evento->idEvento);
            
            shuffle($all);


            return view('frontend.listaTodos')
                    ->with('tipoPesquisa', $request['tipoPesquisa'])
                    ->with('artistas', $artistas)
                    ->with('artistasIds', $artistasIds)
                    ->with('artistasProfilePics', $artistasProfilePics)
                    ->with('organizadores', $organizadores)
                    ->with('organizadoresIds', $organizadoresIds)
                    ->with('organizadoresProfilePics', $organizadoresProfilePics)
                    ->with('eventos', $eventos)
                    ->with('all', $all);

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
