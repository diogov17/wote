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




class FasController extends BaseController
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

    public function pagina($id)
    {
        $fa = Utilizador::isFa($id);

        if(count($fa) == 1)
        {
            $perfil = Perfil::where('idUtilizador', '=', $id)
                                    ->get();

            $profilePic = PerfilGaleria::getProfilePic($id);
            
            $calendario = [];

            if (count($fa) > 0 && count($perfil) > 0) 
                return view('frontend.displayPerfilFa')
                            ->with('fa', $fa[0])
                            ->with('perfil', $perfil[0])
                            ->with('profilePic', $profilePic)
                            ->with('calendario', $calendario)
                            ->with('tipoPesquisa', 1)
                            ->with('pageId', $id);
            else return view('frontend.errorPerfil');
        }
        else return view('frontend.errorPerfil');
    }

}
