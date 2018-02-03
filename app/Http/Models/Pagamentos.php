<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class Pagamentos extends Model {
    
    use Notifiable;
    
    protected $table = 'pagamento';

    protected $fillable = [
    							'idPagamento',
    							'idCliente',
    							'dataPagamento',
    							'quantia',
    							'metodoPagamento',
    							'idServico',
    							'dataExpiracaoAtual',
    							'dataExpiracaoApos'
    						];

    protected $date = ['dataExpiracaoAtual','dataExpiracaoApos'];

    protected $primaryKey = 'idPagamento';

    public $timestamps = false;
}
