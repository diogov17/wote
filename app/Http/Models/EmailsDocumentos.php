<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class EmailsDocumentos extends Model {
    
    use Notifiable;
    
    protected $table = 'emailsDocumentos';

    protected $fillable = [
    						'idEmailDocumento',
    						'idEmail',
    						'urlDocumento',
    						'valido'
    					 ];

    protected $primaryKey = 'idEmailDocumento';

    public $timestamps = false;
}
