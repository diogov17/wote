<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class PedidosOrcamentos extends Model {
    
    use Notifiable;
    
    protected $table = 'pedidosOrcamentos';

    protected $fillable = [
    						'idOrcamento',
    						'precoTotal',
    						'precoDeslocacao',
    						'descricaoOrcamento',
    						'ivaIncluido',
    						'adjudicado',
    						'idArtista',
    						'idOrganizador',
    						'idEvento'
    					];

    protected $primaryKey = 'idOrcamento';

    public $timestamps = false;
}
