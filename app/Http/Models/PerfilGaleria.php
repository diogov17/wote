<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class PerfilGaleria extends Model {
    
    use Notifiable;
    
    protected $table = 'perfilGaleria';

    protected $fillable = [
        'idGaleria',
        'idUtilizador',
        'posicaoGaleria',
        'urlGaleria',
        'valido'
    ];

    protected $primaryKey = 'idGaleria';

    public $timestamps = false;

    public static function getProfilePic($id)
    {
        $perfilGaleria = DB::table('perfilGaleria')
                                        ->where('perfilGaleria.idUtilizador','=',$id)
                                        ->get();
                                        
        return $perfilGaleria[0]->urlGaleria;
    }

    public static function saveProfilePic($id, $url)
    {
        PerfilGaleria::find($id)->update(['urlGaleria' => $url]);
    }

}