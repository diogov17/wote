<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;

class UsersSubTipologia extends Model {
    
    use Notifiable;
    
    protected $table = 'usersSubTipologia';

    protected $fillable = [
    						'idSubTipologia',
    						'descricaoSubTipologia'
    					  ];

    protected $primaryKey = 'idSubTipologia';

    public $timestamps = false;

    public static function getSubTipologias(){
    	$subTipologias = DB::table('usersSubTipologia')
    							->select('usersSubTipologia.*')
    							->get();

    	return $subTipologias;
    }
}
