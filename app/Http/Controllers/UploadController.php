<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;




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

        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        file_put_contents('profilepics/newpp.png', $data);

        return back();
    }
}
