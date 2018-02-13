<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Models\PerfilGaleria;



class UploadController extends BaseController
{

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

    public function upload(Request $request)
    {
        $data = $request->picture;
        $id = $request->id;

        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        file_put_contents('profilepics/profilePic_' . $id . '.png', $data);

        PerfilGaleria::saveProfilePic($id, asset('profilepics/profilePic_' . $id . '.png'));

        return back();
    }
}
