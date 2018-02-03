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
use App\Http\Models\DuvidasContatos;
use App\Http\Models\QuestoesSeguranca;
use Response;





class HomeController extends BaseController
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
                    ->with('autenticado',$autenticado)
                    ->with('artistasHome',$artistasHome)
                    ->with('ultimosEspetaculos',$ultimosEspetaculos);
    }

    public function login(){
        $utilizadorAtual = Auth::user();
        if($utilizadorAtual){
            $idUser = $utilizadorAtual->id;
            $tipoConta = $utilizadorAtual->tipoConta;
            $autenticado = 1;
        }
        else {
            $idUser = 0;
            
            $autenticado = 0;
        }

        
        $artistasHome = Anuncios::getAnunciosHomeDestaques($idUser, $autenticado);
       
        
        
        $ultimosEspetaculos = EventosArtistasContratados::getUltimasConfirmacoes();

        return view('frontend.principal')
                    ->with('idUser',$idUser)
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

    //ROTAS DE PÁGINAS INTERESSANTES:

   public function politicaPrivacidade(){

        $utilizadorAtual = Auth::user();
        if($utilizadorAtual){
            $idUser = $utilizadorAtual->id;
            $tipoConta = $utilizadorAtual->tipoConta;
            $autenticado = 1;
        }
        else {
            $idUser = 0;
            
            $autenticado = 0;
        }


        return view('frontend.faq')
                    ->with('idUser',$idUser)
                    ->with('autenticado',$autenticado);
   }

   public function duvidaUtilizacao(){

        $utilizadorAtual = Auth::user();
        $questaoSeguranca = QuestoesSeguranca::getQuestaoSeguranca();
        if($utilizadorAtual){
            $idUser = $utilizadorAtual->id;
            $tipoConta = $utilizadorAtual->tipoConta;
            $autenticado = 1;
        }
        else {
            $idUser = 0;
            
            $autenticado = 0;
        }

        $erros = array();
        $erros['nome'] = '';
        $erros['email'] = '';
        $erros['telefone'] = '';
        $erros['mensagem'] = '';
        $erros['verificacaoRegisto'] = '';
        $erros['tipoForm'] = '';
        $erros['errosTeste'] = 0;

        $tipoForm = 1;

        return view('frontend.formContacto')
                    ->with('idUser',$idUser)
                    ->with('tipoForm',$tipoForm)
                    ->with('questaoSeguranca',$questaoSeguranca)
                    ->with('erros',$erros)
                    ->with('autenticado',$autenticado);

   }

   public function termosCondicoes(){

        $utilizadorAtual = Auth::user();
        if($utilizadorAtual){
            $idUser = $utilizadorAtual->id;
            $tipoConta = $utilizadorAtual->tipoConta;
            $autenticado = 1;
        }
        else {
            $idUser = 0;
            
            $autenticado = 0;
        }


        return view('frontend.termosCondicoes')
                    ->with('idUser',$idUser)
                    ->with('autenticado',$autenticado);

   }

   public function formContacto(Request $request){

        $tipoForm = 0;
        $tipoForm = $request->tipoContacto;

        $utilizadorAtual = Auth::user();
        $questaoSeguranca = QuestoesSeguranca::getQuestaoSeguranca();
        if($utilizadorAtual){
            $idUser = $utilizadorAtual->id;
            $tipoConta = $utilizadorAtual->tipoConta;
            $autenticado = 1;
        }
        else {
            $idUser = 0;
            
            $autenticado = 0;
        }

        

        $erros = array();
        $erros['nome'] = '';
        $erros['email'] = '';
        $erros['telefone'] = '';
        $erros['mensagem'] = '';
        $erros['tipoForm'] = '';
        $erros['verificacaoRegisto'] = '';
        $erros['errosTeste'] = 0;

       
        $valores = array();
        $valores['nome'] = '';
        $valores['email'] = '';
        $valores['telefone'] = '';
        $valores['mensagem'] = '';
        $valores['idQuestao'] = '';
        $valores['verificacaoRegisto'] = '';
       


        return view('frontend.formContacto')
                    ->with('idUser',$idUser)
                    ->with('erros',$erros)
                    ->with('tipoForm',$tipoForm)
                    ->with('questaoSeguranca',$questaoSeguranca)
                    ->with('autenticado',$autenticado);

   }


   public function tabelaPrecos(){

        $utilizadorAtual = Auth::user();
        if($utilizadorAtual){
            $idUser = $utilizadorAtual->id;
            $tipoConta = $utilizadorAtual->tipoConta;
            $autenticado = 1;
        }
        else {
            $idUser = 0;
            
            $autenticado = 0;
        }


        return view('frontend.tabelaPrecos')
                    ->with('idUser',$idUser)
                    ->with('autenticado',$autenticado);

   }


   public function saveFormContacto(Request $request){
        $erros = array();
        $erros['nome'] = '';
        $erros['email'] = '';
        $erros['telefone'] = '';
        $erros['mensagem'] = '';
        $erros['tipoForm'] = '';
        $erros['verificacaoRegisto'] = '';
        $erros['errosTeste'] = 0;
        $errosTeste = 0;

        $tipoForm = $request->tipoForm;
        $nome = $request->nome;
        $email = $request->email;
        $telefone = $request->telefone;
        $mensagem = $request->mensagem;
        $idQuestao = $request->idQuestao;
        $verificacaoRegisto = $request->verificacaoRegisto;

        $valores = array();
        $valores['nome'] = $nome;
        $valores['email'] = $email;
        $valores['telefone'] = $telefone;
        $valores['mensagem'] = $mensagem;
        $valores['idQuestao'] = $idQuestao;
        $valores['tipoForm'] = $tipoForm;
        $valores['verificacaoRegisto'] = $verificacaoRegisto;
       
        $questao = QuestoesSeguranca::getQuestaoSegurancaById($idQuestao);

        if($questao){
            if($questao->resultado == $verificacaoRegisto){
            $respostaCerta = 1;
            }
            else {
                $respostaCerta = 0;    
            }     
        }
        else {
            $respostaCerta = 0;
        }

        if($respostaCerta == 0){
            $erros['verificacaoRegisto'] = 'Falha na verificação de segurança. Responda novamente à questão!';
        }
        else {

            if($nome == ''){
                $erros['nome'] = 'Deverá introduzir o seu nome!';
                $errosTeste = 1;
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $erros['email'] = 'Deverás introduzir um email válido!';
                $errosTeste = 1;
            }

            if($telefone == ''){
                $erros['telefone'] = 'Deverás introduzir o teu telefone!';
                $errosTeste = 1;
            }

            if($mensagem == ''){
                $erros['mensagem'] = 'Deverás introduzir uma mensagem!';
                $errosTeste = 1;
            }

            if($tipoForm == ''){
                $erros['tipoForm'] = 'Deverás introduzir um tipo de dúvidas!';
                $errosTeste = 1;
            }


            $erros['errosTeste'] = $errosTeste;

            if($errosTeste == 0){

                $duvida = new DuvidasContatos();
                $duvida->nome = $nome;
                $duvida->telefone = $telefone;
                $duvida->email = $email;
                $duvida->mensagem = $mensagem;
                $duvida->estado = 1;
                $duvida->tipoForm = $tipoForm;
                $duvida->dataHoraRegisto = Carbon::now();
                $duvida->save();

                $erros['errosTeste'] = 3;
            }

            

        }

        return view('frontend.formContacto')
                    ->with('erros',$erros)
                    ->with('tipoForm',$tipoForm)
                    ->with('valores',$valores)
                    ->with('questaoSeguranca',$questao);    
   }


   public function faq(){

        $utilizadorAtual = Auth::user();
        if($utilizadorAtual){
            $idUser = $utilizadorAtual->id;
            $tipoConta = $utilizadorAtual->tipoConta;
            $autenticado = 1;
        }
        else {
            $idUser = 0;
            
            $autenticado = 0;
        }


        return view('frontend.faq')
                    ->with('idUser',$idUser)
                    ->with('autenticado',$autenticado);


   }





}
