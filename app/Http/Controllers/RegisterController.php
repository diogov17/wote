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
use App\Http\Models\Paises;
use App\Http\Models\QuestoesSeguranca;
use App\Http\Models\TipoEspetaculos;
use App\Http\Models\Distritos;
use App\Http\Models\Concelhos;
use App\Http\Models\UsersSubTipologia;
use App\Http\Models\UtilizadoresTiposConta;
use App\Http\Models\Utilizador;
use App\Http\Models\PerfilTiposEspetaculos;
use App\Http\Models\Perfil;
use App\Http\Models\Anuncios;
use App\Http\Models\TipoEventos;
use App\Http\Models\PerfilTiposEventos;
use App\Http\Models\EventosArtistasContratados;
use Illuminate\Support\Facades\Mail;
use Response;



class RegisterController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function registoArtista(Request $request){

        //CONFIG:
        $promocaoPeriodo = 1; //Periodo de promoção premium;

        //ERROS:

        $erros = array();
        $erros['nomeUser'] = '';
        $erros['nomeArtistico'] = '';
        $erros['emailUser'] = '';
        $erros['telemovelContactos'] = '';
        $erros['concelhos'] = '';
        $erros['tiposEspetaculos'] = '';
        $erros['idQuestao'] = '';
        $erros['verificacaoRegisto'] = '';
        $erros['tipoConta'] = '';
        $erros['password_confirmation'] = '';
        $erros['password'] = '';
        $erros['tipoContaPremium'] = '';


        //VALORES:

        $nomeUser = $request->nomeUser;
        $nomeArtistico = $request->nomeArtistico;
        $emailUser = $request->emailUser;
        $telemovelContactos = $request->telemovelContactos;
        $concelhos = $request->concelhos;
        $tipoEspetaculo = $request->tiposEspetaculos;
        $idQuestao = $request->idQuestao;
        $verificacaoRegisto = $request->verificacaoRegisto;
        $tipoConta = $request->tipoConta;
        $password = $request->password;
        $passwordRepetir = $request->password_confirmation;
        $tipoContaPremium = $request->tipoContaPremium;

        $errosTeste = 0;

        $valores = array();
        $valores['nomeUser'] = $nomeUser;
        $valores['nomeArtistico'] = $nomeArtistico;
        $valores['emailUser'] = $emailUser;
        $valores['telemovelContactos'] = $telemovelContactos;
        $valores['concelhos'] = $concelhos;
        $valores['tiposEspetaculos'] = $tipoEspetaculo;
        $valores['idQuestao'] = $idQuestao;
        $valores['verificacaoRegisto'] = $verificacaoRegisto;
        $valores['tipoConta'] = $tipoConta;
        $valores['password_confirmation'] = '';
        $valores['password'] = '';
        $valores['tipoContaPremium'] = $tipoContaPremium;

        $verificacaoMail = Utilizador::verificaUtilizadorJaRegistado($emailUser, $telemovelContactos);
        


        if($idQuestao == '' || $idQuestao == 0){
            $respostaCerta = 0;
        } 

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

        $paises = Paises::getPaises();
        $questaoSeguranca = QuestoesSeguranca::getQuestaoSeguranca();
        $tiposEspetaculos = TipoEspetaculos::getTiposEspetaculos();
        $tiposConta = UsersSubTipologia::getSubTipologias();
           

        if( ($tipoConta == 1 || $tipoConta == 2 || $tipoConta == 3) && $respostaCerta == 1 && $verificacaoMail == 0){

            if($nomeUser == ''){
                $erros['nomeUser'] = 'Deverá introduzir o seu nome!';
                $errosTeste = 1;
            }

            if($nomeArtistico == ''){
                $erros['nomeArtistico'] = 'Deverá introduzir o seu nome artístico!';
                $errosTeste = 1;
            }

            if(!filter_var($emailUser, FILTER_VALIDATE_EMAIL)){
                $erros['emailUser'] = 'Deverá introduzir um email válido!';
                $errosTeste = 1;
            }

            if(strlen($telemovelContactos) < 9){
                $erros['telemovelContactos'] = 'Deverá introduzir um telefone contacto válido!';
                $errosTeste = 1;
            }

            if($concelhos == 0 || $concelhos == ''){
                $erros['concelhos'] = 'Deverá seleccionar um concelho!';
                $errosTeste = 1;
            }  

            if($respostaCerta == 0 ){
                $erros['verificacaoRegisto'] = 'Verificação falhada. Tente novamente!';
                $errosTeste = 1;
            }        

            if($password != $passwordRepetir){
                $erros['password_confirmation'] = 'Repetição passord errada!';
                $errosTeste = 1;
            }    

            if( strlen($password) < 6){
                $erros['password'] = 'Deverá inserir uma password com pelo menos 6 caracteres!';
                $errosTeste = 1;
            } 
            if($tipoEspetaculo == 0 || $tipoEspetaculo == ''){
                $erros['tiposEspetaculos'] = 'Deverá inserir a sua área profissional relevante!';
                $errosTeste = 1;
            } 

            if($tipoContaPremium == 0 || $tipoContaPremium == ''){
                $erros['tipoContaPremium'] = 'Deverá escolher tipo de conta';
                $errosTeste = 1;
            } 

            $erros['errosTeste'] = $errosTeste;


            if($errosTeste == 0){
                //send email de registo com hash generada:
                $str = '';
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                for ($i = 0; $i < 5; $i++) {
                    $str .= $characters[rand(0, strlen($characters))];
                }
                $hash = md5($str);
                $dataRegisto = date('Y-m-d H:i:s');
                if($tipoContaPremium == 2){
                    $dataExpiracao = date('Y-m-d H:i:s', strtotime('+ '.$promocaoPeriodo.' month'));   
                }
                else {
                    $dataExpiracao = date('Y-m-d H:i:s', strtotime('+ 10 year'));
                }
                
                $novoUtilizador = new Utilizador();
                    $novoUtilizador->name = $nomeUser;
                    $novoUtilizador->email = $emailUser;
                    $novoUtilizador->morada = '';
                    $novoUtilizador->codigoPostal1 = '';
                    $novoUtilizador->codigoPostal2 = '';
                    $novoUtilizador->codigoPostalDesignacao = '';
                    $novoUtilizador->idConcelho = $concelhos;
                    $novoUtilizador->estado = 4;
                    $novoUtilizador->contribuinte = '';
                    $novoUtilizador->telemovel = $telemovelContactos;
                    $novoUtilizador->telefone = $telemovelContactos;
                    $novoUtilizador->telefone = $telemovelContactos;
                    $novoUtilizador->password = bcrypt($password);
                    $novoUtilizador->nrCreditos = 0;
                    $novoUtilizador->precoHora = 0;
                    $novoUtilizador->precoDia = 0;
                    $novoUtilizador->precoDeslocacao = 0;
                    $novoUtilizador->precoMinimoAtuacao = 0;
                    $novoUtilizador->dataExpiracaoConta = Carbon::createFromFormat('Y-m-d H:i:s', $dataExpiracao);
                    $novoUtilizador->dataRegisto = Carbon::now();
                    $novoUtilizador->ultimaHashVerificacao = $hash;
                    $novoUtilizador->pedidoRecuperacaoPass = 0;


                $novoUtilizador->save();
                $idUtilizador = $novoUtilizador->id;

                if($idUtilizador){

                    //Nova Associação Tipo Conta;
                    $novaAssociacaoTipoConta = new UtilizadoresTiposConta();
                    $novaAssociacaoTipoConta->idUser = $idUtilizador;
                    $novaAssociacaoTipoConta->idTipologia = 1;
                    $novaAssociacaoTipoConta->idSubTipologia = $tipoContaPremium;
                    $novaAssociacaoTipoConta->save();

                    //CRIAR PERFIL UTILIZADOR:
                    $novoPerfil = new Perfil();
                    $novoPerfil->idUtilizador = $idUtilizador;
                    $novoPerfil->tipoUtilizador = 1;
                    $novoPerfil->descricao = '';
                    $novoPerfil->observacoes = '';
                    $novoPerfil->estiloPrincipal = '';
                    $novoPerfil->feedbackGeral = 0;
                    $novoPerfil->nrSeguidoresTotal = 0;
                    $novoPerfil->nomeArtistico = $nomeArtistico;
                    $novoPerfil->nomeEmpresaOrganiza = '';
                    $novoPerfil->save();

                    $idPerfil = $novoPerfil->idPerfil;


                    //CRIAR ANÚNCIO:
                    $novoAnuncio = new Anuncios();
                    $novoAnuncio->idUtilizador = $idUtilizador;
                    $novoAnuncio->idPerfil = $idPerfil;
                    $novoAnuncio->dataCriacaoAnuncio = Carbon::now();
                    $novoAnuncio->estadoAnuncio = 2;
                    $novoAnuncio->dataExpiracaoAnuncio = Carbon::createFromFormat('Y-m-d H:i:s', $dataExpiracao);
                    $novoAnuncio->textoAnuncio = '';
                    $novoAnuncio->urlImagemAnuncio = '';
                    if($tipoContaPremium == 2 ){
                        $novoAnuncio->patrocinado = 1;
                    }
                    else {
                        $novoAnuncio->patrocinado = 0;
                    }
                    $novoAnuncio->nrVisualizacoes = 0;
                    $novoAnuncio->save();


                    foreach ($tipoEspetaculo as $tEspetaculo) {
                        //Novo Tipo Espetaculo associado ao utilizador - principal;
                        $novaAssociacaoTipoEspetaculo = new PerfilTiposEspetaculos();
                        $novaAssociacaoTipoEspetaculo->idTipoEspetaculo = $tEspetaculo;
                        $novaAssociacaoTipoEspetaculo->idPerfil = $idPerfil;
                        $novaAssociacaoTipoEspetaculo->idUser = $idUtilizador;
                        $novaAssociacaoTipoEspetaculo->nrHorasDisponivel = 0;
                        $novaAssociacaoTipoEspetaculo->precoHora = 0;
                        $novaAssociacaoTipoEspetaculo->idConcelho = 0;
                        $novaAssociacaoTipoEspetaculo->configGeral = 0;
                        $novaAssociacaoTipoEspetaculo->descricaoTrabalhos = '';
                        $novaAssociacaoTipoEspetaculo->sobConsulta = 1;
                        $novaAssociacaoTipoEspetaculo->precoDia = 0;
                        $novaAssociacaoTipoEspetaculo->precoDeslocacao = 0;
                        $novaAssociacaoTipoEspetaculo->tipoEspetaculoPrincipal = 0;
                        $novaAssociacaoTipoEspetaculo->save();
                    }


                    //Enviar email:

                    $title = 'WOTE - Registo de Conta';
                    $primeiroNomePartes = explode(" ",$nomeUser);
                    $primeiroNome = $primeiroNomePartes[0];

                    $tipoContaDescricao = 'Artista WOTE ';
                    if($tipoContaPremium == 1){
                        $tipoContaDescricao = 'Artista WOTE BASE';
                        $promocao = "Terá acesso às funcionalidades básicas da plataforma de forma gratuita, podendo após ativação da conta a criar o seu anúncio grátis e configurar a sua página.";
                    }
                    else if($tipoContaPremium == 2){
                        $tipoContaDescricao = 'Artista WOTE PREMIUM';
                        $promocao = "Como oferta, terá acesso às funcionalidades premium da plataforma de forma gratuita durante o período de ".$promocaoPeriodo." mês.";
                    }
                   
                    $content = array();
                    $content['saudacao'] = array();
                    $content['saudacao'][] = 'Olá '.$primeiroNome;


                    $content['conteudo'] = array();
                    $content['conteudo'][] = "Registámos um pedido de criação de conta ".$tipoContaDescricao." na nossa plataforma.";
                    $content['conteudo'][] = $promocao;
                    $content['conteudo'][] = "Para ter acesso à sua conta terá que a ativar, acedendo ao seguinte link:";
                    

                    $content['conteudo2'][] = "Após ativação poderá começar de imediato a promover a sua carreira.";
                    $content['conteudo2'][] = "Esperamos que tenha muito sucesso e que a plataforma WOTE seja o seu melhor aliado no mundo da música";
                    $content['conteudo2'][] = "Obrigado,";


                    $content['final'] = array();
                    $content['final'][] = "A Equipa WOTE,";


                    $content['ativacao'] = $hash;




                    Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message) use ($emailUser)
                    {

                        $message->from('hugorodriguesofficial@gmail.com', 'WOTE - Juntos pela Música!');
                        $message->subject('Ativação de Conta - Plataforma WOTE');
                        $message->to($emailUser);

                    });

                    $erros['errosTeste'] = 3;
                }

                    //return response()->json(['message' => 'Request completed']);
            }
        }
        else {
            if($tipoConta == '')
                $erros['tipoConta'] = 'Funcionalidade indisponível. Tente mais tarde. Obrigado!';
            else if($verificacaoMail > 0)
                $erros['tipoConta'] = 'Email ou telefone já utilizados num registo de conta na plataforma!';
            else
                $erros['tipoConta'] = '';
            
            $erros['errosTeste'] = 2;
        }

        return view('frontend.registerArtista')
                            ->with('paises',$paises)
                            ->with('tiposEspetaculos',$tiposEspetaculos)
                            ->with('questaoSeguranca',$questaoSeguranca)
                            ->with('tiposConta',$tiposConta)
                            ->with('valores',$valores)
                            ->with('erros',$erros)
                            ->with('tipoPesquisa', 0);
    }


    public function registoOrganizador(Request $request){

        //CONFIG:
        $promocaoPeriodo = 1; //Periodo de promoção premium;

        //ERROS:

        $erros = array();
        $erros['nomeUser'] = '';
        $erros['nomeEmpresa'] = '';
        $erros['emailUser'] = '';
        $erros['telemovelContactos'] = '';
        $erros['concelhos'] = '';
        $erros['tiposEventos'] = '';
        $erros['idQuestao'] = '';
        $erros['verificacaoRegisto'] = '';
        $erros['tipoConta'] = '';
        $erros['password_confirmation'] = '';
        $erros['password'] = '';
        $erros['tipoContaPremium'] = '';


        //VALORES:

        $nomeUser = $request->nomeUser;
        $nomeEmpresa = $request->nomeEmpresa;
        $emailUser = $request->emailUser;
        $telemovelContactos = $request->telemovelContactos;
        $concelhos = $request->concelhos;
        $tipoEvento = $request->tiposEventos;
        $idQuestao = $request->idQuestao;
        $verificacaoRegisto = $request->verificacaoRegisto;
        $tipoConta = $request->tipoConta;
        $password = $request->password;
        $passwordRepetir = $request->password_confirmation;
        $tipoContaPremium = $request->tipoContaPremium;

        $errosTeste = 0;

        $valores = array();
        $valores['nomeUser'] = $nomeUser;
        $valores['nomeEmpresa'] = $nomeEmpresa;
        $valores['emailUser'] = $emailUser;
        $valores['telemovelContactos'] = $telemovelContactos;
        $valores['concelhos'] = $concelhos;
        $valores['tiposEventos'] = $tipoEvento;
        $valores['idQuestao'] = $idQuestao;
        $valores['verificacaoRegisto'] = $verificacaoRegisto;
        $valores['tipoConta'] = $tipoConta;
        $valores['password_confirmation'] = '';
        $valores['password'] = '';
        $valores['tipoContaPremium'] = $tipoContaPremium;

        $verificacaoMail = Utilizador::verificaUtilizadorJaRegistado($emailUser, $telemovelContactos);
        


        if($idQuestao == '' || $idQuestao == 0){
            $respostaCerta = 0;
        } 

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

        $paises = Paises::getPaises();

        $distritos = array();
        foreach ($paises as $pais) {
            $distritos[$pais->idPais] = Distritos::getDistritos($pais->idPais);
        }

        $questaoSeguranca = QuestoesSeguranca::getQuestaoSeguranca();
        $tipoEventos = TipoEventos::getEventosTipos();
        $tiposConta = UsersSubTipologia::getSubTipologias();
           

        if( ($tipoConta == 1 || $tipoConta == 2 || $tipoConta == 3) && $respostaCerta == 1 && $verificacaoMail == 0){

            if($nomeUser == ''){
                $erros['nomeUser'] = 'Deverá introduzir o seu nome!';
                $errosTeste = 1;
            }

            if($nomeEmpresa == ''){
                $erros['nomeEmpresa'] = 'Deverá introduzir o nome da empresa ou a entidade que irá organizar eventos!';
                $errosTeste = 1;
            }

            if(!filter_var($emailUser, FILTER_VALIDATE_EMAIL)){
                $erros['emailUser'] = 'Deverá introduzir um email válido!';
                $errosTeste = 1;
            }

            if(strlen($telemovelContactos) < 9){
                $erros['telemovelContactos'] = 'Deverá introduzir um telefone contacto válido!';
                $errosTeste = 1;
            }

            if($concelhos == 0 || $concelhos == ''){
                $erros['concelhos'] = 'Deverá seleccionar um concelho!';
                $errosTeste = 1;
            }  

            if($respostaCerta == 0 ){
                $erros['verificacaoRegisto'] = 'Verificação falhada. Tente novamente!';
                $errosTeste = 1;
            }        

            if($password != $passwordRepetir){
                $erros['password_confirmation'] = 'Repetição passord errada!';
                $errosTeste = 1;
            }    

            if( strlen($password) < 6){
                $erros['password'] = 'Deverá inserir uma password com pelo menos 6 caracteres!';
                $errosTeste = 1;
            } 
            if($tipoEvento == 0 || $tipoEvento == '' || empty($tipoEvento)){
                $erros['tiposEventos'] = 'Deverá inserir o(s) tipo(s) de evento(s) que organiza!';
                $errosTeste = 1;
            } 

            if($tipoContaPremium == 0 || $tipoContaPremium == ''){
                $erros['tipoContaPremium'] = 'Deverá escolher tipo de conta';
                $errosTeste = 1;
            } 

            $erros['errosTeste'] = $errosTeste;


            if($errosTeste == 0){
                //send email de registo com hash generada:
                $str = '';
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                for ($i = 0; $i < 5; $i++) {
                    $str .= $characters[rand(0, strlen($characters))];
                }
                $hash = md5($str);
                $dataRegisto = date('Y-m-d H:i:s');
                if($tipoContaPremium == 2){
                    $dataExpiracao = date('Y-m-d H:i:s', strtotime('+ '.$promocaoPeriodo.' month'));   
                }
                else {
                    $dataExpiracao = date('Y-m-d H:i:s', strtotime('+ 10 year'));
                }
                
                $novoUtilizador = new Utilizador();
                    $novoUtilizador->name = $nomeUser;
                    $novoUtilizador->email = $emailUser;
                    $novoUtilizador->morada = '';
                    $novoUtilizador->codigoPostal1 = '';
                    $novoUtilizador->codigoPostal2 = '';
                    $novoUtilizador->codigoPostalDesignacao = '';
                    $novoUtilizador->idConcelho = $concelhos;
                    $novoUtilizador->estado = 4;
                    $novoUtilizador->contribuinte = '';
                    $novoUtilizador->telemovel = $telemovelContactos;
                    $novoUtilizador->telefone = $telemovelContactos;
                    $novoUtilizador->telefone = $telemovelContactos;
                    $novoUtilizador->password = bcrypt($password);
                    $novoUtilizador->nrCreditos = 0;
                    $novoUtilizador->precoHora = 0;
                    $novoUtilizador->precoDia = 0;
                    $novoUtilizador->precoDeslocacao = 0;
                    $novoUtilizador->precoMinimoAtuacao = 0;
                    $novoUtilizador->dataExpiracaoConta = Carbon::createFromFormat('Y-m-d H:i:s', $dataExpiracao);
                    $novoUtilizador->dataRegisto = Carbon::now();
                    $novoUtilizador->ultimaHashVerificacao = $hash;
                    $novoUtilizador->pedidoRecuperacaoPass = 0;

                $novoUtilizador->save();
                $idUtilizador = $novoUtilizador->id;

                if($idUtilizador){

                    //Nova Associação Tipo Conta;
                    $novaAssociacaoTipoConta = new UtilizadoresTiposConta();
                    $novaAssociacaoTipoConta->idUser = $idUtilizador;
                    $novaAssociacaoTipoConta->idTipologia = 2;
                    $novaAssociacaoTipoConta->idSubTipologia = $tipoContaPremium;
                    $novaAssociacaoTipoConta->save();

                    //CRIAR PERFIL UTILIZADOR:
                    $novoPerfil = new Perfil();
                    $novoPerfil->idUtilizador = $idUtilizador;
                    $novoPerfil->tipoUtilizador = 2;
                    $novoPerfil->descricao = '';
                    $novoPerfil->observacoes = '';
                    $novoPerfil->estiloPrincipal = '';
                    $novoPerfil->feedbackGeral = 0;
                    $novoPerfil->nrSeguidoresTotal = 0;
                    $novoPerfil->nomeArtistico = '';
                    $novoPerfil->nomeEmpresaOrganiza = $nomeEmpresa;
                    $novoPerfil->save();

                    $idPerfil = $novoPerfil->idPerfil;


                    foreach ($tipoEvento as $tEvento) {
                         //Novo Tipo Espetaculo associado ao utilizador - principal;
                        $novaAssociacaoTipoEvento = new PerfilTiposEventos();
                        $novaAssociacaoTipoEvento->idTipoEvento = $tEvento;
                        $novaAssociacaoTipoEvento->idPerfil = $idPerfil;
                        $novaAssociacaoTipoEvento->idUser = $idUtilizador;
                        $novaAssociacaoTipoEvento->tipoEventoPrincipal = 0;
                        $novaAssociacaoTipoEvento->valido = 1;
                        $novaAssociacaoTipoEvento->observacoes = '';
                        $novaAssociacaoTipoEvento->save();
                    }

                

                    //Enviar email:

                    $title = 'WOTE - Registo de Conta';
                    $primeiroNomePartes = explode(" ",$nomeUser);
                    $primeiroNome = $primeiroNomePartes[0];

                    $tipoContaDescricao = 'Organizador WOTE ';
                    if($tipoContaPremium == 1){
                        $tipoContaDescricao = 'Organizador WOTE BASE';
                        $promocao = "Terá acesso às funcionalidades básicas da plataforma de forma gratuita, podendo após ativação da conta a criar o seu perfil e eventos de forma grátis bem como configurar a sua página.";
                    }
                    else if($tipoContaPremium == 2){
                        $tipoContaDescricao = 'Organizador WOTE PREMIUM';
                        $promocao = "Como oferta, terá acesso às funcionalidades premium da plataforma de forma gratuita durante o período de ".$promocaoPeriodo." mês.";
                    }
                   
                    $content = array();
                    $content['saudacao'] = array();
                    $content['saudacao'][] = 'Olá '.$primeiroNome;


                    $content['conteudo'] = array();
                    $content['conteudo'][] = "Registámos um pedido de criação de conta ".$tipoContaDescricao." na nossa plataforma.";
                    $content['conteudo'][] = $promocao;
                    $content['conteudo'][] = "Para ter acesso à sua conta terá que a ativar, acedendo ao seguinte link:";
                    

                    $content['conteudo2'][] = "Após ativação poderá começar de imediato a promover a sua carreira.";
                    $content['conteudo2'][] = "Esperamos que tenha muito sucesso e que a plataforma WOTE seja o seu melhor aliado no mundo da música";
                    $content['conteudo2'][] = "Obrigado,";


                    $content['final'] = array();
                    $content['final'][] = "A Equipa WOTE,";


                    $content['ativacao'] = $hash;




                    Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message) use ($emailUser)
                    {

                        $message->from('hugorodriguesofficial@gmail.com', 'WOTE - Juntos pela Música!');
                        $message->subject('Ativação de Conta - Plataforma WOTE');
                        $message->to($emailUser);

                    });

                    $erros['errosTeste'] = 3;
                }

                    //return response()->json(['message' => 'Request completed']);
            }
        }
        else {
            if($tipoConta == '')
                $erros['tipoConta'] = 'Funcionalidade indisponível. Tente mais tarde. Obrigado!';
            else if($verificacaoMail > 0)
                $erros['tipoConta'] = 'Email ou telefone já utilizados num registo de conta na plataforma!';
            else
                $erros['tipoConta'] = '';
            
            $erros['errosTeste'] = 2;
        }

        return view('frontend.registerOrganizador')
                            ->with('paises',$paises)
                            ->with('distritos',$distritos)
                            ->with('tiposEventos',$tipoEventos)
                            ->with('questaoSeguranca',$questaoSeguranca)
                            ->with('tiposConta',$tiposConta)
                            ->with('valores',$valores)
                            ->with('erros',$erros)
                            ->with('tipoPesquisa', 0);
    }

    public function registoFa(Request $request){

        //CONFIG:
        $promocaoPeriodo = 1; //Periodo de promoção premium;

        //ERROS:

        $erros = array();
        $erros['nomeUser'] = '';
        $erros['nomeEmpresa'] = '';
        $erros['emailUser'] = '';
        $erros['telemovelContactos'] = '';
        $erros['concelhos'] = '';
        $erros['tiposEventos'] = '';
        $erros['tiposEspetaculos'] = '';
        $erros['idQuestao'] = '';
        $erros['verificacaoRegisto'] = '';
        $erros['tipoConta'] = '';
        $erros['password_confirmation'] = '';
        $erros['password'] = '';
        $erros['tipoContaPremium'] = '';


        //VALORES:

        $nomeUser = $request->nomeUser;
        $nomeEmpresa = $request->nomeEmpresa;
        $emailUser = $request->emailUser;
        $telemovelContactos = $request->telemovelContactos;
        $concelhos = $request->concelhos;
        $tipoEvento = $request->tiposEventos;
        $tipoEspetaculo = $request->tiposEspetaculos;
        $idQuestao = $request->idQuestao;
        $verificacaoRegisto = $request->verificacaoRegisto;
        $tipoConta = $request->tipoConta;
        $password = $request->password;
        $passwordRepetir = $request->password_confirmation;
        $tipoContaPremium = $request->tipoContaPremium;

        $errosTeste = 0;

        $valores = array();
        $valores['nomeUser'] = $nomeUser;
        $valores['nomeEmpresa'] = $nomeEmpresa;
        $valores['emailUser'] = $emailUser;
        $valores['telemovelContactos'] = $telemovelContactos;
        $valores['concelhos'] = $concelhos;
        $valores['tiposEventos'] = $tipoEvento;
        $valores['tiposEspetaculos'] = $tipoEspetaculo;
        $valores['idQuestao'] = $idQuestao;
        $valores['verificacaoRegisto'] = $verificacaoRegisto;
        $valores['tipoConta'] = $tipoConta;
        $valores['password_confirmation'] = '';
        $valores['password'] = '';
        $valores['tipoContaPremium'] = $tipoContaPremium;

        $verificacaoMail = Utilizador::verificaUtilizadorJaRegistado($emailUser, $telemovelContactos);
        


        if($idQuestao == '' || $idQuestao == 0){
            $respostaCerta = 0;
        } 

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

        $paises = Paises::getPaises();
        $questaoSeguranca = QuestoesSeguranca::getQuestaoSeguranca();
        $tipoEventos = TipoEventos::getEventosTipos();
        $tipoEspetaculos = TipoEspetaculos::getTiposEspetaculos();
        $tiposConta = UsersSubTipologia::getSubTipologias();
           

        if( ($tipoConta == 1 || $tipoConta == 2 || $tipoConta == 3) && $respostaCerta == 1 && $verificacaoMail == 0){

            if($nomeUser == ''){
                $erros['nomeUser'] = 'Deverá introduzir o seu nome!';
                $errosTeste = 1;
            }

            

            if(!filter_var($emailUser, FILTER_VALIDATE_EMAIL)){
                $erros['emailUser'] = 'Deverá introduzir um email válido!';
                $errosTeste = 1;
            }

            if(strlen($telemovelContactos) < 9){
                $erros['telemovelContactos'] = 'Deverá introduzir um telefone contacto válido!';
                $errosTeste = 1;
            }

            if($concelhos == 0 || $concelhos == ''){
                $erros['concelhos'] = 'Deverá seleccionar um concelho!';
                $errosTeste = 1;
            }  

            if($respostaCerta == 0 ){
                $erros['verificacaoRegisto'] = 'Verificação falhada. Tente novamente!';
                $errosTeste = 1;
            }        

            if($password != $passwordRepetir){
                $erros['password_confirmation'] = 'Repetição passord errada!';
                $errosTeste = 1;
            }    

            if( strlen($password) < 6){
                $erros['password'] = 'Deverá inserir uma password com pelo menos 6 caracteres!';
                $errosTeste = 1;
            } 
            if($tipoEvento == 0 || $tipoEvento == '' || empty($tipoEvento)){
                $erros['tiposEventos'] = 'Deverá inserir o(s) tipo(s) de evento(s) que organiza!';
                $errosTeste = 1;
            } 

            if($tipoEspetaculo == 0 || $tipoEspetaculo == '' || empty($tipoEspetaculo)){
                $erros['tiposEspetaculos'] = 'Deverá inserir o(s) tipo(s) de espetáculo(s) que organiza!';
                $errosTeste = 1;
            } 

            $erros['errosTeste'] = $errosTeste;


            if($errosTeste == 0){
                //send email de registo com hash generada:
                $str = '';
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                for ($i = 0; $i < 5; $i++) {
                    $str .= $characters[rand(0, strlen($characters))];
                }
                $hash = md5($str);
                $dataRegisto = date('Y-m-d H:i:s');
                if($tipoContaPremium == 2){
                    $dataExpiracao = date('Y-m-d H:i:s', strtotime('+ '.$promocaoPeriodo.' month'));   
                }
                else {
                    $dataExpiracao = date('Y-m-d H:i:s', strtotime('+ 10 year'));
                }
                
                $novoUtilizador = new Utilizador();
                    $novoUtilizador->name = $nomeUser;
                    $novoUtilizador->email = $emailUser;
                    $novoUtilizador->morada = '';
                    $novoUtilizador->codigoPostal1 = '';
                    $novoUtilizador->codigoPostal2 = '';
                    $novoUtilizador->codigoPostalDesignacao = '';
                    $novoUtilizador->idConcelho = $concelhos;
                    $novoUtilizador->estado = 4;
                    $novoUtilizador->contribuinte = '';
                    $novoUtilizador->telemovel = $telemovelContactos;
                    $novoUtilizador->telefone = $telemovelContactos;
                    $novoUtilizador->telefone = $telemovelContactos;
                    $novoUtilizador->password = bcrypt($password);
                    $novoUtilizador->nrCreditos = 0;
                    $novoUtilizador->precoHora = 0;
                    $novoUtilizador->precoDia = 0;
                    $novoUtilizador->precoDeslocacao = 0;
                    $novoUtilizador->precoMinimoAtuacao = 0;
                    $novoUtilizador->dataExpiracaoConta = Carbon::createFromFormat('Y-m-d H:i:s', $dataExpiracao);
                    $novoUtilizador->dataRegisto = Carbon::now();
                    $novoUtilizador->ultimaHashVerificacao = $hash;
                    $novoUtilizador->pedidoRecuperacaoPass = 0;

                $novoUtilizador->save();
                $idUtilizador = $novoUtilizador->id;

                if($idUtilizador){

                    //Nova Associação Tipo Conta;
                    $novaAssociacaoTipoConta = new UtilizadoresTiposConta();
                    $novaAssociacaoTipoConta->idUser = $idUtilizador;
                    $novaAssociacaoTipoConta->idTipologia = 3;
                    $novaAssociacaoTipoConta->idSubTipologia = 1;
                    $novaAssociacaoTipoConta->save();

                    //CRIAR PERFIL UTILIZADOR:
                    $novoPerfil = new Perfil();
                    $novoPerfil->idUtilizador = $idUtilizador;
                    $novoPerfil->tipoUtilizador = 3;
                    $novoPerfil->descricao = '';
                    $novoPerfil->observacoes = '';
                    $novoPerfil->estiloPrincipal = '';
                    $novoPerfil->feedbackGeral = 0;
                    $novoPerfil->nrSeguidoresTotal = 0;
                    $novoPerfil->nomeArtistico = '';
                    $novoPerfil->nomeEmpresaOrganiza = '';
                    $novoPerfil->save();

                    $idPerfil = $novoPerfil->idPerfil;


                    foreach ($tipoEvento as $tEvento) {
                         //Novo Tipo Espetaculo associado ao utilizador - principal;
                        $novaAssociacaoTipoEvento = new PerfilTiposEventos();
                        $novaAssociacaoTipoEvento->idTipoEvento = $tEvento;
                        $novaAssociacaoTipoEvento->idPerfil = $idPerfil;
                        $novaAssociacaoTipoEvento->idUser = $idUtilizador;
                        $novaAssociacaoTipoEvento->tipoEventoPrincipal = 0;
                        $novaAssociacaoTipoEvento->valido = 1;
                        $novaAssociacaoTipoEvento->observacoes = '';
                        $novaAssociacaoTipoEvento->save();
                    }



                    foreach ($tipoEspetaculo as $tEspetaculo) {
                        //Novo Tipo Espetaculo associado ao utilizador - principal;
                        $novaAssociacaoTipoEspetaculo = new PerfilTiposEspetaculos();
                        $novaAssociacaoTipoEspetaculo->idTipoEspetaculo = $tEspetaculo;
                        $novaAssociacaoTipoEspetaculo->idPerfil = $idPerfil;
                        $novaAssociacaoTipoEspetaculo->idUser = $idUtilizador;
                        $novaAssociacaoTipoEspetaculo->nrHorasDisponivel = 0;
                        $novaAssociacaoTipoEspetaculo->precoHora = 0;
                        $novaAssociacaoTipoEspetaculo->idConcelho = 0;
                        $novaAssociacaoTipoEspetaculo->configGeral = 0;
                        $novaAssociacaoTipoEspetaculo->descricaoTrabalhos = '';
                        $novaAssociacaoTipoEspetaculo->sobConsulta = 1;
                        $novaAssociacaoTipoEspetaculo->precoDia = 0;
                        $novaAssociacaoTipoEspetaculo->precoDeslocacao = 0;
                        $novaAssociacaoTipoEspetaculo->tipoEspetaculoPrincipal = 0;
                        $novaAssociacaoTipoEspetaculo->save();
                    }

            
                    //Enviar email:

                    $title = 'WOTE - Registo de Conta';
                    $primeiroNomePartes = explode(" ",$nomeUser);
                    $primeiroNome = $primeiroNomePartes[0];

                    $tipoContaDescricao = 'Fã WOTE ';
                   
                       
                    $promocao = "Terá acesso às funcionalidades da plataforma de forma gratuita, podendo após ativação da conta seguir artistas, eventos e usufruir de vantagens da plataforma WOTE. Contamos contigo!";
                   
                   
                    $content = array();
                    $content['saudacao'] = array();
                    $content['saudacao'][] = 'Olá '.$primeiroNome;


                    $content['conteudo'] = array();
                    $content['conteudo'][] = "Registámos um pedido de criação de conta ".$tipoContaDescricao." na nossa plataforma.";
                    $content['conteudo'][] = $promocao;
                    $content['conteudo'][] = "Para ter acesso à sua conta terá que a ativar, acedendo ao seguinte link:";
                    

                    $content['conteudo2'][] = "Após ativação poderá começar de imediato a promover a sua carreira.";
                    $content['conteudo2'][] = "Esperamos que tenha muito sucesso e que a plataforma WOTE seja o seu melhor aliado no mundo da música";
                    $content['conteudo2'][] = "Obrigado,";


                    $content['final'] = array();
                    $content['final'][] = "A Equipa WOTE,";


                    $content['ativacao'] = $hash;




                    Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message) use ($emailUser)
                    {

                        $message->from('hugorodriguesofficial@gmail.com', 'WOTE - Juntos pela Música!');
                        $message->subject('Ativação de Conta - Plataforma WOTE');
                        $message->to($emailUser);

                    });

                    $erros['errosTeste'] = 3;
                }

                    //return response()->json(['message' => 'Request completed']);
            }
        }
        else {
            if($tipoConta == '')
                $erros['tipoConta'] = 'Funcionalidade indisponível. Tente mais tarde. Obrigado!';
            else if($verificacaoMail > 0)
                $erros['tipoConta'] = 'Email ou telefone já utilizados num registo de conta na plataforma!';
            else
                $erros['tipoConta'] = '';
            
            $erros['errosTeste'] = 2;
        }

        return view('frontend.registerFa')
                            ->with('paises',$paises)
                            ->with('tiposEventos',$tipoEventos)
                            ->with('tiposEspetaculos',$tipoEspetaculos)
                            ->with('questaoSeguranca',$questaoSeguranca)
                            ->with('tiposConta',$tiposConta)
                            ->with('valores',$valores)
                            ->with('erros',$erros)
                            ->with('tipoPesquisa', 0);
    }

    public function index(Request $request){

    }

  
    public function create()
    {
       
    }

    
    public function store(Request $request)
    {

      
    }

  
    public function show($id)
    {
        $paises = Paises::getPaises();
        $questaoSeguranca = QuestoesSeguranca::getQuestaoSeguranca();
        $tiposEspetaculos = TipoEspetaculos::getTiposEspetaculos();
        $tiposConta = UsersSubTipologia::getSubTipologias();
        $tiposEventos = TipoEventos::getEventosTipos();
        $tipoContaPremium = 1;

        $erros = array();
        $erros['nomeUser'] = '';
        $erros['nomeArtistico'] = '';
        $erros['emailUser'] = '';
        $erros['telemovelContactos'] = '';
        $erros['concelhos'] = '';
        $erros['tiposEspetaculos'] = '';
        $erros['idQuestao'] = '';
        $erros['verificacaoRegisto'] = '';
        $erros['tipoConta'] = '';
        $erros['errosTeste'] = 2;
        $erros['password_confirmation'] = '';
        $erros['password'] = '';
        $erros['tipoContaPremium'] = '';
        $erros['tiposEventos'] = '';
        $erros['nomeEmpresa'] = '';
        

        if(Auth::user()){
            return view('backend.home');
        }

        if($id == 'artista'){
            return view('frontend.registerArtista')
                            ->with('paises',$paises)
                            ->with('tiposEspetaculos',$tiposEspetaculos)
                            ->with('tipoContaPremium',$tipoContaPremium)
                            ->with('questaoSeguranca',$questaoSeguranca)
                            ->with('tiposConta',$tiposConta)
                            ->with('erros',$erros)
                            ->with('tipoPesquisa', 0);
        }
        else if ($id == 'organizador'){
            return view('frontend.registerOrganizador')
                            ->with('paises',$paises)
                            ->with('tiposEventos',$tiposEventos)
                            ->with('tipoContaPremium',$tipoContaPremium)
                            ->with('tiposConta',$tiposConta)
                            ->with('questaoSeguranca',$questaoSeguranca)
                            ->with('erros',$erros)
                            ->with('tipoPesquisa', 0);

        }
        else if ($id == 'fa'){
            return view('frontend.registerFa')
                            ->with('paises',$paises)
                            ->with('tiposEspetaculos',$tiposEspetaculos)
                            ->with('tipoContaPremium',$tipoContaPremium)
                            ->with('tiposEventos',$tiposEventos)
                            ->with('questaoSeguranca',$questaoSeguranca)
                            ->with('tiposConta',$tiposConta)
                            ->with('erros',$erros)
                            ->with('tipoPesquisa', 0);
        }
    }

   
    public function edit($id)
    {
       

    }

    public function getDistritos(Request $request){
        
        $idPais = $request->idPais;

        if($idPais == 0){
            $distritos = array();
            $distritos[0] = new Distritos();
            $distritos[0]->id = '0';
            $distritos[0]->text = 'Distritos';
        }
        else {
            $distritos = Distritos::getDistritos($idPais);    
        }

        return Response::json($distritos);

    }

    public function getConcelhos(Request $request){

        $idDistrito = $request->idDistrito;
        
        if($idDistrito == 0){
            $concelhos = array();
            $concelhos[0] = new Concelhos();
            $concelhos[0]->id = '0';
            $concelhos[0]->text = 'Concelhos';
        }
        else {
            $concelhos = Concelhos::getConcelhos($idDistrito);
        }
                            
        return Response::json($concelhos);
    }

    public function ativacaoConta($codigo){
        $atualizou = 0;
        $utilizadorAtivar = Utilizador::getUtilizadorByToken($codigo);
        if( count($utilizadorAtivar) && ($utilizadorAtivar->id > 0) && ($utilizadorAtivar->estado == 4) ){
            $pedidoRecuperacaoPass = $utilizadorAtivar->pedidoRecuperacaoPass;
            if($pedidoRecuperacaoPass == 0){
                Utilizador::updateEstadoUtilizador($utilizadorAtivar->id, 1);
                $atualizou = 1;
            }
        }

        $utilizadorAtual = Auth::user();
        if($utilizadorAtual){
            $idUser = $utilizadorAtual->id;
            $autenticado = 1;
        }
        else {
            $idUser = 0;
            $autenticado = 0;
        }
        $anunciosHome = Anuncios::getAnunciosHomeDestaques($idUser, $autenticado);

        $tmp = Anuncios::getArtistasDestaques();
        $artistasAnuncios = array();

        foreach ($tmp as $artista)
            $artistasAnuncios[$artista->id] = $artista;
        
        $ultimosEspetaculos = EventosArtistasContratados::getUltimasConfirmacoes();


        return view('frontend.principal')
                    ->with('idUser',$idUser)
                    ->with('autenticado',$autenticado)
                    ->with('anunciosHome',$anunciosHome)
                    ->with('artistasAnuncios',$artistasAnuncios)
                    ->with('ultimosEspetaculos',$ultimosEspetaculos)
                    ->with('alertaAtivacaoConta',$atualizou)
                    ->with('tipoPesquisa', 0);

    }

    public function recuperarPassword(){
        return view('auth.recuperarPassword')
                    ->with('tipoPesquisa', 0);
    }

}
