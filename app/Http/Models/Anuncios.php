<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use App\Models\PerfilTiposEspetaculos;
use App\Models\PerfilComentarios;
use App\Models\PerfilZonasAtuacao;

class Anuncios extends Model {
    
    use Notifiable;
    
    protected $table = 'anuncios';

    protected $fillable = [
    							'idAnuncio',
    							'idUtilizador',
                                'idPerfil',
    							'dataCriacaoAnuncio',
    							'estadoAnuncio',
    							'dataExpiracaoAnuncio',
    							'textoAnuncio',
    							'urlImagemAnuncio',
    							'patrocinado'
    					];

    protected $dates = [
    						'dataCriacaoAnuncio',
    						'dataExpiracaoAnuncio'
    					];


    protected $primaryKey = 'idAnuncio';

    public $timestamps = false;


    //Fazer script para expirar anúncios patrocinados;
    //Fazer script para expirar utilizadores Premium;
    //Considerou-se apenas estado!!!
    //Como funciona: Existem tabelas de users, anuncios e perfil. Como um user pode ter vários tipos de conta, foi criado o perfil, que corresponde a uma associação lógica entre utilizador e tipo conta. Para cada tipo de conta o user vai ter uma página "perfil". Os anuncios são a materialização do perfil na busca, para tornar possível expiração de anuncios premium e dar destaque às coisas.
    public static function getAnunciosHomeDestaques($idUser, $autenticado){
    	
        if($autenticado == 1){
            $anuncios = DB::table('anuncios')
                            ->select('anuncios.*','perfil.feedbackGeral', 'perfilSeguidores.*','perfil.descricao')
                            ->join('users','users.id','=','anuncios.idUtilizador')
                            ->join('perfil','perfil.idPerfil','=','anuncios.idPerfil')
                            ->leftJoin('perfilSeguidores','perfilSeguidores.idPerfilArtista','=','perfil.idPerfil')
                            ->where('perfilSeguidores.idQuemGostou','=',$idUser)
                            ->where('perfilSeguidores.valido','=',1)
                            ->where('users.estado','=',1)
                            ->where('perfil.tipoUtilizador','=',1)
                            ->where('anuncios.estadoAnuncio','=',1)
                            ->orderBy('anuncios.patrocinado','DESC')
                            ->orderByRaw('RAND()')
                            ->take(6)
                            ->get();
        }
        else {

            $anuncios = DB::table('anuncios')
        						->select('anuncios.*','perfil.feedbackGeral','perfil.descricao')
        						->join('users','users.id','=','anuncios.idUtilizador')
                                ->join('perfil','perfil.idPerfil','=','anuncios.idPerfil')
        						->where('users.estado','=',1)
                                ->where('perfil.tipoUtilizador','=',1)
        						->where('anuncios.estadoAnuncio','=',1)
        						->orderBy('anuncios.patrocinado','DESC')
        						->orderByRaw('RAND()')
    							->take(6)
        						->get();
        }

    	foreach ($anuncios as $anuncio) {
    		$categoriasArtista = PerfilTiposEspetaculos::getTiposEspetaculosPerfil($anuncio->idPerfil);
            $quantosComentarios = PerfilComentarios::quantosComentariosAnuncio($anuncio->idPerfil);
            $zonasAtuacao = PerfilZonasAtuacao::getZonasAtuacaoPerfil($anuncio->idPerfil);
    		$anuncio->categoriasArtista = array();
    		$anuncio->categoriasArtista = $categoriasArtista;
            $anuncio->quantosComentarios = $quantosComentarios;
            $anuncio->zonasAtuacao = array();
            $anuncio->zonasAtuacao = $zonasAtuacao;
    	}

    	return $anuncios;
    }


    public static function getArtistasPesquisa($pesquisaLivre, $dataInicioDisponibilidade, $dataFimDisponibilidade, $idConcelho, $idDistrito, $idPais, $precoInicio, $precoFim, $nrSeguidoresLow, $nrSeguidoresHigh, $feedbackLow, $feedbackHigh, $localAtuacao, $pagina, $quantosPorPagina){

            $args1 = array();
            $args1['dataInicioDisponibilidade'] = $dataInicioDisponibilidade;
            $args1['dataFimDisponibilidade'] = $dataFimDisponibilidade;

            $args2 = array();
            $args2['idConcelho'] = $idConcelho;
            $args2['idDistrito'] = $idDistrito;
            $args2['idPais'] = $idPais;

            $args3 = array();
            $args3['nrSeguidoresLow'] = $nrSeguidoresLow;
            $args3['nrSeguidoresHigh'] = $nrSeguidoresHigh;

            $args4 = array();
            $args4['feedbackLow'] = $feedbackLow;
            $args4['feedbackHigh'] = $feedbackHigh;
            
            $subQuery = DB::table('perfilTempoMarcados')->select('idCliente')
                                ->where('perfilTempoMarcados.dataCorrespondente','<',$args1['dataFimDisponibilidade'])
                                ->where('perfilTempoMarcados.dataCorrespondente','>',$args1['dataInicioDisponibilidade'])
                                ->get();


            $anuncios = DB::table('anuncios')
                                ->select('anuncios.*', 'perfil.*')
                                ->join('users','users.id','=','anuncios.idUtilizador')
                                ->join('perfil','perfil.idPerfil','=','anuncios.idPerfil')
                                ->join('perfilZonasAtuacao','perfilZonasAtuacao.idPerfil','=','perfil.idPerfil')

                                ->join('concelhos','concelhos.idConcelho','=','perfilZonasAtuacao.idConcelho')
                                ->join('distritos','distritos.idDistrito','=','concelhos.idDistrito')
                                ->join('paises','paises.idPais','=','distritos.idPais')

                                ->join('perfilTempoMarcados','perfilTempoMarcados.idCliente','=','users.id')
                                ->join('EventosArtistasContratados','EventosArtistasContratados.idArtista','=','users.id')
                                ->join('evento','evento.idEvento','=','EventosArtistasContratados.idEvento')

                                ->where('perfil.tipoUtilizador','=',1)
                                ->where('users.estado','=',1)
                                ->where('anuncios.estadoAnuncio','=',1)

                                ->where(function($q1) use ($pesquisaLivre) {
                                    if(!empty($pesquisaLivre)){
                                        $q1->orWhere('perfil.descricao','like','%'.$pesquisaLivre.'%');
                                        $q1->orWhere('perfil.observacoes','like','%'.$pesquisaLivre.'%');
                                        $q1->orWhere('perfil.estiloPrincipal','like','%'.$pesquisaLivre.'%');
                                        $q1->orWhere('anuncios.textoAnuncio','like','%'.$pesquisaLivre.'%');
                                    }
                                })
                                ->whereNotIn('users.id', $subQuery)
                                ->where(function($q3) use ($args2) {
                                    if(!empty($args2['idConcelho']) && $args2['idConcelho'] > 0){
                                        $q3->where('perfilZonasAtuacao.idConcelho','=',$args2['idConcelho']);
                                    }
                                    else if(!empty($args2['idDistrito']) && $args2['idDistrito'] > 0){
                                        $q3->where('distritos.idDistrito','=',$args2['idDistrito']);
                                    }
                                    else if(!empty($args2['idPais']) && $args2['idPais'] > 0){
                                        $q3->where('paises.idPais','=',$args2['idPais']);
                                    }
                                })
                                ->where(function($q4) use ($args3) {
                                    if(!empty($args3['nrSeguidoresLow']) && !empty($args3['nrSeguidoresHigh']) && $args3['nrSeguidoresHigh'] > 0){
                                        $q4->where('perfil.nrSeguidoresTotal','<',$args3['nrSeguidoresHigh']);
                                        $q4->where('perfil.nrSeguidoresTotal','>',$args3['nrSeguidoresLow']);
                                    }
                                })
                                ->where(function($q5) use ($args4) {
                                    if(!empty($args4['feedbackLow']) && !empty($args4['feedbackHigh']) && $args4['feedbackHigh'] > 0){
                                        $q5->where('perfil.feedbackGeral','<',$args4['feedbackHigh']);
                                        $q5->where('perfil.feedbackGeral','>',$args4['feedbackLow']);
                                    }
                                })
                                ->where(function($q6) use ($localAtuacao) {
                                    if(!empty($localAtuacao) && $localAtuacao > 0){
                                        $q6->where('evento.idLocal','<',$localAtuacao);
                                    }
                                })
                                ->groupBy('anuncios.idAnuncio')
                                ->orderBy('anuncios.patrocinado','DESC')
                                ->orderByRaw('RAND()')
                                ->paginate($quantosPorPagina);
            
            return $anuncios;
    }


}
